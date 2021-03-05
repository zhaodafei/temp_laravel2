<?php


namespace App\Http\Controllers\Api;


use App\Exceptions\ApiExceptions;
use App\Http\Controllers\Controller;
use App\Models\BillCount;
use App\Models\Goods;
use DB;
use Illuminate\Http\Request;

class BillCountController extends Controller
{
    /**
     * 访问地址 domain + /api/bill-count/list?per_page=6
     *     page: 1,   [默认会有这个参数]
     *     per_page: 10
     * @param Request $request
     * @return array
     */
    public function billCountList(Request $request)
    {
        $perPage = $request->get('per_page', 3);
        $model = BillCount::query()->where(['delNum' => 0])->orderBy('id','desc')->paginate($perPage);
        return showMsg(0, "success", $model->items(), $model->total());
    }

    public function billCountAdd(Request $request)
    {
        $startTime = $request->post('startTime'); // 1990-01-15 格式
        $endTime = $request->post('endTime'); // date("Y-m-d",strtotime($startTime))
        $consumeWay = $request->post('consumeWay',"所有");
        if (
            !$startTime || !$endTime ||!$consumeWay
        ) {
            return showMsg(10000, '参数错误');
        }

        $allCount = Goods::query()
            ->whereBetween('consumeTime', [$startTime . " 00:00:00", $endTime . " 11:59:59"])
            // ->where("consumeTime",'>=',$startTime)
            // ->where("consumeTime",'<=',$endTime)
            ->where(['delNum' => 0])
            ->sum('countPrice');

        $model = new BillCount();
        $model->startTime = $startTime;
        $model->endTime = $endTime;
        $model->allCount = $allCount;
        $model->delNum = 0;
        if ($model->save()) {
            return showMsg(0, '添加成功');
        }else{
            return showMsg(10000, '添加失败');
        }
    }

    public function billCountBudget(Request $request)
    {
        $startTime = $request->post('startTime'); // 1990-01-15 格式
        $endTime = $request->post('endTime'); // date("Y-m-d",strtotime($startTime))
        $consumeWay = $request->post('consumeWay',"所有");
        if (
            !$startTime || !$endTime ||!$consumeWay
        ) {
            return showMsg(10000, '参数错误');
        }

        $allCount = Goods::query()
            ->whereBetween('consumeTime', [$startTime . " 00:00:00", $endTime . " 11:59:59"])
            ->where(['delNum' => 0])
            ->sum('countPrice');

        return showMsg(0, 'success', ['allCount' => $allCount]);
    }

    public function billCountDel(Request $request)
    {
        $ids = $request->post('bill_count_ids');
        if (!$ids) {
            return showMsg(10000, 'book_ids 参数错误');
        }
        foreach ($ids as $key => $val) {
            BillCount::query()->where(['id' => $val])->increment('delNum');
        }
        return showMsg(0, 'success');
    }
}
