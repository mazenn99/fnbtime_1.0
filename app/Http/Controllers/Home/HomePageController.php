<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserInformation;
use App\Http\Requests\ReserveRequest;
use App\Mail\ReserveBooking;
use App\Model\Booking;
use App\Model\City;
use App\Model\Country;
use App\Model\Favorite;
use App\Model\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class HomePageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(
            ['index', 'faq', 'restaurant',
                'restaurantInfo', 'suggestion',
                'searchInput', 'searchForm',
                'contact', 'showRestaurant'
            ]
        );
    }

    /**
     * Display a listing of the resource.
     * this to display restaurant in index page
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Restaurant::with(['country' => function ($q) {
            $q->select('id', 'name as couName');
        }, 'city' => function ($q) {
            $q->select('id', 'name as citName');
        }])->inRandomOrder()->limit(8)->get();
        return view('client.index', compact('res'));
    }

    public function client()
    {
        return view('client.client');
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function faq()
    {
        return view('client.faq');
    }

    /*
     * this if there is GET request to search query
     */

    public function searchForm($search = NULL)
    {
        $search = request('search');

        $filter = request('sort');
        $filter=urldecode($filter);

        if (request('search')) {
            $search = request('search');
            $result = Restaurant::with(['country' => function ($q) {
                $q->select('id', 'name as couName');
            }, 'city' => function ($q) {
                $q->select('id', 'name as citName');
            }]);

            if(!empty($filter) && $filter != "null"){
                $result->where('type_food', 'LIKE', '%' . $filter . '%');
            }

            $result = $result->where('name', 'LIKE', '%' . $search . '%')->paginate(PAGINATE_COUNT_IN_CLIENT_RES);
            return view('client.restaurant', compact('result'));
        }
    }

    public function showRestaurant(Request $request)
    {
        /*if ($request->input('filter')) {
            $filter = $request->input('filter');
            $res = Restaurant::with(['country' => function ($q) {
                $q->select('id', 'name as couName');
            }, 'city' => function ($q) {
                $q->select('id', 'name as citName');
            }])->where('type_food', 'LIKE', '%' . $filter . '%')->orderBy('id', 'DESC')->paginate(PAGINATE_COUNT_IN_CLIENT_RES);
            ?>
            <div class="restaurant-list-item-wrapper no-last-bb">
                <?php foreach ($res as $data): ?>
                    <div class="restaurant-list-item clearfix">

                        <div class="GridLex-grid-noGutter-equalHeight">

                            <div class="GridLex-col-3_sm-3_xss-12">
                                <div class="image"> <?php $img = explode(',', $data['picture']); ?>
                                    <img src="http://localhost:8000/images/res-images/<?php echo $img[0] ?>"
                                         alt="Image"/>
                                </div>
                            </div>

                            <div class="GridLex-col-9_sm-9_xss-12">

                                <div class="GridLex-grid-noGutter-equalHeight">

                                    <div class="GridLex-col-9_sm-12 content-wrapper">

                                        <div class="content">
                                            <h5>
                                                <a href="restaurant-info.php?restaurant=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a>
                                            </h5>
                                            <p class="location"><i
                                                    class="fa fa-map-marker"></i> <?php echo $data['couName'] . ' ' . $data['citName'] ?>
                                            </p>
                                            <p class="short-info"><?php if (strlen($data['description']) > 40)
                                                    echo substr($data['description'], 0, 300);
                                                ?></p>
                                            <p class="cuisine">
                                                Cuisine: <?php $type = explode(',', $data['type_food']); # This is get the type of restaurant
                                                foreach ($type as $types):?>
                                                    <span><?php echo $types ?></span>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="GridLex-col-3_sm-12 meta-wrapper">

                                        <div class="meta">


                                            <div class="right-bottom">
                                                <a href="restaurant-info.php?restaurant=<?php echo $data['id'] ?>"
                                                   class="btn btn-primary btn-sm btn-block">Details</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>
            </div> <?php
        } */
        //else {

        $filter = $request->input('sort');
        $filter=urldecode($filter);

        /*$res = Restaurant::with(['country' => function ($q) {
            $q->select('id', 'name as couName');
        }, 'city' => function ($q) {
            $q->select('id', 'name as citName');
        }])->orderBy('id', 'DESC')->paginate(PAGINATE_COUNT_IN_CLIENT_RES);*/

        $query = Restaurant::select('restaurants.id','restaurants.name as restaurant_name','restaurants.description','restaurants.map_url',
            'restaurants.type_food','cities.name as city_name', 'countries.name as country_name')
            ->join('cities','restaurants.city_id', '=', 'cities.id')
            ->join('countries', 'restaurants.country_id', '=', 'countries.id');

        if(!empty($filter) && $filter != "null"){
            $query->where('type_food', 'LIKE', '%' . $filter . '%');
        }

        $res = $query->orderBy('restaurants.id', 'ASC')->paginate(PAGINATE_COUNT_IN_CLIENT_RES);

        return view('client.restaurant', compact('res'));
        // }
    }


    /*
     * This function display specific Restaurant by id
     */

    public function restaurantInfo($res)
    {
        $res = Restaurant::with(['country' => function ($q) {
            $q->select('id', 'name as couName');
        }, 'city' => function ($q) {
            $q->select('id', 'name as citName');
        }, 'appsDelivery' => function ($q) {
            $q->select('res_id', 'mrsool', 'logmaty', 'hungerStation', 'jahiz', 'careemNow');
        }])->findOrFail($res);

        $otherRes = Restaurant::with(['country' => function ($q) {
            $q->select('id', 'name as couName');
        }, 'city' => function ($q) {
            $q->select('id', 'name as citName');
        }])->latest()->limit(4)->get();
        return view('client.restaurant-info', compact('res', 'otherRes'));
    }


    public function restaurantReserve(ReserveRequest $request, $resId)
    { # This function to make new Reservation in Restaurant
        $bookingNumber = random_int(1, 999999);
        $reserve = Booking::create([
            'user_id' => Auth::user()->id,
            'res_id' => $resId,
            'booking_number' => $bookingNumber,
            'name' => $request->input('FullName'),
            'phone_costumer' => $request->input('phone'),
            'person_number' => $request->input('persons'),
            'time' => $request->input('time'),
            'date_booking' => NOW(),
            'occasion_date' => $request->input('date'),
            'status' => 0,
        ]);
        session()->flash('reserve-success');
        Mail::to(Auth::user()->email)->send(new ReserveBooking($reserve));
        return view('client.success-reservation', [
            'resId' => $resId,
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'persons' => $request->input('persons'),
            'bookingNumber' => $bookingNumber,
            'ResName' => Restaurant::find($resId)->name,
            'country' => Country::find(Restaurant::find($resId)->country->id)->name,
            'city' => City::find(Restaurant::find($resId)->city->id)->name,
            'ResNumber' => Restaurant::find($resId)->number,
        ]);
    }

    public function searchInput(Request $request)
    { # this search input
        $query = $request->input('search');
        if (!empty($query)) {
            $result = Restaurant::with(['country' => function ($q) {
                $q->select('id', 'name as couName');
            }, 'city' => function ($q) {
                $q->select('id', 'name as citName');
            }, 'keyword' => function ($q) {

            }])->select('id', 'name', 'picture', 'country_id', 'city_id')->where('name', 'LIKE', "%$query%")->get();
            if (!empty($result)) {
                foreach ($result as $restaurant) { ?>
                    <div class="reservation-summary-wrapper">
                        <a href="<?php echo route('res-info', $restaurant->id) ?>" target="_blank">
                            <ul class="reservation-summary-list">
                                <li>
                                    <div class="image">
                                        <?php $img = explode(',', $restaurant->picture); ?>
                                        <img src="<?php echo URL::asset('images/res-images') ?>/<?php echo $img[0] ?>"
                                             alt="Restaurant <?php echo $restaurant->name ?> image"/>
                                    </div>
                                </li>

                                <li>
                                    <span class="block text-muted text-uppercase">Restaurant</span>
                                    <h6><a href="<?php echo route('res-info', $restaurant->id) ?>"
                                           target="_blank"><?php echo $restaurant->name ?></a></h6>
                                </li>

                                <li>
                                    <span class="block text-muted text-uppercase">Country</span>
                                    <h6><?php echo $restaurant->country->couName ?></h6>
                                </li>

                                <li>
                                    <span class="block text-muted text-uppercase">city</span>
                                    <h6><?php echo $restaurant->city->citName ?></h6>
                                </li>

                            </ul>
                        </a>

                    </div>
                <?php }
            }
        }
    }

    public function clientDetails()
    {
        return view('client.client');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Edit Client Profile
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('client.edit');
    }


    /**
     * Update the specified resource in storage.
     * Update User Information
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserInformation $request)
    {
        $user = \App\User::findOrFail(Auth::user()->id);
        if ($request->input('subscription') == 'on') {
            $sub = 1;
        } else {
            $sub = 0;
        }
        $user->update([
            'email' => $request->input('email'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : Auth::user()->password,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'country_id' => $request->input('country') ? $request->input('country') : Auth::user()->country_id,
            'city_id' => $request->input('city') ? $request->input('city') : Auth::user()->city_id,
            'subscription' => $sub
        ]);
        return redirect()->back()->with(['success' => 'Updated Information Successfully']);
    }

    /*
     * This to add favorite restaurant in user
     */

    public function saveToFavorite(Request $request)
    {
        $res = Restaurant::select('id')->findOrFail($request->input('value'));
        $userFav = Favorite::where('user_id', Auth::id())
            ->where('res_id', $res->id)->first();
        if (is_null($userFav)) {
            Favorite::create(['user_id' => Auth::user()->id, 'res_id' => $res->id]);
            return 200;
        } else {
            Favorite::where('user_id', Auth::id())
                ->where('res_id', $res->id)->delete();
            return 201;
        }
    }

    /*
     * this delete favorite from client page
     */

    public function deleteFav(Request $request)
    {
        $res = Restaurant::select('id')->findOrFail($request->input('value'));
        Favorite::where('user_id', Auth::id())
            ->where('res_id', $res->id)->delete();
        return 200;
    }

    /*
     * this for search in index and restaurant view
     * show suggestion
     */

    public function suggestion(Request $request)
    {
        $search = $request->input('search');
        $res = Restaurant::with(['country' => function($q) {
            $q->select('id' , 'name as couName');
        }])
            ->with(['city' => function($q) {
                $q->select('id' , 'name as citName');
            }])
            ->select('id', 'name', 'country_id', 'city_id' , 'menu')
            ->where('name', 'LIKE', '%' . $search . '%')->orderBy('name')->limit(2)->get();
        return response()->json($res);
    }
}
