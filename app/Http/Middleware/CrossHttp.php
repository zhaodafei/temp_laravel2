<?php

namespace App\Http\Middleware;

use Closure;

class CrossHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        // $response->header('Access-Control-Allow-Origin', 'http://demo.yizheng_fei.com/user/login');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept, multipart/form-data, application/json');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $response->header('Access-Control-Expose-Headers', 'Authorization');
        return $response;

       //  $response = $next($request);
       //  //$response->header('Access-Control-Allow-Origin', 'http://192.168.1.100:9090');
       //  $origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
       //  $allow_origin = array(
       //      'http://192.168.1.100:8080',
       //      'http://192.168.137.1:8080',
       //      'http://127.0.0.1:8080'
       //  );
       //
       //
       //  if(in_array($origin, $allow_origin)){
       //      // header('Access-Control-Allow-Origin:'.$origin);
       //      $response->header('Access-Control-Allow-Origin', $origin);
       //      $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept, multipart/form-data, application/json');
       //      $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
       //  }
       // // $response->header('Access-Control-Allow-Credentials', 'false');
       //  $response->header('Access-Control-Expose-Headers', 'Authorization');
       //
       //  return $response;
       // // return $next($request);
    }
}