<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function signUp(Request $request)
    {
        //validate input data
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'user_name' => 'required|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'password' => 'required|min:8',
            'terms_checkbox' => 'accepted'
        ]);

        /* request passed into this function
         * variable is picked out for $_POST by name attribute
        */
        $email = $request['email'];
        $username = $request['user_name'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];

        $confirmationCode = str_random(30);


        //encrypt password
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->user_name = $username;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->password = $password;
        $user->confirmation_code = $confirmationCode;
        $user->save();




        return redirect()->route('lb-dashboard');
    }

    public function signIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        //authenticate user login
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('lb-dashboard');
        }
        return redirect()->back();
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'user_name' => 'nullable|unique:users',
            'first_name' => 'nullable|max:50',
            'last_name' => 'nullable|max:50'
        ]);

        $user = Auth::user();

        $username = $request['user_name'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];

        if($user->password = bcrypt($request['password'])) {
            if($username != null)
                $user->user_name = $username;
            if($first_name != null)
                $user->first_name = $first_name;
            if($last_name != null)
                $user->last_name = $last_name;
            $user->update();

        }
        return redirect()->route('lb-dashboard');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8'
        ]);

        $user = Auth::user();

        $old_password = $request['old_password'];
        $new_password = $request['new_password'];

        if($user->password = bcrypt($old_password)) {
            $user->password = bcrypt($new_password);
            $user->update();
        }
        return redirect()->route('lb-dashboard');
    }

    public function sendPasswordReset(Request $request)
    {
        $this->validate($request, [
            'identifier' => 'required',
        ]);

        $userQuery = User::where('user_name', $request['identifier'])->orWhere('email', $request['identifier'])->get();

        if($userQuery->count())
            return view('public.new-password-sent-confirm');


        return redirect()->route('index');
    }
}
