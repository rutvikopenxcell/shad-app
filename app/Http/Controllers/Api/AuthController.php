<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Auth;
use DB;


class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
       
        DB::beginTransaction();
        try {
            $request_data = [
                'email' => $request->email,
                'passwo56rd' => $request->password
            ];
            if (auth()->attempt($request_data)) {
                $token = auth()->user()->createToken('shad_app')->accessToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
            // Perform database operations
            DB::commit();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 200);
            echo $e->getMessage();
            // Handle transaction failure
            DB::rollBack();
        }
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('shad_app')->accessToken;
        return response()->json(['token' => $token], 200);
    }

    public function profileEdit()
    {
        $auth = Auth::user();
    }

    public function profileUpdate()
    {
    }
    public function profileDelete()
    {
    }
}
