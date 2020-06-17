<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Jwt
{
    protected $except = [
        "rules.file.cre"
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = Route::currentRouteName();
        if(in_array($routeName, $this->except)) {
            return $next($request);
        }

        $newToken = null;
        try {
            $auth = JWTAuth::parseToken();
        } catch (JWTException $e) {
            $data = showMsg(401, '请携带正确的token -jwt中间件');
            return response()->json($data, 401);
        }

        $token = $auth->setRequest($request)->getToken();
        if(!$token) {
            $data = showMsg(401, 'token错误');
            return response()->json($data, 401);
        }

        try {
            $user = $auth->authenticate($token);

            if(!$user) return response()->json(showMsg(401, '用户不存在'), 401);

            $request->headers->set('Authorization','Bearer '.$token);
        } catch (TokenExpiredException $e) {
            try {
                sleep(rand(1,5)/100);
                $newToken = JWTAuth::refresh($token);
                # 给当前的请求设置新的token,以备在本次请求中需要调用用户信息
                $request->headers->set('Authorization','Bearer '.$newToken);

                # 将旧token存储在cache中,1分钟内再次请求是有效的
                $blacklist = Cache::get('token_blacklist:'. $token);
                if(!$blacklist) Cache::add('token_blacklist:' . $token, $newToken, 1);
            } catch (JWTException $e) {
                # 在黑名单的有效期,放行
                if($newToken = Cache::get('token_blacklist:'.$token)){
                    # 给当前的请求设置新的token,以备在本次请求中需要调用用户信息
                    $request->headers->set('Authorization','Bearer '.$newToken);

                    return $next($request);
                }

                # 过期用户
                return response()->json(showMsg(401, '账号信息过期了，请重新登录'), 401);
            }
        } catch (JWTException $e) {
            return response()->json(showMsg(401, '请登录'), 401);
        }
        $response = $next($request);

        if ($newToken) {
            $response->headers->set('Authorization', 'Bearer '.$newToken);
        }

        return $response;
    }
}
