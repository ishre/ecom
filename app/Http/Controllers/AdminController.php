<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
