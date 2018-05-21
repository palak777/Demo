<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use JWTAuth;
use Response;

class usersController extends Controller
{
    //
    public function register(Request $request){

    	Users::create([
    		'user_name'=>$request->get("user_name"),
    		'password'=>bcrypt($request->get("password"))
    	]);
    	$user=Users::first();
    	$token=JWTAuth::fromUser($user);

    	return Response::json(compact('token'));
    }

    public function login(Request $request){
    	$credentials=$request->only('user_name','password');
    	try{
    		if(!$token=JWTAuth::attempt($credentials)){
    			return response()->json(['error'=>'Invalid Credentials'],401);
    		}
    	}
    	catch(JWTException $e){
    		return response()->json()(['eror'=>'Could not create token'],500);
    	}

    	return response()->json(compact('token'));
    }

     // public function logout(Request $request){
     // 	$this->validate($request,['token'=>	'required']);
     // 	try{
     // 		JWTAuth::invalidate($request->input('token'));
     // 		return response()->json(['success'=>true,'message'=>"You have successfully logged out"]);
     // 	}
     // 	catch(JWTException $e){
     // 		return response()->json(['success'=>false,'message'=>"Failed to logout Please try again",500]);	
     // 	}
     // }
}
