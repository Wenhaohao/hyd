<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-12
// +----------------------------------------------------------------------

/**
 * 首页控制器
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Home\Controller\CommonController;	//表示引入Think\Controller明明空间便于直接使用

class IndexController extends CommonController {
	
    /**
     * 首页输出
     * @param 
     * @return 
     */
    public function index(){
    //	print_r(I("session."));
    //dump(I("session"));
    	$this->display();
    }
    
}
