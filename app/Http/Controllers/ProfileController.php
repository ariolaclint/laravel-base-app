<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use File;
use Response;

class ProfileController extends Controller
{
    public function profile()
    {
        return view("profile.index");
    }

    public function getProfilePic($pathname)
    {
       $path = storage_path('app/public/' . $pathname);

       if (!File::exists($path)) {
          abort(404);
       }

       $file = File::get($path);
       $type = File::mimeType($path);

       $response = Response::make($file, 200);
       $response->header("Content-Type", $type);

       return $response;
    }

    public function updateProfilePic(Request $req)
    {
        $user = Auth::user();

        $filename = $req->file('profilepicInput')->getClientOriginalName();
        $user->profilepic = $filename;

        $path = $req->file('profilepicInput')->storeAs(
            'public', $filename
        );

        $user->save();

        return redirect ('auth/profile');
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

    public function changePassword(Request $request)
    {
        $tmpdata = $request->all();
        $data = $this->trimpostdata($tmpdata);

        $username = Auth::user()->username;

        $rule = array(  
            'current_password' => 'required|chekckpassword',
            'password' => 'required|same:password_confirmation|min:6',
        );
        
        Validator::extend('chekckpassword', function ($attribute, $value) 
        {
            if (Auth::validate(array('email' => Auth::user()->email, 'password' => $value))){
                return true;
            }
            
        });

        $messages = array(
            'current_password.chekckpassword' => 'Current password is incorrect.',
        );

        $validator = Validator::make($data,$rule,$messages);

        if ($validator->fails())
        {
            return ["status"=> 400, "error"=>$validator->messages()];
        }

        $user = Auth::user();
        $user->password = bcrypt($data['password']);
        $user->save();

        return ["status"=> 200 ];
    }
}
