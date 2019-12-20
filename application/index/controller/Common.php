<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }
    public function cindex(){
        return 2;
    }
}
