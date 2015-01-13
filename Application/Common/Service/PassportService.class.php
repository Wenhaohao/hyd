<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-14
// +----------------------------------------------------------------------

/**
 *  登录 注册模型
 */
namespace Common\Service;
use Common\Service\CommonService;
class PassportService extends CommonService{
	
	// 验证用户登录
	public function checkLogin($dataLogin){
		$data['uid_name'] = $dataLogin['uid_name'];
		$data['passwd'] = md5($dataLogin['passwd']);
		$result = M('users')->where($data)->find();
		
		//将 用户名存入 session
		if($result){
			$_SESSION['name'] = $result;
			return true;
		}else {
			return false;
		}
	}
	
	// 验证用户注册
	public function checkRegister($dataRegister){
		
		// 判断两次密码是否一致 或是否为空
		if($dataRegister['passwd'] != $dataRegister['confirm_password'] || '' == $dataRegister['passwd']){
			return "两次密码不一致,或者所填密码为空";
		}
		
		// 判断用户名是否存在
		$count = count(M('users')->where("uid_name ="."'".$dataRegister['uid_name']."'")->select());

		if($count > 0){
			return "您的用户名已经存在";
		}
		
		// 获取数据 添加数据  NOT NULL
		$data['uid_name'] = $dataRegister['uid_name'];
		$data['passwd'] = md5($dataRegister['passwd']);
		$data['email'] = $dataRegister['email'];
		
		if(M('users')->add($data)){
			return "注册成功";
		}else{
			return "注册失败";
		}
	}
	
	// 验证用户名
	public function checkUserName($dataUsername){
		$count = count(M('users')->where('uid_name='.'"'.$dataUsername.'"')->select());
		if($count > 0){
			return true;  //用户存在
		}else{
			return false;
		}
	}
	
	// 验证邮箱
	public function checkEmail($dataEmail){
		$count = count(M('users')->where('email = '.'"'.$dataEmail.'"')->select());
		if($count > 0){
			return true;   //邮箱存在
		}else{
			return false;
		}
	}
	
}