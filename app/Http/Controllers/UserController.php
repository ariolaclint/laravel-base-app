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
        $users = User::where("role","!=","R01")->get();

        return view("users.list")->with(compact("users"));
    }

    public function getUserView($id)
    {
        $user = User::find($id);
        return view("users.view")->with(compact("user"));
    }

    public function getUserEdit($id)
    {
        $user = User::find($id);
        return view("users.edit")->with(compact("user"));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->role == "R01")
               return "Access Denied";
        $user->delete();

        return redirect('auth/users');
    }

    public function getUserUpdate(Request $request,$id)
    {
        $tmpdata = $request->all();
        $data = $this->trimpostdata($tmpdata);

       $rule =  [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'mobileno' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|max:255',
            'active' => 'required|max:1',
        ];

        $validator = Validator::make($data,$rule);
        if ($validator->fails()) {
            return redirect('auth/users/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        if($data['role'] == "R01")
        {
            return "Access Denied";
        }

    	$user = User::find($id);
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->mobileno = $data['mobileno'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->active = $data['active'];
        $user->save();

    	return redirect('auth/users/' . $id . "/view");
    }

    public function doRegister(Request $request)
    {
        $tmpdata = $request->all();
        $data = $this->trimpostdata($tmpdata);

    	$rule =  [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'mobileno' => 'required|max:255',
            'email' => 'required|email|max:255',
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

        if($data['role'] == "R01")
        {
            return "Access Denied";
        }

        $user = new User();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->mobileno = $data['mobileno'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->role = $data['role'];
        $user->active = 1;
        $user->password = bcrypt($data['password']);

        $user->save();

        return redirect("auth/users");
    }

    public function changePassword(Request $request,$id)
    {
        $tmpdata = $request->all();
        $data = $this->trimpostdata($tmpdata);
            $rule = array(  
            'password' => 'required|same:password_confirmation|min:6',
        );
        
        $validator = Validator::make($data,$rule);

        if ($validator->fails())
        {
            return ["status"=> 400, "error"=>$validator->messages()];
        }

        $user = User::find($id);

        if($user->role == "R01")
                return ["status"=> 400, "error"=> array("invalid" => "Access Denied.")];

        $user->password = bcrypt($data['password']);
        $user->save();

        return ["status"=> 200 ];

    }
}
