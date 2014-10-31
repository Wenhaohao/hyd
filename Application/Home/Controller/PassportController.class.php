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
use Home\Controller\CommonController;  

class PassportController extends CommonController{ 
	
	public function	index(){
		$this->display();
	}
	
	

	// 登录控制器
	public function login(){

		$this->display();
	}

	/* 注册前控制器
	*
	*  @author Liyanlong
	*  如果用户登录成功则不允许进入注册页面
	*/
	public function _before_register(){
		$name = I('session.name');
		if(!empty($name)){
			$this->error('用户'.$name.'请先退出登录');
		}
	}
	
	// 注册控制器
	public function register(){
		$this->display();
	}
	
	// 验证用户登录信息
	public function checkLogin(){

		if(IS_POST){
			$dataLogin = I('post.');
			$checkLogin = D('Passport','Service')->checkLogin($dataLogin);  
			
			if($checkLogin){
				$this->success('登陆成功','/Index/index');
			}else{
				$this->error('用户名或密码错误');
			}
		}
	}
	
	// 验证用户注册信息
	public function checkRegister(){
		if(IS_POST){
			$dataRegister = I('post.');  //获取 post 全部变量
			$checkRegister = D('Passport','Service')->checkRegister($dataRegister);
			$this->show($checkRegister);  // 显示  结果
		}
	}
	 
	// 验证注册用户名是否存在
	public function checkUserName(){
		if(IS_POST){
			$dataUsername = I("post.uid_name");
 			$checkUsername = D('Passport','Service')->checkUsername($dataUsername);
 			$this->ajaxReturn(!$checkUsername);
 			//if($checkUsername==true){echo true;}else{echo false;};
		}
		return;
	}
	
	// 验证邮箱是否存在
	public function checkEmail(){
		if(IS_POST){
			$dataEmail = I("post.email");
 			$checkEmail = D('Passport','Service')->checkEmail($dataEmail);
			$this->ajaxReturn(!$checkEmail);
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