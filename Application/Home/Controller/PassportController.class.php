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
	
	/**
	 *	登录控制器
	 */
	public function login(){
		$user= I("session.name");
		if(!empty($user)){
			$this->redirect("/Index/index");
		}
		$this->returnUrl();
		$this->display();
	}
	
	/**
	 *	验证用户登录信息
	 */
	public function checkLogin(){
		if(IS_POST){
			$dataLogin = I('post.');
			$checkLogin = D('Passport','Service')->checkLogin($dataLogin);
			
			// 判断进入登录界面之前的页面是否为本网站路径
			$refURL = session("HYD_LOGIN_REFURL");
			if(empty($refURL)){
				$refURL = '/User';
			}
			if($checkLogin){
				$this->success('登陆成功',$refURL);
			}else{
				$this->error('用户名或密码错误');
			}
		}
	}
	
	/**
	 *	进来的时候设置来路为要跳回的页面
	 */
	public function  returnUrl(){
		$referer = parse_url($_SERVER['HTTP_REFERER']);  // 控制器
		
		if(empty($referer['query'])){
			$refererPath = $referer['path'];
		}else{
			$refererPath = $referer['path'].'?'.$referer['query'];
		}
		
		$refererHost = $referer['host'];

		if(in_array($refererHost,array('121.40.173.194','www.hyd.com','127.0.0.1')) && !in_array($refererPath, array('/Passport/index','/Passport/login'))){
	
			session("HYD_LOGIN_REFURL", $refererPath);
			
		}else{
			session("HYD_LOGIN_REFURL", null);
		}
	}
	
	/**
	 * 注册控制器
	 */
	public function register(){
		$this->display();
	}
	
	/**
	 *	如果用户登录成功则不允许进入注册页面
	 */
	public function _before_register(){
		$name = I('session.name');
		if(!empty($name)){
			$this->error('用户'.$name.'请先退出登录');
		}
	}
	
	/**
	 *	验证用户注册信息
	 */
	public function checkRegister(){
		if(IS_POST){
			$dataRegister = I('post.');  //获取 post 全部变量
			$checkRegister = D('Passport','Service')->checkRegister($dataRegister);
		}

		if(($checkRegister=="注册成功")){
			$this->success($checkRegister,'/Index/index');
		}else{
			$this->error($checkRegister);  // 显示  结果
		}
			
	}
	 
	/**
	 *	验证注册用户名是否存在 
	 *  @return boolean  用户是否存在标识   
	 */
	public function checkUserName(){
		if(IS_POST){
			$dataUsername = I("post.uid_name");
 			$checkUsername = D('Passport','Service')->checkUsername($dataUsername);
 			$this->ajaxReturn(!$checkUsername);
 			//if($checkUsername==true){echo true;}else{echo false;};
		}
		return;
	}
	
	/**
	 *	验证邮箱是否存在
	 */
	public function checkEmail(){
		if(IS_POST){
			$dataEmail = I("post.email");
 			$checkEmail = D('Passport','Service')->checkEmail($dataEmail);
			$this->ajaxReturn(!$checkEmail);
		}
		return;
	}

	/**
	 *	退出登录
	 */
	public function logout(){
		$value = $_SESSION['name'];
		unset($_SESSION['name']);
		$this->success('退出成功，返回首页','/Index/index');
	}
	

}