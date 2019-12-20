<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
define("APP_NAMESPACE", 'admin');
// 定义APP根目录,可更改此目录
define('APP_ROOT', __DIR__ . '/');
define('STATIC_PATH', '/public/static');
define('PUBLIC_PATH', '/public/');

// 定义应用目录
define('APP_PATH', APP_ROOT . 'admin/');
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';


