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
			$this->show($checkLogin);
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
		
	}
	
	
}