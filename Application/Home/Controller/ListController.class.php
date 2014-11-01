<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-12
// +----------------------------------------------------------------------

/**
 * 用户中心控制器
 */
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller {
	
	public function index(){
		$listService = D('List','Service');
		
		// 翻页
		$listCount = $listService->getCount();
		$page = new \Think\Page($listCount,2);
		$first = $page->firstRow;
		$last = $page->listRows;
		$list = $page->show();
		$listData = $listService->getList($first,$last);
		
		// 分类
		$categoryData = $listService->getCategorys();
// 		foreach ($categoryData as $key => $val){
// 			if($val['parent_id'] == null){
// 				$data[] = $val;
// 			}
			
// 		}
// 		dump($data);
// 		exit();
		$this->assign('category',$categoryData);
		$this->assign('list',$listData);
		$this->assign('page',$list);
		$this->display();
	}

	public function article(){
		$this->display();
	}
	
}