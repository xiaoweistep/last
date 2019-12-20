<?php

namespace admin\ad\controller;
use csf\controller\AdminBaseController;
use api\ad\service\AdService;
use api\ad\service\AdpositionService;
use think\Request;

class Ad extends AdminBaseController
{
    private $AdService;
    private $AdpositionService;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->AdService = new AdService();
        $this->AdpositionService = new AdpositionService();
    }
    //广告首页列表
    public function index()
    {
        $this->assign("ad_name",$this->request->param('ad_name'));
        $ad_list = $this->AdService->getAdlist();
        $this->assign("ad_list",$ad_list['data']['adlist']);
        $this->assign("currentPage",$ad_list['data']['page']);
        $this->assign("totalPage",$ad_list['data']['totalPage']);
        $this->assign("total",$ad_list['data']['total']);
        return $this->fetch(':index');
    }
    //添加页面
    public function add()
    {
        $adposition_list = $this->AdpositionService->getlist();
        $this->assign('adposition_list',$adposition_list['data']);
        return $this->fetch(':add');
    }
    //添加操作
    public function insert(){
            return $this->AdService->save();
    }
    //编辑页面
    public function edit()
    {
        $adposition_list = $this->AdpositionService->getlist();
        $this->assign('adposition_list',$adposition_list['data']);
        $ad = $this->AdService->read();
        $this->assign('ad',$ad['data']);
        return $this->fetch(':edit');
    }
    //编辑操作
    public function update()
    {
        //print_r($this->request->param());die();
        return $this->AdService->update();
    }
    //删除操作
    public function delete()
    {
        return $this->AdService->delete();
    }

}