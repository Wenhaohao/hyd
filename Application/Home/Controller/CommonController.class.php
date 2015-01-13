<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-26
// +----------------------------------------------------------------------

/**
 * 公共的控制器
 */
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
	
	public function __construct(){
		parent::__construct();
		
		$arrCrumbs = C('crumbs');
	
		$userName = $_SESSION['name'];
		$this->assign('userName',$userName);
		$this->assign('crumbs',$arrCrumbs);
// 		$auth = "power by thinkphp";
// 		$this->assign('auth',$auth);
	}
	
}

?>