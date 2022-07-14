<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $valid_rules=[
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required'
      ];

    public function createUser(Request $req)
    {
      try {
      $validateUser = Validator::make($req->all(),$this->valid_rules);
      if ($validateUser->fails())
         return response()->json($validateUser->errors(),401);
      $user=User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => Hash::make($req->password)
      ]);
      return response()->json($user->createToken("API TOKEN")->plainTextToken,200);
    }

      catch (\Throwable $th)
      {
        return response()->json($th->getMessage(),500);
      }
    }

  public function loginUser(Request $req)
  {
    try {
    $validateUser = Validator::make($req->all(),['email'=>'required|email','password'=>'required']);
     if($validateUser->fails())
       return response()->json($validateUser->errors(),401);

    if(!Auth::attempt($req->only(['email','password'])))
        return response()->json('Incorrect Name, Email Or Password',401);

    $user= User::where('email',$req->email)->first();
      return response()->json($user->createToken("API TOKEN")->plainTextToken,200);
  }

    catch (\Throwable $th)
    {
        return response()->json($th->getMessage(),500);
    }

  }
}
