<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(Request $request)
   {
       $this->validate($request, [
            'email' => 'required|unique:users|max:50|email',
            'password' => 'required|min:4'
       ]);
    
       $user = new User;
       $user->email = $request->email;
       $user->password = app('hash')->make($request->password);
       $user->save();

       if ($user){
            $data = ['message'=> 'Register Success'];
       } else {
            $data = ['message'=> 'Register Gagal'];
       }

       return response()->json($data,201);
   }

   public function login(Request $request)
   {
        $this->validate($request, [
            'email' => 'required|max:50|email',
            'password' => 'required|min:4'
        ]);

        $user = User::where('email',$request->email)->first();

        if (!$user) {
            $out = [
                "message" => "login_Gagal",
                "result"  => [
                    "token" => null,
                ]
            ];
            return response()->json($out, 401);
        }
        if (Hash::check($request->password, $user->password)) {
            $newtoken = Str::random(40);

            $user->api_token = $newtoken;
            $user->save();

            $out = [
                "message" => "login_Success",
                "code"    => 200, 
                "result"  => [
                    "token" => $newtoken,
                ]
            ];
        }else {
            $out = [
                "message" => "login_Gagal",
                "code"    => 401, 
                "result"  => [
                    "token" => null,
                ]
            ];
        }
        return response()->json($out, $out['code']);
    }
}