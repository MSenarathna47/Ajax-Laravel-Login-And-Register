<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function Register()
    {
        return view('auth.register');
    }

    public function Forgot()
    {
        return view('auth.forgot');
    }

    public function Reset()
    {
        return view('auth.reset');
    }





    public function saveUser(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|max:50',
            'cpassword' => 'required|min:6|same:password'

        ],[
            'cpassword.same' => 'password did not matched!',
            'cpassword.required' => 'confirm password is required!'

        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 200,
                'messages'=> 'Registerd Succesfully'
            ]);
        }
    }
}
