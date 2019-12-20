<?php
/**
 * Created by PhpStorm.
 * User: hunuo
 * Date: 2018/7/11
 * Time: 18:28
 */

namespace admin\common\entity;
class BaseEntity
{
    public function __construct($params= [])
    {
        var_dump($params);die;
        //空数组
        if (!is_array($params) || empty($params)) return [];
        //非法参数过滤
        $params = array_intersect_key($params,(array)$this);
        foreach ($params as $model=>$value){
            $method = "set".str_replace(" ","",ucwords(str_replace("_"," ",$model)));
            call_user_func_array(array($this, $method),array($value));
        }
    }
    public function params()
    {
        return array_filter((array)$this);
    }
}