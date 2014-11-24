<?php 
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong(295697141@qq.com)
// +----------------------------------------------------------------------
// | 2014-11-4
// +----------------------------------------------------------------------

/**
 * 内容页信息
 */
namespace Common\Service;
use Common\Service\CommonService;

class InfoService extends CommonService{
	/**
	 *	获取文章内容
	 */
	public function getArticle($articleId){
		$where['article_id'] = $articleId;
		$infoData = M('articles')
					->join('hyd_users ON hyd_articles.uid = hyd_users.uid')
					->where($where)
					->find();
		return $infoData;		
	}

}

?>