<?php
namespace app\index\controller;

use       think\Db;
class Index extends Common
{
    public function index(){
        return $this->fetch('index');
    }
}
