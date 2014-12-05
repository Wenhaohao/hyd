<?php 
// +----------------------------------------------------------------------
// | Service/HealthService.class.php
// +----------------------------------------------------------------------
// | 运动健康指南
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-11-20
// +----------------------------------------------------------------------

/**
 * 运动健康指南
 */
namespace Common\Service;
use Common\Service\CommonService;

class HealthService extends CommonService{
	
	/**
	 * 运动健康指南文章总数
	 */
	public function getCount($where){

		$intHealthCount = M('guide_articles')
						  ->join('hyd_sports on hyd_guide_articles.sport_id = hyd_sports.sport_id')
						  ->where($where)
						  ->count();
		return $intHealthCount;
	}
	
	/**
	 * 运动健康指南文字列表
	 * @param int $first 起始页
	 * @param int $last 每页多少条数据
	 */
	public function getList($first,$last,$where){

		$arrHealth = M('guide_articles')
					->join('hyd_sports on hyd_guide_articles.sport_id = hyd_sports.sport_id')
					->join('hyd_users on  hyd_guide_articles.uid = hyd_users.uid')
					->field('hyd_users.uid,uid_name,sport_name,health_article_id,condition_text,sport_ref_image,title,sub_title,introduce,desc,publish,hyd_sports.sport_id,hyd_sports.category_id')
					->where($where)
					->limit($first,$last)
					->select();
		return $arrHealth;
	}
	/**
	*
	*  获取运动 分类
	*
	*/
	public function getSportsCategoryList(){
		$listData = M('sport_categories')
					->select();
		return $listData;
	}

	/**
	*
	* 根据运动分类获取运动
	*
	*/
	public function getSportsList($category_id){
		$where["category_id"]=$category_id;
		$sportsData = M('sports')
					  ->field("sport_id,sport_name")
					  ->where($where)
					  ->select();
	    return $sportsData;
	}


	
}
?>