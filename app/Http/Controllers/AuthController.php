<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($request->remember){
            Cookie::queue('email', $credential['email'], 60 * 24 * 7);
        }
            
        if(Auth::attempt($credential)){

            return redirect('/');
        }

        return redirect()->back()->with('error', 'wrong email or password');
    }

    public function register(Request $request)
    {
        // dd($request);
        $credential = $request->validate([
            'username' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
            'term' => 'required'
        ]);
        
        // if ($request->password != $request->confirmPassword) {
        //     return redirect()->back()->withErrors("Confirm Password does not match with the password.");
        // }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = "";
        $user->phoneNumber = "";
        $user->image = "";
        // $user->gender = $request->gender;
        // $user->dob = $request->dob;
        $user->role = 'user';
        $user->save();

        return redirect('/login');
    }

    public function changePassword(Request $request)
    {
        
        if (!(Hash::check($request->currPassword, Auth::user()->password))) {
            
            return redirect()->back()->with("error","Current Password does not match with the Your Password.");
        }
        
        $request->validate([
            'currPassword' => 'required',
            'newPassword' => 'required|min:8',
            'newConfirmPassword' => 'required|same:newPassword'
        ]);

        // if ($request->newPassword != $request->newConfirmPassword) {
        //     return redirect()->back()->with("error","New Confirm Password does not match with the New password.");
        // }

        $password['password'] = Hash::make($request->newPassword);

        User::where('email', '=', Auth::user()->email)->update($password);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
