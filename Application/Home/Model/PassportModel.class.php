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
namespace Home\Model;
use Think\Model;

class PassportModel extends Model{
	
	// 验证用户登录
	public function checkLogin($dataLogin){
		
	}
	
	// 验证用户注册
	public function checkRegister($dataRegister){
		
		// 判断两次密码是否一致 或是否为空
		if($dataRegister['password'] != $dataRegister['password2'] || '' == $dataRegister['password']){
			return "两次密码不一致,或者所填密码为空";
		}
		
		// 判断用户名是否存在
		$count = count(M('users')->where('account_name='.'"'.$dataRegister['name'].'"')->select());
		
		if($count>0){
			return "您的用户名已经存在";
		}
		
		// 获取数据 添加数据
		dump($dataRegister);
		exit();
		$data['account_name'] = $dataRegister['name'];
		$data['passwd'] = md5($dataRegister['password']);
		$data['eamil'] = $dataRegister['email'];
		
		$a = M('users')->data($data)->add();
		
		echo M('users')->getLastsql(M('users')->data($data)->add());
		exit();
		if(M('users')->add($data) > 0){
			return "注册成功！";
		}else{
			return "注册失败!";
		}
	}
	
}