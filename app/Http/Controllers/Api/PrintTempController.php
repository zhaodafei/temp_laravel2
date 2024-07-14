<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintTempController extends Controller
{
    // 访问地址 http://demo.yizheng_fei.com/api/print/list
    public function printList(Request $request)
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
