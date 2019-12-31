<?php
namespace admin\user\service;
use admin\user\model\Admin;
use admin\user\model\Adminlog;
use admin\user\model\Role;
use admin\user\model\RoleAction;
use admin\common\controller\Common;
use think\Request;

class AdminService extends Common
{
    public function __construct(Request $request=null)
    {
        $this->admin = new Admin();
        $this->role = new Role();
        $this->RoleAction = new RoleAction();
        parent::__construct();
    }
    public function adminIndex()
    {
        $list =$this->admin->paginate(10);
        return $list;
    }
    public function roleIndex()
    {
        $list =$this->role->paginate(10);
        return $list;
    }
    public function actionIndex()
    {
        $list =$this->RoleAction->select();
        return $list;
    }
    public function actionDetail()
    {
        $list =$this->RoleAction->find($this->request->param('id'));
        return $list;
    }
    /*
     * 获取顶级导航
     */
    public function actionFirst()
    {
        $list =$this->RoleAction->where('parent_id',0)->select();
        return $list;
    }
    /*
     * 获取导航编辑
     */
    public function actionUpdate()
    {
        $data =$this->admin->filterData('tp_role_action',$this->request->param());
        if(!$data['id']) return $this->errorReturn('参数错误');
        $res = $this->RoleAction->save($data,['id' => $data['id']]);
        if($res){
            return $this->successReturn('更新成功');
        }else{
            return $this->errorReturn('参数错误');
        }
    }
    public function actionDeal()
    {
        if(!$this->request->param('id')) return $this->errorReturn('参数错误');
        $time = time();
        $res = $this->RloeAction->save(['delete_time'=>$time],function($query){
            // 更新status值为1 并且id大于10的数据
            $query->where('id', 'in', $this->request->param('id'));
        });
        if($res){
            return $this->successReturn('删除成功');
        }else{
            return $this->errorReturn('删除失败');
        }
    }
    public function deleteAdmin()
    {
        if(!$this->request->param('id')) return $this->errorReturn('参数错误');
        $time = time();
        $res = $this->admin->save(['delete_time'=>$time],function($query){
            // 更新status值为1 并且id大于10的数据
            $query->where('id', 'in', $this->request->param('id'));
        });
        if($res){
            return $this->successReturn('删除成功');
        }else{
            return $this->errorReturn('删除失败');
        }
    }
    public function deleteRole()
    {
        if(!$this->request->param('id')) return $this->errorReturn('参数错误');
        $time = time();
        $res = $this->role->save(['delete_time'=>$time],function($query){
            // 更新status值为1 并且id大于10的数据
            $query->where('id', 'in', $this->request->param('id'));
        });
        if($res){
            return $this->successReturn('删除成功');
        }else{
            return $this->errorReturn('删除失败');
        }
    }

    public function saveAction()
    {
        $data =$this->admin->filterData('tp_role_action',$this->request->param());
        if (!$data['name']) return $this->errorReturn('菜单名称必填');
        if (!$data['action_type']) return $this->errorReturn('菜单所属模块必填');
        $res = $this->RoleAction->save($data);
        if($res){
            return $this->successReturn('添加成功');
        }else{
            return $this->errorReturn('添加失败');
        }
    }
    public function saveAdmin()
    {
        $data =$this->admin->filterData('tp_admin',$this->request->param());
        if (!$data['user_login']) return $this->errorReturn('账号必填');
        if (!$data['user_pass']) return $this->errorReturn('密码必填');
        $data['user_pass'] = md5($data['user_pass']);
        $data['create_time'] =time();
        $res = $this->admin->save($data);
        if($res){
            return $this->successReturn('添加成功');
        }else{
            return $this->errorReturn('添加失败');
        }

    }
    public function getOld()
    {
        $ADMINID= $this->request->session('ADMIN_ID');
        return $this->admin->where('id',$ADMINID)->value('user_pass');
    }
    public function updateOld($newpass='123456')
    {
        $newpass= md5(trim($newpass));
        $ADMINID= $this->request->session('ADMIN_ID');
        $result = $this->admin->save([
            'user_pass'  => $newpass
        ],['id' => $ADMINID]);
        if($result !== false){
            return $this->successReturn('修改成功');
        }
        return $this->errorReturn('修改失败');

    }
    public function adminLog()
    {
        $list = (new Adminlog())->paginate(10);
        return $list;

    }













}

