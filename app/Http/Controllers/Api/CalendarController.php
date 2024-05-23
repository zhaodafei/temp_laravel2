<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CalendarData;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    // 访问地址 http://demo.yizheng_fei.com/api/calendar/list
    public function calendarList(Request $request){
        $perPage = $request->get('per_page', 50);

        // desc(降序); asc(升序)
        $model = CalendarData::query()
            ->where('isDel','=','0')
            ->orderBy('id','asc')
            ->paginate($perPage);
        return showMsg(0, "success", $model->items(), $model->total());
    }
}
