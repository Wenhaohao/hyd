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
	
}

?>