<?php

namespace admin\ad\controller;
use csf\controller\AdminBaseController;
use api\ad\service\AdpositionService;
use think\Request;

class AdPosition extends AdminBaseController
{
    private $AdpositionService;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->AdpositionService = new AdpositionService();
    }
    public function index()
    {
        $this->assign("position_name",$this->request->param('position_name'));
        $adposition_list = $this->AdpositionService->getAdpositionlist();
        //print_r($this->request->param('position_name'));die();
        $this->assign("adposition_list",$adposition_list['data']['adpositionlist']);
        $this->assign("currentPage",$adposition_list['data']['page']);
        $this->assign("totalPage",$adposition_list['data']['totalPage']);
        $this->assign("total",$adposition_list['data']['total']);
        return $this->fetch(':adposition/index');
    }
    public function add()
    {
        return $this->fetch(':adposition/add');
    }
    //添加操作
    public function insert(){
        return $this->AdpositionService->save();
    }
    //编辑页面
    public function edit()
    {
        $ap = $this->AdpositionService->read();
        $this->assign('ap',$ap['data']);
        return $this->fetch(':adposition/edit');
    }
    //编辑操作
    public function update()
    {
        return $this->AdpositionService->update();
    }
    //删除操作
    public function delete()
    {
        return $this->AdpositionService->delete();
    }
}