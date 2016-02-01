<?php
return array(
    'DB_TYPE'=>'mysql', // 数据库类型
    'DB_HOST'=>'211.149.187.82', // 服务器地址
    'DB_NAME'=>'achao',          // 数据库名
    'DB_USER'=>'achao',      // 用户名
    'DB_PWD' =>'dAV94EDAGs4K',          // 密码
    'DB_PORT'=>'3306',        // 端口
    'DB_PREFIX'=>'taobao_',    // 数据库表前缀
    'DATA_CACHE_TIME'=>  86400,      // 数据缓存有效期 0表示永久缓存
    'DEFAULT_FILTER'=> 'htmlspecialchars',// 系统默认的变量过滤机制I函数
    'DB_CHARSET'=> 'utf8', // 字符集
    'URL_HTML_SUFFIX'=>'html',
    'URL_MODEL'=> 0,// URL访问模式
    'DEFAULT_CHARSET'=> 'utf-8',     // 默认输出编码
    'DEFAULT_MODULE' => 'Home',     // 默认模块
    'LOAD_EXT_CONFIG' => 'taobao',//其他的配置文件
    'TMPL_PARSE_STRING'  =>array('__ADMIN__' =>'/Application/Admin/View/Pulbic/','__HTML__'=>'/Html/'),
    
);