<?php
namespace admin\user\model;
use admin\common\model\Common;
use traits\model\SoftDelete;

class Role extends Common
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}