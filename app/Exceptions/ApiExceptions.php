<?php

namespace App\Exceptions;

use Throwable;

/**
 * Class ApiExceptions
 * api 接口异常基类
 *
 * 使用方法
 * throw new ApiExceptions($msgStr);
 * @package App\Exceptions
 */
class ApiExceptions extends \Exception
{
    function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}