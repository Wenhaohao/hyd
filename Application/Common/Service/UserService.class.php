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
	
}