<?php
namespace  app\index\model;

use        think\Model;
use        think\Db;
use        think\Session;
class Login extends Model
{
    protected $table = 'admin';
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

    public function login($admin)
    {
          if(!$admin)
          {
              return ['status'=>'500','message'=>'用户名或密码为空!'];
          }
          $status = Db::name('admin')->where('admin_name','=',$admin['admin_name'],'and','admin_pwd','=',$admin['admin_pwd'])->find();
          if(!$status)
          {
              return ['status'=>'404','message'=>'用户名或密位错误!'];
          }
          Session::set('admin_name',$status['admin_name']);
          return ['status'=>'200','message'=>'登录成功！'];

    }
}