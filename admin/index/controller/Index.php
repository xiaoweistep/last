<?php

namespace admin\index\controller;
use admin\common\controller\Common as admincommon;
use admin\setting\service\BasesetService;
class Index extends admincommon
{
    public function index()
    {
        $show = (new BasesetService)->showbase();
        $this->assign('show',$show);
        return $this->fetch(':index');
    }
    public function updateBase()
    {
        $result = (new BasesetService)->update();
        return $result;
    }
    public function add()
    {
        return $this->fetch(':add');
    }
    public function main()
    {
        return $this->fetch(':main');
    }

}