<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	  return view('auth.register');
    }

    public function getAllUsers()
    {
    	$users = User::get();

    	return view("users.list")->with(compact("users"));
    }

    public function doRegister(Request $req)
    {
    	$data = $req->all();
    	$rule =  [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'role' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

    	$validator = Validator::make($data,$rule);
    	if ($validator->fails()) {
            return redirect('auth/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User();

        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->username = $data['username'];
        $user->role = $data['role'];
        $user->active = 1;
        $user->password = bcrypt($data['password']);

        $user->save();

        return redirect("auth/users");
        

    }
}
