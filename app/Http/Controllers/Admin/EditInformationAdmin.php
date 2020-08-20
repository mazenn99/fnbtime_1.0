<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAdminInformationRequest;
use App\Model\Admins;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditInformationAdmin extends Controller
{
    public function edit() {
        return view('admin.edit');
    }

    public function update(EditAdminInformationRequest $request) {
        $admin =  Admins::findOrFail(Auth::guard('admin')->user()->id);
        $photo = '';
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if(!(is_null($admin->photo))) {
                $path = public_path() . '\adminFrontEnd\images\avatar\\' . $admin->photo;
                unlink($path);
                $photo = $this->saveImage($request->file('photo') , 'adminFrontEnd/images/avatar');
            } else {
                $photo = $this->saveImage($request->file('photo'), 'adminFrontEnd/images/avatar');
            }
        }
        $admin->update([
            'email' => $request->input('email') ,
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $admin->password,
            'name' => $request->input('name'),
            'photo' => $photo,
        ]);
        return redirect()->back()->with(['success' => 'Updated Information Successfully']);
    }

    /*
     * function saveImage upload menu images
     */
    public function saveImage($image, $path)
    {
        $file_extention = $image->getClientOriginalExtension();
        $file_name = bin2hex(random_bytes(15)) . '_' . time()  . '.' . $file_extention;
        $image->move($path, $file_name);
        return $file_name;
    }

}
