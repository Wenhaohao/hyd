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

	/**
	*  获取指定文章的收藏
	*	@param  long int  用户id
	*	@param  long int  运动分享文章id
	*	@return $collectData  文章
	*/
	public function getUserArticleCollect($uid,$articleId){
		// 查找是否存在
		$where = array('article_id' => $articleId ,'uid' => $uid);
		$collectData = M('article_collects')
					   ->where($where)
					   ->find();
		return $collectData;
	}

	/**
	*   保存文章 收藏记录
	*/
	public function saveArticleCollect($collectData){
		$where['uid'] =$collectData['uid'];
		$where['article_id']=$collectData['article_id'];
		$result = M('article_collects')
				  ->where($where)
				 ->setField('is_collected',$collectData['is_collected']);
		if($result!=false){	
			return true;
		}else{
			
			return false;
		}
	}

	/**
	*	创建文章收藏记录
	*/

	public function createArticleCollect($collectData){
	
		$model = M('article_collects');
		$result = $model->add($collectData);	
		if($result){
			
			return true;
		}else{
			return false;
		}
	}
	/**
	*	修改文章数据
	*/
	public function saveArticleInfo($infoData){

		$result = M('articles')->save($infoData);

		if($result!=false){	
			return true;
		}else{
			return false;
		}
	}

	/**
	*	获取文章收藏counts
	*/

	public function getArticleCounts($articleId){
		$model = M('article_collects');
		$counts = $model
					  ->where(array('article_id'=>$articleId,'is_collected'=>1))
					  ->count();
		return $counts;
	}

}

?>