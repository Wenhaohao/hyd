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
	public function getList($first,$last,$where=array()){
		//判断是否为 父id 如果为父id  则可以搜索所有子id 的类别 like'/$d/'
		if(isset($where["category_id"])){
			$condition['category_id']  = array('eq', $where["category_id"]);
			$condition['parent_id']  = array('eq', $where["category_id"]);
			$condition["_logic"] ="or";
			$categorysData   = M('article_categorys')->field("category_id")->where($condition)->getField("category_id",true);			
			$where= array("category_id"=>array("in",$categorysData));
		}		
		$listData = M('articles')
					->join('hyd_users ON hyd_articles.uid = hyd_users.uid')
					->order('publish_time desc')
					->where($where)
					->limit($first,$last)
					->select();
		return $listData;		
	}
	
	/**
	 *	获取信息总数
	 */
	public function getCount($where=array()){
		if(isset($where["category_id"])){
			$condition['category_id']  = array('eq', $where["category_id"]);
			$condition['parent_id']  = array('eq', $where["category_id"]);
			$condition["_logic"] ="or";
			$categorysData   = M('article_categorys')->field("category_id")->where($condition)->getField("category_id",true);			
			$where= array("category_id"=>array("in",$categorysData));
		}		
		$listCount = M('articles')
						->where($where)
						->count();
		return $listCount;
	}
	
	/**
	 *	获取分类列表
	 */
	public function getCategorys(){
		$categoryData = M('article_categorys')->select();
		
		return $categoryData;
	}
	
    
    
	
}

?>