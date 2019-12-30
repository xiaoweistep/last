<?php
namespace admin\user\controller;
use admin\common\controller\Common as admincommon;
use admin\user\service\AdminService;


class Role extends admincommon
{
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * @return mixed 角色列表
     */
    public function index()
    {
        $list = (new AdminService())->roleIndex();
        $this->assign('role',$list);
        return $this->fetch(":role");
    }
    /**
     * @return mixed 角色增加
     */

    public function add()
    {
        return $this->fetch(":role_add");
    }
    /**
     * @return mixed 角色增加
     */
    public function save()
    {
        return (new AdminService)->saveAdmin();
    }
    /**
     * @return mixed 角色操作列表
     */
    public function actionIndex()
    {
        $list = (new AdminService())->roleIndex();
        $this->assign('role',$list);
        return $this->fetch(":action_role");
    }
    /**
     * @return mixed 角色操作列表
     */
    public function actionAdd()
    {
        $list = (new AdminService())->roleIndex();
        $this->assign('role',$list);
        return $this->fetch(":action_add");
    }



}
?>