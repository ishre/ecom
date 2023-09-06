<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminController extends Controller
{
    //admin dashboard method 
    public function AdminDashboard(){

        return view('admin.index');

    }

    //logout function
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    //Login Functions
    public function AdminLogin(){

        return view('admin.admin_login');
        
    }


    //Profile Mod Functions
    public function AdminProfile(){

      
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
        
    }


    //store the supplied data 
    public function AdminProfileStore( Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo']= $filename;
        }

        $data->save();
      

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );  
        
        return redirect()->back()->with($notification);
    }


    //Change password Logic
    public function AdminChangePassword(){
        
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));

    }

    //Password Validation Checks
    public function AdminUpdatePassword(Request $request){

        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //Match the Old Password
        if (!Hash::check($request->old_password, auth::user()->password)){
            $notification= array(
                'message'=> 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        //Else update Password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message'=>'Password Changed Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }
}
