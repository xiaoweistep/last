<?php
namespace app\common\controller;
use think\Controller;
class User extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function user()
    {
        return 'user';
    }

}


?>