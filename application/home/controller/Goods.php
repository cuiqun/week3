<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Goods extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return view('Goods/goods');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function addGoods()
    {
//        $param=input($id);
//        if (!is_numeric($id)){
//            return redirect('Login/login');
//        }
//        $data = \app\home\model\Goods::paginate(10);
        $data = collection(\app\home\model\Goods::select())->toArray();
        dump($data);
        die();
        if ($data){
            return json(['code'=>200,'msg'=>'ok','data'=>$data]);
        }
    }
}
