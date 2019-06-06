<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class Common extends Controller
{
//检查是否登录
    public function _initialize()
    {
        if (!session('admin_name')) {
            $this->redirect('/index/login/index');
        }
        self::side();
    }
    public function side(){
        $menu = Db::name('menu')->where('menu_pid','=','0' and 'menu_status','=','1')->select();
        foreach($menu as $k => $v){
            $menus =  Db::name('menu')->where('menu_pid','=',$v['menu_id'])->select();
            if($menus){
                $menu[$k]['menus'] = $menus;
            }else{
                $menu[$k]['menus'] = 0;
            }
        }

       $this->assign('menu',$menu);
    }
}