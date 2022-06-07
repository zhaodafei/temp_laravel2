<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class FeiController extends Controller
{
    public function da()
    {
        return showMsg(10000, '1111111');
    }

    public function fei()
    {
        return showMsg(10000, '22222222');
    }
}
