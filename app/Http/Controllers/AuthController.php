<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private $auth;

    /**
     * @param Request $request
     * @return UserResource|void
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        $token = auth()->attempt($request->only(['email', 'password']));

        if (!$token) {
            return abort(401);
        }

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return UserResource|void
     */
    public function login(Request $request)
    {
        $token = auth()->attempt($request->only(['email', 'password']));

        if (!$token) {
            return abort(401);
        }

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {
       auth()->logout();
       return response()->json(['message'=>'logout success'],200);
    }
}
