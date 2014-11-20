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
   		$listService = D('List','Service');
		
		// 翻页
		$listCount = $listService->getCount();
		$page = new \Think\Page($listCount,2);
		$first = $page->firstRow;
		$last = $page->listRows;
		$listPage = $page->show();
		$listData = $listService->getList($first,$last);
		
// 		dump(session('name'));
    	$this->assign('list',$listData);
		$this->assign('page',$listPage);
		$this->display();
    }
    /**
    *
    *  测试 demo
    *   @param
    *   @return 
    */
    public function  demo(){
        //获取 模板内容
        //   $content = $this->fetch('Home@index:index');
        //   $this->show($content, 'utf-8', 'text/html');
    }
    
}
