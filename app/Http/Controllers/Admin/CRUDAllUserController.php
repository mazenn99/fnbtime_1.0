<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UserEditInformationRequest;
use App\Model\Admins;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CRUDAllUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['country' => function ($query) {
            $query->select('id', 'name');
        }, 'city' => function ($query) {
            $query->select('id', 'name');
        }])->Selection()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * Add new Admin in the system
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateAdminRequest $request)
    {
        $request['password'] = Hash::make($request->input('password'));
        Admins::create($request->all());
        return redirect()->back()->with(['success' => 'Added New Admin Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditInformationRequest $request, User $user)
    {
        $user->update([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'password'      => $request->input('password') ? Hash::make($request->input('password')) : $request->input('oldPass'),
            'country_id'    => $request->input('country'),
            'city_id'       => $request->input('city'),
            'subscription'  => $request->input('subscription') ? 1 : 0,
        ]);
        return redirect()->back()->with(['success' => 'Successfully Updated Information']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['success' => 'Deleted User Successfully']);
    }

    /*
     * search for users
     */

    public function searchInput(Request $request)
    {
        $output = '';

        $users = User::where('email', 'like', '%' . $request->input('search') . '%')
            ->orWhere('name',   'like',       '%' . $request->input('search') . '%')
            ->orWhere('phone' , 'like' ,      '%' . $request->input('search') . '%')
            ->get();
        if (!(empty($users))) {
            foreach ($users as $user) {
                $output .= '
                    <tr>
                            <td>' . $user->id . '               </td>
                            <td>' . $user->email . '            </td>
                            <td>' . $user->name . '             </td>
                            <td>' . $user->phone . '            </td>
                            <td>' . $user->country->name . '    </td>
                            <td>' . $user->city->name . '       </td>
                            <td>' . $user->getSubscription() . '</td>
                            <td>' . $user->getVerified() . '    </td>
                            <td>' . $user->created_at . '</td>
                            <td>' . \App\Model\Booking::where('user_id' , $user->id)->count() . '</td>
                            <td>
                                <a href=' . route('users.edit', $user->id) . '
                                   class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action=' . route('users.destroy', $user->id) . ' method="POST"
                                      class="d-inline-block">
                                    ' . method_field('delete') . '
                                    ' . @csrf_field() . '
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
