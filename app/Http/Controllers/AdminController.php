<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification=array(
            'message'=>'Logged out successfully',
            'alert-type'=>'info'
        );
        return redirect('/login')->with($notification);
    } //end method


    public function Profile(){
        $id=Auth::user()->id;
        $profileData=User::findOrFail($id);
        return view('admin.admin-profile',compact('profileData'));
    }//end method

    public function ProfileEdit(){
        $id=Auth::user()->id;
        $editProfile=User::findOrFail($id);
        return view('admin.admin-profile-edit',compact('editProfile'));
    }//end method


    public function ProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::findOrFail($id);
        $data->name=$request->name;
        $data->username=$request->username;
        $data->email=$request->email;
        if($request->file('profile_image')){
            $file=$request->file('profile_image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images'),$filename);
            $data['profile_images']=$filename;
        }
        $data->save();
        $notification=array(
            'message'=>'Profile updated successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('admin.profile')->with($notification);
    }//end method

    public function ChangePassword(){
        return view('admin/admin-change-password');
    }//end method

    public function UpdatePassword(Request $request){
            $valditedData=$request->validate([
                'oldpassword'=>'required',
                'newpassword'=>'required',
                'confirm_password'=>'required|same:newpassword',
            ]);
            $hashedPassword=Auth::user()->password;
            if(Hash::check($request->oldpassword,$hashedPassword)){
                $id=Auth::user()->id;
                $user=User::findOrFail($id);
                $user->password=bcrypt($request->newpassword);
                $user->save();
                session()->flash('message','password updated successfully');
                return redirect()->back();
            }else {
                session()->flash('message','Old password is wrong');
                return redirect()->back();
            }
    }
}
