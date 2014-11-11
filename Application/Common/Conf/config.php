<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL' => 2,  // URL重写  去掉中间的index.php
	
	// 数据库配置信息
	'DB_TYPE'      =>  'mysql',     // 数据库类型
	'DB_HOST'      =>  '127.0.0.1',     // 服务器地址
	'DB_NAME'      =>  'hyd_share',     // 数据库名
	'DB_USER'      =>  'root',     // 用户名
	'DB_PWD'       =>  'wenhao',     // 输入安装MySQL时设置的密码
	'DB_PORT'      =>  '3306',     // 端口
	'DB_PREFIX'    =>  'hyd_',     // 数据库表前缀
	'DB_CHARSET'=> 'utf8', 		// 数据库编码默认采用utf8
	
	// 绑定访问入口模板
	'MODULE_ALLOW_LIST' => array (
                'Home',
                'Admin',
        ),
    'DEFAULT_MODULE' => 'Home',    //默认模块
   	'URL_PARAMS_BIND'       =>  true, // URL变量绑定到操作方法作为参数
	// 绑定URL模板相关配置
	'TMPL_PARSE_STRING'  =>array(
			'__PUBLIC__' => __ROOT__ . '/Public/',
			'__STATIC__' => __ROOT__ . '/Public/Static/',
			'__UEDITOR__' => __ROOT__ . '/Public/Ueditor/',
	),
	
);
