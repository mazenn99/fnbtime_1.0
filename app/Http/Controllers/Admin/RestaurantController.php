<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\CreateRestaurantRequest;
use App\Model\Restaurant;
use App\Model\ContractRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('id', 'DESC')->paginate(PAGINATE_COUNT);
        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     * store new Restaurant
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurantRequest $request)
    {
        $hash = bin2hex(random_bytes(25));
        $res = Restaurant::create([
            'name' => $request->input('name'),
            'country_id' => $request->input('country'),
            'city_id' => $request->input('city'),
            'type_food' => $request->input('type_food'),
            'number' => $request->input('phone'),
            'description' => $request->input('description'),
            'approved'   => '0',
            'manager_number' => $request->input('manager_number'),
            'manager_email'  => $request->input('manager_email'),
            'menu' => $this->saveImage($request->file('menu'), 'images/res-images/menu'),
            'map_url' => $request->input('location')
        ]);
        $res->appsDelivery()->create(['mrsool' => $request->input('mrsool'), 'logmaty' => $request->input('logmaty'), 'hungerStation' => $request->input('hungerStation'), 'jahiz' => $request->input('jahiz'), 'careemNow' => $request->input('careemNow')]);
        $res->contract()->create(['hash' => $hash , 'approve_at	' => NULL , 'signed_name' => NULL]);
        return redirect()->to(route('restaurant.index'))->with(['success' => "Added Restaurant $request->name Successfully"]);
    }

    /*
     * function saveImage upload menu images
     */
    public function saveImage($image, $path)
    {
        $file_extention = $image->getClientOriginalExtension();
        $file_name = bin2hex(random_bytes(5)) . time() . '.' . $file_extention;
        $image->move($path, $file_name);
        return $file_name;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name'           => 'required|string',
            'country'        => 'required|numeric',
            'city'           => 'required|numeric',
            'type_food'      => 'required',
            'phone'          => 'required|numeric',
            'description'    => 'required|string',
            'menu'           => 'mimes:jpg,jpeg,png,pdf',
            'location'       => 'required|url',
            'manager_number' => 'nullable|numeric|min:8' , 
            'manager_email'  => 'nullable|email|max:100'
        ]);
        if ($request->hasFile('menu')) {
            $newMenu = $request->file('menu');
            if (!(empty($restaurant->picture))) {
                $path = public_path() . '\images\res-images\menu\\' . $restaurant->picture;
                unlink($path);
                $request['menu'] = $this->saveImage($request->file('menu'), 'images/res-images/menu');
            } else {
                $request['menu'] = $this->saveImage($request->file('menu'), 'images/res-images/menu');
            }
        }
        $restaurant->update([
            'name' => $request->input('name'),
            'country_id' => $request->input('country'),
            'city_id' => $request->input('city'),
            'type_food' => $request->input('type_food'),
            'number' => $request->input('phone'),
            'description' => $request->input('description'),
            'manager_email' => $request->input('manager_email'),
            'manager_number' => $request->input('manager_number'),
            'picture' => $request['menu'] != '' ? $request['menu'] : $restaurant->picture,
            'map_url' => $request->input('location')
        ]);
        if ($restaurant->appsDelivery()->exists()) {
            $restaurant->appsDelivery()->update(['mrsool' => $request->input('mrsool'), 'logmaty' => $request->input('logmaty'), 'hungerStation' => $request->input('hungerStation'), 'jahiz' => $request->input('jahiz'), 'careemNow' => $request->input('careemNow')]);
        } else {
            $restaurant->appsDelivery()->create(['mrsool' => $request->input('mrsool'), 'logmaty' => $request->input('logmaty'), 'hungerStation' => $request->input('hungerStation'), 'jahiz' => $request->input('jahiz'), 'careemNow' => $request->input('careemNow')]);
        }
        return redirect()->to(route('restaurant.index'))->with(['success' => "Updated Restaurant $request->name Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $resName = $restaurant->name;
        $restaurant->delete();
        return redirect()->back()->with(['success' => "Successfully Deleted $resName Restaurant"]);
    }

    /*
     * this search input for restaurant
     */

    public function searchInput(Request $request)
    {
        $output = '';
        $restaurant = Restaurant::where('name', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhere('number' , 'LIKE' , '%' . $request->input('search') . '%')->get();
        if (!(empty($restaurant))) {
            foreach ($restaurant as $res) {
                $output .= '
                    <tr>
                            <td>' . $res->id . '           </td>
                            <td>'.  $res->name . '         </td>
                            <td>' . $res->country->name . '</td>
                            <td>' . $res->city->name . '   </td>
                            <td>' . $res->manager_number .'</td>
                            <td>' . $res->manager_email .' </td>
                            <td>' . $res->number . '       </td>
                            <td>' . $res->created_at . '   </td>
                            <td>' . $res->views . '        </td>
                            <td>' . \App\Model\Booking::where('res_id' , $res->id)->count() .'</td>
                            <td>
                                <a href=' . route('restaurant.edit', $res->id) . '
                                   class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action=' . route('restaurant.destroy', $res->id) . ' method="POST"
                                      class="d-inline-block">
                                    ' . method_field('delete') . '
                                    ' .@csrf_field(). '
                                    <button onclick="return confirm(\'Are You Sure\')"
                                            class="btn btn-sm btn-outline-danger">Delete
                                    </button>
                                </form>
                            </td>
                    </tr>
            ';
            }
            return response()->json($output);
        } else {
            $output = '
                <tr>
                    <td class="text-danger text-center">No Data found</td>
                </tr>
            ';
            return response()->json($output);
        }

    }
}
