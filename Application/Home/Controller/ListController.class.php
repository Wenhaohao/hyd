<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-12
// +----------------------------------------------------------------------

/**
 * 列表页控制器
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
		
		// 父级分类
		$arrParentCate = $this->getCate($categoryData);
		
		foreach ($arrParentCate as $key=>$val){
			$arrParentCate[$key]['child'] = $this->getCate($categoryData,$val['category_id']);
		}	
			
// 		dump($arrParentCate);
// 		exit();
		$this->assign('category',$arrParentCate);
		$this->assign('list',$listData);
		$this->assign('page',$list);
		$this->display();
	}

	/**
	 *	分类处理
	 */
	private function getCate($data,$pid=0){
		$arrCate = array();
		foreach ($data as $key=>$val){
			if($val['parent_id'] == $pid){
				$arrCate[] = $val;
			}
		}
		return $arrCate;
	}
	
}