<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-10-21
// +----------------------------------------------------------------------

/**
 *  分享控制器
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Think\Controller;	//表示引入Think\Controller明明空间便于直接使用

class ShareController extends Controller {
	
    /**
     * 首页输出
     * @param 
     * @return 
     */
    public function index(){
    	$this->display();
    }

    /**
    *   
    *  文章全文
    *  @param
    *  @return
    */

    public function article(){

    	$this->display();
    }

    


 
}

