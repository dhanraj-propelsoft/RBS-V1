<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    // -------------------- [ user registration view ] -------------
    public function index()
    {
        return view('registration');
    }

    // --------------------- [ Register user ] ----------------------
    public function userPostRegistration(Request $request)
    {
       // dd($request->all());

        // validate form fields
        $request->validate([
            'first_name'        =>      'required',
            'last_name'         =>      'required',
            'email'             =>      'required|email',
            'password'          =>      'required|min:6',
            'confirm_password'  =>      'required|same:password',
            'phone'             =>      'required|max:10'
        ]);

        $input          =           $request->all();

        // if validation success then create an input array
        $inputArray      =           array(
            'first_name'        =>      $request->first_name,
            'last_name'         =>      $request->last_name,
            'full_name'         =>      $request->first_name . " " . $request->last_name,
            'email'             =>      $request->email,
            'password'          =>      Hash::make($request->password),
            'phone'             =>      $request->phone
        );

        // register user
        $user = New User();
        $user->first_name =  $request->first_name;
        $user->last_name =  $request->last_name;
        $user->name =    $request->first_name . " " . $request->last_name;
        $user->email =  $request->email;
        $user->password =   Hash::make($request->password);
        $user->phone =    $request->phone;
        $user->save();


        // if registration success then return with success message
        if (!is_null($user)) {
            return back()->with('success', 'You have registered successfully.');
        }

        // else return with error message
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }


    // -------------------- [ User login view ] -----------------------
    public function userLoginIndex()
    {
        return view('login');
    }


    // --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request)
    {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }


    // ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard()
    {

        // check if user logged in
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect::to("user-login")->withSuccess('Oopps! You do not have access');
    }


    // ------------------- [ User logout function ] ----------------------
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('user-login');
    }
}
