<?php 
// +----------------------------------------------------------------------
// | Application/Home/Controller/CheckController.class.php
// +----------------------------------------------------------------------
// | 判断用户是否登录
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-11-5
// +----------------------------------------------------------------------

/**
 * 判断用户是否登录
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class CheckController extends CommonController{
	
	public $uid;
	
	public function _initialize(){
		if($_SESSION['name']){
			$this->uid = $_SESSION['name']['uid'];
		}else {
			$this->error('你还没有登录','/Passport/login');
		}
	}
	
}

?>