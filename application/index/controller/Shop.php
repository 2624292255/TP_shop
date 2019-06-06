<?php
namespace app\index\controller;

use       think\Db;
use       think\Session;
use       think\Request;
use       app\index\model\ Shop as Sho;
class Shop extends Common{
    public function index(){
        $shop = new Sho;
        $list = $shop->index();
        $this->assign('list',$list);
        return $this->fetch('index');
    }
    public function add(){
    }
    public function ajax_status(Request $request){
        if (!session('admin_name')) {
            return json(['status'=>'400','message'=>'异常错误，请刷新页面']);
        }
        if(!$request->isAjax()){
            return json(['status'=>'401','message'=>'请求错误，请刷新页面']);
        }
        if(!$request->isPost()){
            return json(['status'=>'402','message'=>'请求错误，请刷新页面']);
        }
        $id = $request->post('id');
        if(!$id){
            return json(['status'=>'403','message'=>'请求失效，请刷新页面']);
        }
        $shop = new Sho;
        $status = $shop->ajax_status($id);
        if($status['status'] == '200'){
            return json(['status'=>$status['status'],'message'=>$status['message']]);
        }else{
            return json(['status'=>$status['status'],'message'=>$status['message']]);
        }
    }
}
?>