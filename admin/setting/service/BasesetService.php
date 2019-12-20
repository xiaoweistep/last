<?php
namespace admin\setting\service;
use admin\setting\model\Baseset;
use admin\common\controller\Common;
use think\Request;

class BasesetService extends Common
{
    public function __construct(Request $request=null)
    {
        parent::__construct();
    }

    public function showbase(){
        $show = (new  Baseset)::get(1);
        return $show;
    }
    public function update(){
        $arr= $this->request->param();
        $result= (new  Baseset)->save($arr,['id' => 1]);
        if($result === false){
            return $this->errorReturn('更新失败');
        }
        return $this->successReturn("更新成功！");
    }













}

