<?php
namespace app\index\controller;
use app\common\controller\User as commonUser;
class Index extends commonUser
{
    public function index()
    {
       // var_dump($this->request->domain());
        return $this->fetch('index');
    }
    public function info()
    {
        $config =Config('database');
        dump($config);die;
    }

}
