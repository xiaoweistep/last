<?php
/**
 * Created by PhpStorm.
 * User: hunuo
 * Date: 2018/7/16
 * Time: 16:43
 */

namespace admin\user\model;
use admin\common\model\Common;
use traits\model\SoftDelete;

class RoleAction extends Common
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}