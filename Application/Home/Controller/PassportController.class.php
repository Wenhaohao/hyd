<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-14
// +----------------------------------------------------------------------

/**
 * 登录 注册 控制器
 */
namespace Home\Controller;
use Think\Controller;

class PassportController extends Controller{ 
	
	public function	index(){
		
	}
	
	// 登录控制器
	public function login(){
		$this->display();
	}
	
	// 注册控制器
	public function register(){
		$this->display();
	}
	
	// 验证用户登录信息
	public function checkLogin(){

		if(IS_POST){
			$dataLogin = I('post.');
			$checkLogin = D('Passport')->checkLogin($dataLogin);  
			if($checkLogin){
				$this->success('登陆成功','/Index/index');
			}else{
				$this->error('用户名或密码错误','__URL__/login');
			}
		}
	}
	
	// 验证用户注册信息
	public function checkRegister(){
		if(IS_POST){
			$dataRegister = I('post.');
			$checkRegister = D('Passport')->checkRegister($dataRegister);
			$this->show($checkRegister);
		}
	}
	 
	// 验证注册用户名是否存在
	public function checkUsername(){
		if(IS_POST){
			$dataUsername = I("post.username");
 			$checkUsername = D('Passport')->checkUsername($dataUsername);
 			//$this->ajaxReturn($checkUsername);
 			echo ($checkUsername==true)?'true':'false';
		}
		return;
	}
	
	// 退出登录
	public function logout(){
		$value = $_SESSION['name'];
		echo $value;
		exit();
		unset($_SESSION['name']);
		$this->success('退出成功，返回首页','/Index/index');
	}
	
}