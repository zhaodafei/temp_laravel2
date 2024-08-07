<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    // 测试有没有接受到参数
    public function fei1(Request $request)
    {
        $fei1 = $request->get('fei1');
        $fei2 = $request->get('fei2');
        $fei3 = $request->get('fei3','没有接受到值');
        $resArr = [
            'fei1'=>$fei1,
            'fei2'=>$fei2,
            'fei3'=>$fei3,
        ];
        return showMsg(0, 'success',$resArr);
    }
}
