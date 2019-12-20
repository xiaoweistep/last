<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20
 * Time: 13:42
 */
namespace admin\auth\controller;
use csf\controller\AdminBaseController;

class Auth extends AdminBaseController
{
    public function _empty($name)
    {
        $auth =  new \thinkcms\auth\Auth();
        $auth = $auth->autoload($name);
        if($auth){
            if(isset($auth['code'])){
                return json($auth);
            }elseif(isset($auth['file'])){
                return $auth['file'];
            }
            $this->view->engine->layout(false);
            return $this->fetch($auth[0],$auth[1]);
        }
        return abort(404,'页面不存在');
    }
}