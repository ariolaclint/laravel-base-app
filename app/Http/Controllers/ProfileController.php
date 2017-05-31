<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class ProfileController extends Controller
{
    public function profile()
    {
    	return view("profile.index");
    }

    public function profileEdit()
    {
    	return view("profile.edit");
    }

    public function profileUpdate(Request $request)
    {
    	$tmpdata = $request->all();
    	$data = $this->trimpostdata($tmpdata);


    	$validator = Validator::make($data, [
            'firstname' => 'required|min:2|max:255',
            'lastname' => 'required|min:2|max:255',
            'mobileno' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            
             return redirect('auth/profile/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
    	
    	$current_user = Auth::user();
    	$current_user->firstname = $data['firstname'];
    	$current_user->lastname = $data['lastname'];
    	$current_user->mobileno = $data['mobileno'];
    	$current_user->email = $data['email'];
    	$current_user->save();

    	return redirect("auth/profile");
    }
}
