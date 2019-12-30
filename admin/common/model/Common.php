<?php
namespace admin\common\model;
use think\Model;
class Common extends Model
{
    /**
     * @param string $table
     * @param array $arr参数
     * @return array 过滤之后的参数
     */
    public function filterData($table='',$arr=array())
    {
        $field = self::getTableFields($table);
        if(!empty($arr)){
            foreach ($arr as $key=>$value){
                $arr[$key]=trim($value);
                if(!in_array($key,$field)){
                    unset($arr[$key]);
                }

            }
        }
        return $arr;
    }

}