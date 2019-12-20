<?php
namespace admin\common\controller;
use think\Controller;
use think\Request;

class Common extends  Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->is_login();
    }
    /**
     * 检测用户是否登录
     * @return mixed
     */
     protected function is_login(){
        $user = session('?adminuser');
//        if (!$user) {
//            return $this->redirect("user/login/login");
//        } else {
//            $user=session('adminuser');
//            return  $user;
//        }
    }
}

?>