<?php
namespace admin\user\model;
use think\Model;
class Admin extends Model
{
    public function authRoleUser()
    {
        return $this->hasOne('admin\auth\model\AuthRoleUser','user_id','id');
    }
    public static function detail($map,$field = "*")
    {
        $data = self::with('authRoleUser')->field($field)->where($map)->find();
        if(empty($data)) return [];
        return $data->toArray();
    }
}