<?php
namespace app\index\controller;
use       think\Controller;
use       think\Request;
use       app\index\model\Login as log;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login');
    }
    public function login(Request $request)
    {
       if($request->isAjax())
       {
           if($request->isPost())
           {
               $admin = $request->post();
               $log = new log;
               $status = $log->login($admin);
               if($status['status'] == '200')
               {
                 return json(['status'=>$status['status'],'message'=>$status['message']]);
               }
               return json(['status'=>$status['status'],'message'=>$status['message']]);
           }
           return json(['status'=>'300','message'=>'非法错误']);
       }
        return json(['status'=>'301','message'=>'非法错误']);

    }
}
