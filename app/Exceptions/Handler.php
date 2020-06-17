<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $prefix = $request->route()->getPrefix();
        // 开启 api 接口调试模式
        if ($prefix && strpos($prefix, 'api') !== false && !env('APP_DEBUG', false)) {
            $result = [
                "error" => 1001,
                "msg" => '系统异常',
                "data" => '',
            ];
            return response()->json($result);
        }

        //
        if ($exception instanceof ApiExceptions) {
            $result = [
                "error" => 1001,
                "msg"    => $exception->getMessage(),
                "data"   => '',
            ];
            return response()->json($result);
        }
        return parent::render($request, $exception);
    }
}
