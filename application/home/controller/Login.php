<?php

namespace app\home\controller;

use think\Controller;

class Login extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function loginDo(){
        //接收参数
        $param=input();
        //验证
        $result=$this->validate($param,[
            'uname' => 'require',
            'upwd' => 'require'
        ]);
        if(true !== $result){
            return json(['code'=>403,'msg'=>$result,'data'=>[]]);
        }
//        查询数据
        $data=\app\home\model\Login::where('uname',$param['uname'])->find();
        //判断
        if ($data){
            if ($data['password']==md5($param['password'])){
                //设置登录表示
                session("user",$data);
                return json(['code'=>200,'msg'=>'登录成功','data'=>$data]);
            }else{
                return json(['code'=>500,'msg'=>'密码错误','data'=>[]]);
            }
        }else{
            return json(['code'=>500,'msg'=>'用户名错误','data'=>[]]);
        }
    }
}
