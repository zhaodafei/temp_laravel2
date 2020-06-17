<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * 访问地址 http://demo.yizheng_fei.com/api/user/login
     *
     * 跨域
     * php artisan make:middleware CrossHttp
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $credentials = request(['account_name', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => '2001','msg' => '账户不存在'], 200);
        }

        return showMsg(0, "success", $this->respondWithToken($token));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    /**
     *  Refresh a token.
     *  @return array
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param $token
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ];
    }
}
