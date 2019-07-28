<?php

namespace App\Http\Controllers\Api;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;

class AuthController extends BaseController
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());       
        }
        $user = User::create([
          'name' => $request->name,
          'email'    => $request->email,
          'password' => $request->password,
         ]);
        $token = auth()->login($user);
        return $this->sendResponse( $this->respondWithToken($token), 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());       
        }
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return $this->sendError('Unauthorized', [], 401);
        }
        return $this->sendResponse($this->respondWithToken($token), 200);
    }

      /* user api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function user() 
    { 
        $user =Auth::guard('api')->user();// Auth::user(); 
        return $this->sendResponse($user, 200);
    } 

    public function logout()
    {
        auth()->logout();
        return $this->sendResponse(['message' => 'Successfully logged out'], 201);
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ];
    }


      //
    // /**
    //  * Create a new AuthController instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login','me']]);
    // }

 
}
