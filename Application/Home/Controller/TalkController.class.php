<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-11-10
// +----------------------------------------------------------------------

/**
 *  健康指南 
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Think\Controller;	//表示引入Think\Controller明明空间便于直接使用

class TalkController extends Controller {
	
    /**
     * 首页输出  -- 运动说说
     * @param 
     * @return 
     */
    
    public function index(){
    	$this->display();
    }
 
}

