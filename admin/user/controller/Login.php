<?php
namespace admin\user\controller;
use think\captcha\Captcha;
use think\Controller;
use admin\user\model\Admin;
use admin\user\model\Adminlog;



class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_isLogin();
    }
    public function _isLogin(){

        $islogin = $this->request->session('ADMIN_ID');

        if($islogin){
            return $this->redirect("/admin/Index/index");
        }
    }
    public function login()
    {
        return $this->fetch(":login");
    }

    public function doLogin()
    {
        $input = $this->request->param();
        if(isset($input['code']) && !empty($input['code'])){
            $check = $this->check_verify($input['code']);
            if($check ===false){
                //return  $this->errorReturn('验证码错误');
            }
        }
        $arr['user_login'] = $this->request->param('user_login');
        $user=(new admin)->where($arr)->find();
        if(empty($user)){
            return $this->errorReturn('没有该用户');
        }
        if($user['user_pass'] != md5(trim($this->request->param('user_pass')))){
            return $this->errorReturn('密码错误');
        }

        if($user['user_status'] == 1){
            return $this->errorReturn('该用户已禁用');
        }
        return $this->userToken($user);
    }
    public function captchaImg()
    {
        $config =    [
            // 验证码字体大小(px)
            'fontSize' => 16,
            // 验证码字体大小(px)
            'useCurve' => false,
            // 是否画混淆曲线
            'useNoise' => false,
            // 验证码图片高度
            'imageH'   => 43,
            // 验证码图片宽度
            'imageW'   =>100,
            // 验证码位数
            'length'   => 4,
            // 背景颜色
            'bg'       => [243, 251, 254],
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
    /**
     * 检测输入的验证码是否正确
     *
     * @param $code 为用户输入的验证码字符串，
     * @param $id 多个验证码标识
     *
     */
    function check_verify($code, $id = ''){
        $captcha = new Captcha();
        return $captcha->check($code, $id);
    }
    /**
     * 保存登录记录
     *
     * @param $user 后台管理员信息，
     *
     */
    public function userToken($user)
    {

        if (empty($user)) return $this->errorReturn("登录失败!");

        $this->userActionLog($user);
        unset($user['user_pass']);

//        unset($user['mobile']);
        session('ADMIN',$user);
        session('ADMIN_ID',$user['id']);
        cookie('ADMIN', $user,60*60*24*30);//保存30天
        return $this->successReturn("登录成功!", ['user' => $user]);
    }
    /**
     * 记录后台登录信息
     *
     * @param $user 后台管理员信息，
     *
     */
    public function userActionLog($user)
    {
        if(empty($user)) return $this->errorReturn("登录失败!");
        $Adminlog         = new Adminlog;
        $Adminlog->admin_name     = $user['user_login'];
        $Adminlog->admin_id     = $user['id'];
        $Adminlog->operate_time     = time();
        $Adminlog->action     = '登录';
        $Adminlog->ip     = $this->get_client_ip();
        $res = $Adminlog->save();

        if (empty($res)) return $this->errorReturn("日志写入失败！");
    }

}
?>