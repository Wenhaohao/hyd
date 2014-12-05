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
use Home\Controller\CommonController;

class ListController extends CommonController {
	
   /**
	*	 运动分享列表
	*/
	public function index(){
		$intCategoryId = I('get.cid');
		
		if($intCategoryId!=null){
			$where['category_id'] = $intCategoryId;
		}
		$listService = D('List','Service');
		// 翻页
		$listCount = $listService->getCount($where);
		$page = new \Think\Page($listCount,2);
		$first = $page->firstRow;
		$last = $page->listRows;
		$list = $page->show();
		
		$listData = $listService->getList($first,$last,$where);
		
		// 分类
		$categoryData = $listService->getCategorys();
		
		// 父级分类
		$arrParentCate = $this->getCate($categoryData);
		
		foreach ($arrParentCate as $key=>$val){
			$arrParentCate[$key]['child'] = $this->getCate($categoryData,$val['category_id']);
		}	

		$this->assign('category',$arrParentCate);
		$this->assign('list',$listData);

		$this->assign('page',$list);
		$this->assign('categoryId',$intCategoryId);
		$this->display();
	}

   /**
	*	 健康指南分享列表  
	*	 @author  liyanlong
	*/
	public function health(){

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

	/**
    *  
    *   二级联动列表 运动分类  ajax 请求
    *   @author  liyanlong
    *	@param  $_GET
    *   @return $jsonData
    *	
    */
    public function changeCategory(){
        $pid = I('get.parentId');    // 若不携带 参数 默认 $pid  为 null 

        if(S('categorysAll') == null){  // 从缓存 获取 分类
            $categoryData = D('List','Service')->getCategorys();
            S('categorysAll',$categoryData); //缓存赋值
        }else{
             $categoryData = S('categorysAll');
        }
        foreach ($categoryData as $category) {
            if($category['parent_id'] == $pid){
                $data[] = $category;
            }
        }
        $this->ajaxReturn($data);
    }
	
}