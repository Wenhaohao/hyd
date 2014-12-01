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
	*  判断文章是否收藏
	*	@param  long int  $uid       用户id
	*	@param  long int  $articleId 运动分享文章id
	*/
	public function isUserArticleCollect($uid,$articleId){
		 $collectData = $this->getUserArticleCollect($uid,$articleId);
		 if($collectData !=null && $collectData["is_collected"]!=0){
		 	return true;
		 }else{
		 	return false;
		 }
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


	/**
	*
	*	判断用户是否已经投票
	*	@param  int $articleId
	*	@param 
	*/
	public function getArticleVote($uid,$articleId){
			$condition["uid"] = $uid;
			$condition["article_id"] = $articleId;
			$voteData =  M("article_votes")->where($condition)->find();
			return $voteData;
	}
	/**
	*   保存用户投票
	*
	*/
	public function saveArticleVote($voteData){
		$result = M('article_votes')->add($voteData);

		if($result !=false){
			//1.查询 并修改
			$articleData =  M('articles')->field("vote_counts,support_counts")->where('article_id = %d',$voteData['article_id'])->find();
			$articleData["vote_counts"] += 1;
			if($voteData["is_support"]==1){
				$articleData["support_counts"] +=1;
			}

			$result =  M('articles')->where('article_id = %d',$voteData['article_id'])
						->data($articleData)->save();
			if($result !=false){
				return true;
			}

		}
		return false;			
	}


	/**
	*  获取 专家指南文章内容
	*
	*/
	public function getHealthArticle($tid){
		 $where['health_article_id']= $tid;
		$healthData = M('guide_articles')
					->join('hyd_sports on hyd_guide_articles.sport_id = hyd_sports.sport_id')
					->join('hyd_users on  hyd_guide_articles.uid = hyd_users.uid')
					
					->where($where)
					->find();
		return $healthData;
	}

	/**
	*  获取用户对专家指导投票
	*
	*/
	public function getGuideArticleVote($uid,$healthArticleId){
			$condition["uid"] = $uid;
			$condition["guide_article_id"] = $healthArticleId;
			$voteData =  M("guide_article_votes")->where($condition)->find();
			return $voteData;
	}

	public function saveGuideArticleVote($voteData){
		$result = M('guide_article_votes')->add($voteData);
		if($result !=false){
			//1.查询 并修改
			$articleData =  M('guide_articles')
							->field("vote_counts,support_counts")
							->where('health_article_id = %d',$voteData['guide_article_id'])
							->find();
			$articleData["vote_counts"] += 1;
			if($voteData["is_support"]==1){
				$articleData["support_counts"] +=1;
			}
			$result =  M('guide_articles')->where('health_article_id = %d',$voteData['guide_article_id'])
						->data($articleData)->save();
			if($result !=false){
				return true;
			}

		}
		return false;			
	}
}

?>