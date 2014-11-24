<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-10-12
// +----------------------------------------------------------------------

/**
 * 用户中心控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class InfoController extends CommonController {
	
	/*
	 *   运动分享文章内容
	 */
	public function index(){
		$articleId =  I('get.id');
		if(empty($articleId)){
				$this->error('404 NOT FOUND');
		}
		$infoService = D('Info','Service');

		//获取 文章内容
		$infoData = $infoService->getArticle($articleId);
		
		$this->assign('info',$infoData);
		$this->display();
	}
	
	/**
	 * 	运动健康指南内容
	 */
	public function health(){
		$healthId = I('get.id');
		if(empty($healthId)){
			$this->error('404 NOT FOUND');
		}
		$infoService = D('Info','Service');
		
		//获取 文章内容
		$infoData = $infoService->getArticle($healthId);
		
		$this->assign('info',$infoData);
		$this->display();
		
	}
	
}