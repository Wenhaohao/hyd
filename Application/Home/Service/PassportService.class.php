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
namespace Home\Service;
use Think\Model;

class PassportService extends Model{
	
	// 验证用户登录
	public function checkLogin($dataLogin){
		$data['account_name'] = $dataLogin['uid_name'];
		$data['passwd'] = md5($dataLogin['passwd']);
		$result = M('users')->where($data)->find();
		if($result){
			$_SESSION['name'] = $data['account_name'];
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
		$count = count(M('users')->where('account_name='.'"'.$dataRegister['uid_name'].'"')->select());
		if($count > 0){
			return "您的用户名已经存在";
		}
		
		// 获取数据 添加数据
		$data['account_name'] = $dataRegister['uid_name'];
		$data['passwd'] = md5($dataRegister['passwd']);
		$data['email'] = $dataRegister['email'];
		
		if(M('users')->add($data)){
			return "注册成功！";
		}else{
			return "注册失败!";
		}
	}
	
	// 验证用户名
	public function checkUsername($dataUsername){
		$count = count(M('users')->where('account_name='.'"'.$dataUsername.'"')->select());
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}
	
	
}