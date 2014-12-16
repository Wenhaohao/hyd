<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-11-10
// +----------------------------------------------------------------------

/**
 *  运动计划
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Think\Controller;	//表示引入Think\Controller明明空间便于直接使用

class PlanController extends CommonController {
	
    /**
     * 首页输出  -- 运动计划
     * @param 
     * @return 
     */
    public function index(){
    	$objPlanService = D('Plan','Service');
    	$intCount = $objPlanService->getCount();
    	
    	// 翻页
    	$page = new \Think\Page($intCount,2);
    	$first = $page->firstRow;
    	$last = $page->listRows;
    	$planPage = $page->show();
    	
    	$arrPlanData = $objPlanService->getList($first,$list);
    	
//     	dump($arrPlanData);
//     	exit();
    	$this->assign('list',$arrPlanData);
    	$this->assign('page',$planPage);
    	$this->display();
    }

    //编辑计划
    public function  createTalk(){

    	$this->display();
    }

    // 发表计划
    public function uploadTalk(){

        dump(I('post.'));
    }
     public function  demo(){

    	$this->display();
    }
 
}

