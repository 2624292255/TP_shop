<?php
namespace  app\index\model;

use        think\Model;
use        think\Db;
use        think\Session;
class Shop extends Model
{
    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'shop',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => 'root',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'think_',
        // 数据库调试模式
        'debug'       => false,
    ];

   public function index()
   {
       $info = Db::name("shop")->order("shop_id desc")->select();
       return $info;
   }
   public function ajax_status($id)
   {
       if(!$id)
       {
           return ['status'=>'406','message'=>'模型id为空'];
       }
       $status = Db::name('shop')->field('shop_status')->where('shop_id','=',$id)->find();
       if(!$status)
       {
           return ['status'=>'407','message'=>'数据库操作失败'];
       }
       if($status == '1')
       {
          $info = Db::name('shop')->where('shop_id','=',$id)->update(['shop_status'=>'0']);
          if($info)
          {
              return ['status'=>'200','message'=>'操作成功'];
          }
       }else{
          $info = Db::name('shop')->where('shop_id','=',$id)->update(['shop_status'=>'1']);
           if($info)
           {
               return ['status'=>'200','message'=>'操作成功'];
           }
       }

   }
}