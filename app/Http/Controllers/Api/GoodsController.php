<?php


namespace App\Http\Controllers\Api;

use App\Exceptions\ApiExceptions;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * 访问地址 domain + /api/goods/list?per_page=6
     *     page: 1,   [默认会有这个参数]
     *     per_page: 10
     * @param Request $request
     * @return array
     */
    public function goodsList(Request $request)
    {
        // echo "GoodsController  bookList 访问成功";
        $perPage = $request->get('per_page', 3);
        $model = Goods::query()->where(['delNum' => 0])->orderBy('id','desc')->paginate($perPage);
        return showMsg(0, "success", $model->items(), $model->total());
    }

    // 访问地址 http://demo.yizheng_fei.com/api/goods/add
    public function goodsAdd(Request $request)
    {
        $goodsName = $request->post('goodsName',"测试数据");
        $unitPrice = $request->post('unitPrice');
        $goodsNumber = $request->post('goodsNumber',"1");
        $consumeWay = $request->post('consumeWay',"线上");
        $goodsComment = $request->post('goodsComment',"无");
        $consumeTime = $request->post('consumeTime');
        if (
            !$goodsName || !$unitPrice ||!$goodsNumber ||
            !$consumeWay || !$goodsComment || !$consumeTime
        ) {
            return showMsg(10000, '参数错误');
        }

        $model = new Goods();
        $model->goodsName = $goodsName;
        $model->unitPrice = $unitPrice;
        $model->goodsNumber = $goodsNumber;
        $model->countPrice = bcmul($goodsNumber,$unitPrice,2);
        $model->consumeWay = $consumeWay;
        $model->goodsNumType = date("Y-m-d",strtotime($consumeTime)) . substr(hash('sha512', time()), 0, 4);
        $model->goodsComment = $goodsComment;
        $model->consumeTime = $consumeTime;
        $model->createdTime = date("Y-m-d H:i:s");
        $model->delNum = 0;
        // $model->create_time = time();
        if ($model->save()) {
            return showMsg(0, '添加成功');
        }else{
            return showMsg(10000, '添加失败');
        }
    }

    // 访问地址 http://demo.yizheng_fei.com/api/goods/list?goodId=3
    public function goodsDetail(Request $request)
    {
        $id = $request->get('goodId',1);
        if (!$id) { // 没有参数,直接交给基类处理
            throw new ApiExceptions("goodId 请输入参数");
        }
        $model = Goods::query()->where(['id' => $id])->first();
        return showMsg(0, 'success', $model);
    }

    // 访问地址 http://demo.yizheng_fei.com/api/goods/list?goodId=3
    public function goodsDel(Request $request)
    {
        // 删除数据
        $ids = $request->post('book_ids');
        if (!$ids) {
            return showMsg(10000, 'book_ids 参数错误');
        }
        foreach ($ids as $key => $val) {
            Goods::query()->where(['id' => $val])->increment('delNum');
        }
        return showMsg(0, 'success');
    }

}
