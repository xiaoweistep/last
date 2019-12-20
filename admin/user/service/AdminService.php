<?php
namespace admin\user\service;
use think\Controller;
use admin\user\model\Admin;
use admin\user\model\Adminlog;
use admin\common\controller\Common;
use think\Request;

class AdminService extends Common
{
    public function __construct(Request $request=null)
    {
        $this->admin = new Admin();
        parent::__construct();
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

        $list = (new Adminlog())->all();
        return $list;

    }













}

