<?php
namespace admin\user\service;
use admin\user\model\Admin;
use admin\user\model\Adminlog;
use admin\user\model\Role;
use admin\common\controller\Common;
use think\Request;

class AdminService extends Common
{
    public function __construct(Request $request=null)
    {
        $this->admin = new Admin();
        $this->role = new role();
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

