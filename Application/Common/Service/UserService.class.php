<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-12
// +----------------------------------------------------------------------

/**
 * 用户中心模型
 */
namespace Common\Service;
use Common\Service\CommonService;

class UserService extends CommonService {
	
	/**
	 *	用户个人信息
	 *	@param int $intUserId 用户ID
	 *	@return array $arrUserData 用户信息
	 */
	public function getUserInfo($intUserId){
		$where['uid'] = $intUserId;
		$arrUserData = M('users')->where($where)->find();
		return $arrUserData;
	}
	
	/**
	 * 保存修改用户个人信息
	 * @param array $arrUserData 表单提交的用户信息
	 * @return boolean
	 */
	public function saveUserInfo($arrUserData){
		
		$result = M('users')->save($arrUserData);
		if($result!=false){
			
			return true;
		}else{
			
			return false;
		}
	}
	
	/**
	 *	发表运动分享文章
	 *	@param array $arrArticleData 表单提交的文章信息
	 *	@return boolean
	 */
	public function createArticle($arrArticleData){
		
		$result = M('articles')->add($arrArticleData);
		
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	获取用户发表文章
	 *	@param int $intUserId 用户ID
	 *	@return array
	 */
	public function getUserArticle($intUserId,$first,$last,$where=array()){
		$where['uid'] = $intUserId;
		$arrUserArticle = M('articles')->where($where)->limit($first,$last)->select();
		return $arrUserArticle;
	}
	
	/**
	 *	获取用户发表文章
	 *	@param int $intUserId 用户ID
	 *  @param array $where   筛选条件
	 *	@return int
	 */
	public function getUserArticleCount($intUserId,$where=array()){
		$where['uid'] = $intUserId;
		$intUserArticle = M('articles')->where($where)->count();
		return $intUserArticle;
	}

	/**
	 *	获取用户收藏文章数目
	 *	@param int $intUserId 用户ID
	 *  
	 *	@return int  counts
	 */
	public function getUserCollectsCount($intUserId){
		$where['uid'] = $intUserId;
		$where['is_collected'] = 1;
		$collectCounts = M('article_collects')
						->where($where)
						->count();
						//->getField('article_id',true);
		return $collectCounts;
	}
	
	/**
	*	获取用户收藏文章列表
	*	@param int $intUserId    用户ID
	*	@param int $first        查询起始行
	*	@param int $last         查询长度
	*	@return array $listData  查询结果数组
	*/
	public function getUserCollectList($intUserId,$first,$last){
		$where["uid"] = $intUserId;
		$listData = M('article_collects')
					->where("hyd_article_collects.uid = '$intUserId' ")  //筛选
					->join('hyd_articles  ON  hyd_article_collects.article_id = hyd_articles.article_id ')
					->join('hyd_users ON hyd_article_collects.uid = hyd_users.uid')
					->limit($first,$last)   //查询 限制
					->getField('hyd_article_collects.article_id,hyd_article_collects.uid,uid_name,title,sub_title,publish_time,ref_contents,ref_image,article_tag,article_counts');  //
					
		return $listData;		
	}


	/**
	*
	*  判断 用户uid  是否关注 focusUid
	*  @param   int  $uid
	*  @param   int  $focusUid
	*/
	public function isUserFocus($uid,$focusUid){
		
		$focusData  = $this->getUserFocus($uid, $focusUid);
		if($focusData !=null && $focusData['is_focused']!=0){
			return true;
		}else{
			return false;
		}
	}

	/**
	*  获取两个用户之间的关系
	*  @param   int  $uid
	*  @param   int  $focusUid
	*/
	public function getUserFocus($uid,$focusUid){
		$where['uid'] = $uid;
		$where['focus_uid'] = $focusUid;
		$focusData = M('user_focus')
		->where($where)
		->find();
		return $focusData;
	}

	/**
	*	添加关注
	*
	*/
	public function createUserFocus($focusData){

		$result = M('user_focus')->data($focusData)->add();
		if($result !=false){
			return true;
		}else{
			return false;
		}
	}
	/**
	*  更改关注状态
	*/
	public function saveUserFocus($focusData){
		//$condition = array("uid"=>$focusData["uid"],"focus_uid"=>$focusData["focus_uid"]);
		//$data["is_collected"] = $focusData["is_collected"];
		$result =  M('user_focus')->save($focusData);

		if($result!=false){
			return true;
		}else{
			return false;
		}
	}

}