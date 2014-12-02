<?php 
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong(295697141@qq.com)
// +----------------------------------------------------------------------
// | 2014-11-29
// +----------------------------------------------------------------------

/**
 * 内容页信息
 */
namespace Common\Service;
use Common\Service\CommonService;

class WidgetService extends CommonService{

	/**
	 *	获取文章排行
	 */
	public function getArticleRank($where,$order,$rows){
		$rankData = M('articles')
					->join('hyd_users ON hyd_articles.uid = hyd_users.uid')
					->field("hyd_users.uid,title,sub_title,uid_name,publish_time,vote_counts,support_counts")
					->where($where)
					->order($order)      			// 投票数最多 为最火
					->limit($rows)
					->select();
		return $rankData;		
	}
	
	/**
	*	获取指南信息
	*/
	public function getGuideInfo($order){
		$guideData	= M('guide_articles')
					  ->join('hyd_sports on hyd_guide_articles.sport_id = hyd_sports.sport_id')
					  ->join('hyd_users ON hyd_guide_articles.uid = hyd_users.uid')
					  ->order($order) 
					  ->field('health_article_id,hyd_sports.sport_name,category_id,hyd_sports.sport_id,condition_text,sport_ref_image,introduce,uid_name,title,sub_title,desc,publish')
					  ->find();
		return $guideData;
	}

	/**
	*   获取文章分享信息
 	*
	*/
	public function getArticleInfoList($where,$order,$count = 3){
		$articleData =   M('articles')
		         ->join('hyd_users ON hyd_articles.uid =  hyd_users.uid')
		         ->where($where)
		         ->order($order)
		         ->limit($count)
		         ->field('hyd_users.uid,hyd_users.uid_name,article_id,title,sub_title,ref_contents,collect_counts,vote_counts,support_counts')
		         ->select();
		  return $articleData;
	}

	/**
	*   获取热门运动
	*
	*/

	public function getSportsList($length = 6){

		$sportsList = M('guide_articles')
					  ->field(array("count(sport_id)"=>"sport_id")) 	//更具最热门 的 运动文章指南
					  ->group("sport_id")
					  ->limit($length)
					  ->order('sport_id desc')
					  ->getField('sport_id',true);  //获取 数组  
   		$condition['sport_id']  = array('in',$sportsList);
		$sportsData = M('sports')
					  ->where($condition)
					  
					  ->select();
	    return $sportsData;
	}
}

?>