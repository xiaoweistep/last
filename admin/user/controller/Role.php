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
        return $this->fetch(":role_index");
    }
    /**
     * @return mixed 角色增加
     */

    public function add()
    {
        $action =  (new AdminService())->actionIndex();
        $this->assign('actionList',$action);
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
     * @return mixed 角色编辑页面
     */
    public function edit()
    {
        return $this->fetch(":role_edit");
    }
    /**
     * @return mixed 角色删除
     */
    public function deleteRole()
    {
        return (new AdminService)->deleteRole();
    }
    /**
     * @return mixed 权限导航列表
     */
    public function actionIndex()
    {
        $list = (new AdminService())->actionIndex();


        $this->assign('role_action',$list);
        return $this->fetch(":action_role");
    }
    /**
     * @return mixed  权限导航添加
     */
    public function actionAdd()
    {
//        $list = (new AdminService())->actionIndex();
//        $this->assign('role',$list);
        return $this->fetch(":action_add");
    }
    /**
     * @return mixed  权限导航保存
     */
    public function saveAction()
    {
        return (new AdminService())->saveAction();
    }
    /**
     * @return mixed  权限导航编辑
     */
    public function actionEdit()
    {
         if(!$this->request->param('id')){
            exit('参数错误');
         }
        $detail = (new AdminService())->actionDetail();
        $list = (new AdminService())->actionFirst();
        $this->assign('action_detail',$detail);
        $this->assign('list',$list);
        return $this->fetch(":action_edit");
    }
    /**
     * @return mixed  权限导航编辑
     */
    public function actionUpdate()
    {
       return (new AdminService())->actionUpdate();
    }
    /**
     * @return mixed  删除菜单
     */
    public function actionDeal()
    {
        return (new AdminService())->actionDeal();

    }



}
?>