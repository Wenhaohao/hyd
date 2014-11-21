<?php 
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-31
// +----------------------------------------------------------------------

/**
 * 列表页信息
 */
namespace Common\Service;
use Common\Service\CommonService;

class ListService extends CommonService{
	/**
	 *	获取列表信息
	 */
	public function getList($first,$last){
		$listData = M('articles')
					->join('hyd_users ON hyd_articles.uid = hyd_users.uid')
					->order('publish_time desc')
					->limit($first,$last)
					->select();
		return $listData;		
	}
	
	/**
	 *	获取信息总数
	 */
	public function getCount(){
		$listCount = M('articles')->count();
		return $listCount;
	}
	
	/**
	 *	获取分类列表
	 */
	public function getCategorys(){
		$categoryData = M('article_categorys')->select();
		S('categorysAll',$categoryData);
		return $categoryData;
	}
	
    
    
	
}

?>