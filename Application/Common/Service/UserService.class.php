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
	
	public function saveImageUrl($intUserId,$strImageUrl){
		$where['uid'] = $intUserId;
		$where['head_url'] = $strImageUrl;
		D('users')->where($where)->save();
	}
	
}