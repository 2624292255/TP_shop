<?php
namespace app\index\controller;

use       think\Session;
class Pub extends Common
{
     public function leave()
     {
         Session::delete('admin_name');
         $this->redirect('/index/login/index');
     }
}