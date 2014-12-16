<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-11-5
// +----------------------------------------------------------------------

/**
 *  健康指南 
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Home\Controller\CommonController;	//表示引入Think\Controller明明空间便于直接使用

class GuideController extends CommonController {
	
    /**
     * 首页输出
     * @param 
     * @return 
     */
    public function index(){
    	$guideService = D('Guide','Service');
    	
    	$intHealthCount = $guideService->getCount();
    	$page = new \Think\Page($intHealthCount,10);
    	$first = $page->firstRow;
    	$last = $page->listRows;
    	$listPage = $page->show();
    	$listData = $guideService->getList($first,$last);
    	
//     	dump($listData);
//     	exit();
    	$this->assign('list',$listData);
    	$this->assign('page',$listPage);
    	$this->display();
    }
 
}

