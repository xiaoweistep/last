<?php
namespace admin\user\controller;
use admin\common\controller\Common as admincommon;
use admin\user\service\AdminService;


class Admin extends admincommon
{
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * @return mixed 管理员列表
     */
    public function index()
    {
        $list = (new AdminService())->adminIndex();
        $this->assign('admin',$list);
        return $this->fetch(":admin_index");
    }
    /**
     * @return mixed 管理员增加
     */
    public function add()
    {
        $rolelist = (new AdminService())->roleIndex();
        $this->assign('role',$rolelist);
        return $this->fetch(":admin_add");
    }
    /**
     * @return mixed 管理员增加
     */
    public function save()
    {
        return (new AdminService)->saveAdmin();


    }

    /**
     * @return mixed 修改密码
     */
    public function editPass()
    {
        $admin = $this->request->session('ADMIN');
        $this->assign('admin',$admin);
        return $this->fetch(":editpass");
    }
    /**
     * @return mixed 操作修改密码
     */
    public function doEdit()
    {
        $input = $this->request->param();
        $oldpass =(new AdminService())->getOld();
        if($oldpass != md5(trim($input['user_pass']))){
            return $this->errorReturn('原密码错误');
        }
        return (new AdminService())->updateOld($input['newpass']);

    }
    /**
     * @return mixed 删除会员
     */
    public function deleteAdmin()
    {
       return (new AdminService())->deleteAdmin();;

    }
    /**
     * @return mixed 管理员登录日志
     */
    public function adminLog()
    {
        $list = (new AdminService())->adminLog();
        $this->assign('log',$list);
        return $this->fetch(":adminlog");
    }
    /**
     * @return mixed 退出登录
     */
    public function loginOut()
    {
        session('ADMIN_ID', null);
        session('ADMIN', null);
        return $this->redirect('user/login/login');
    }

}
?>