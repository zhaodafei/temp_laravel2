<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiExceptions;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 访问地址 http://demo.yizheng_fei.com/api/book/list?per_page=6
    public function bookList(Request $request)
    {
        // echo "BookController  bookList 访问成功";
        $perPage = $request->get('per_page', 3);
        $model = Book::query()->orderBy('id','desc')->paginate($perPage);
        return showMsg(0, "success", $model->items(), $model->total());
    }

    // 访问地址 http://demo.yizheng_fei.com/api/book/add
    public function bookAdd(Request $request)
    {
        $name = $request->post('name');
        $price = $request->post('price');
        $author = $request->post('author');
        if (!$name || !$price ||!$author) {
            return showMsg(10000, '参数错误');
        }

        $model = new Book();
        // $model->name = '我是随机 admin_' . substr(hash('ripemd160', time()), 0, 4);
        // $model->price = mt_rand(0, 100);
        // $model->author = 'admin_test_' . mt_rand(0, 100);

        $model->name = $name . substr(hash('ripemd160', time()), 0, 4);
        $model->price = $price + mt_rand(0, 100);
        $model->author = $author. mt_rand(0, 100);
        // $model->create_time = time();
        if ($model->save()) {
            return showMsg(0, '添加成功');
        }else{
            return showMsg(10000, '添加失败');
        }

    }

    // 访问地址 http://demo.yizheng_fei.com/api/book/detail?bookId=3
    public function bookDetail(Request $request)
    {
        // exit("请求成功");
        $id = $request->get('bookId',3);
        if (!$id) { // 没有参数,直接交给基类处理
            throw new ApiExceptions("请输入参数");
        }
        $model = Book::query()->where(['id'=>$id])->first();
        return showMsg(0, 'success', $model);
    }

    // 访问地址 http://demo.yizheng_fei.com/api/book/del?id=3
    public function bookDel(Request $request)
    {
        $ids = $request->post('book_ids');
        if (!$ids) {
            return showMsg(10000, '参数错误');
        }
        foreach ($ids as $key => $val) {
            Book::query()->where(['id' => $val])->increment('num_add');
        }
        return showMsg(0, 'success');
    }

}
