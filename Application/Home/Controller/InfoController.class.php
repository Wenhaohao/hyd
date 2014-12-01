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
	*   读取指定文章内容
	*/
	public function index(){
		$articleId =  I('get.id');
		$user = I("session.name");
		if(empty($articleId)){
				$this->error('404 NOT FOUND');
		}
		$infoService = D('Info','Service');

		//获取 文章内容
		$infoData = $infoService->getArticle($articleId);
		$this->assign('info',$infoData);
		
		//查看文章是否被用户收藏  查看文章用户是否被用户关注
		if(isset($user)&&!empty($user["uid"])){
			$status['collected'] =  $infoService->isUserArticleCollect($user["uid"],$articleId);  
			$status['focused'] = D('User','Service')->isUserFocus($user["uid"],$articleId);
		}

		$this->assign('status',$status);
		$this->display();
	}



	/**
	*	infoHealth 显示健康文章信息
	*	@author liynalong@sina.com
	*	@param 
	*	@return
	*/
	public function health(){
		$tid =  I('get.tid');
		if($tid == null){
			$this->error('404 NOT FOUND',U('/Health/index'));
		}
		$infoData =D('Info','Service')->getHealthArticle($tid);

		$this->assign('info',$infoData);
    	$this->display();
	}	

	/**
	*   用户收藏文章 或者取消收藏文章
	*
	*/
	public function uploadArticleCollect(){
		$user = (I("session.name"));
		//判断用户是否登录
		if(empty($user)){
			$return = array('status' => false, 'msg' => "请用户先登录");
			$this->ajaxReturn($return);
			return;
		}
		//判断文章id 是否存在
		$articleId    = I('post.article_id');
		if($articleId == null){
			$return = array('status' => false, 'msg' => "用户操作错误");
			$this->ajaxReturn($return);
			return;
		}
		$action = I('post.action');   
		$infoService = D('Info','Service');
		$collectData =  $infoService->getUserArticleCollect($user["uid"],$articleId);

		//采用insert插入记录
		if($collectData == null ){

			if($action == "collect"){
				 $result = $infoService->createArticleCollect(array("uid"=>$user["uid"],"article_id"=>$articleId,"is_collected"=>1));
				
			}else if($action=="uncollect"){
				$this->ajaxReturn(array("status"=>false,"msg"=>"cuowu"));
				return ;
				$result = $infoService->createArticleCollect(array("uid"=>$user["uid"],"article_id"=>$articleId,"is_collected"=>0));
			}

		}else{
		//更新数据
			if($action == "collect"){
				$collectData["is_collected"] = 1;
				$result = $infoService->saveArticleCollect($collectData);
			}else if($action=="uncollect"){
				$collectData["is_collected"] = 0;
				$result = $infoService->saveArticleCollect($collectData);
			
			}
		}
		//如果 操作成功 进行更新收藏数
		if($result == true){
		 	$counts = $infoService->getArticleCounts($articleId);
			$infoService->saveArticleInfo(array("article_id"=>$articleId,"collect_counts"=>$counts));
		}
		if(isset($result)&&$result == true){
			$action = ($action=="collect")?"uncollect":"collect";
			$actionText= ($action=="collect")?"取消收藏":"收藏";
			$return  = array("status" => true,"collect_counts"=>$counts,"action"=>$action,"action_text"=>$actionText);
		}else{
			$return  = array("status" => false,"msg"=>"服务器繁忙","action"=>$action);
		}

		//返回 json 类型
		$this->ajaxReturn($return);

	}


	//投票前检查
	public function _before_uploadVote(){
		$user = I("session.name");
		if($user ==null ){
			$return =  array("status"=>false,"msg"=>"请用户先登录");
			$this->ajaxReturn($return); 
	
		}

	}
	//用户投票
	public function uploadVote(){
		$user = I("session.name");
		//$this->ajaxReturn($user);	
		//判断是否已投过票
		$articleId  =	I("post.article_id");
		$action     =   I("post.action");
		$type       =   I("post.type");
		//检查是否存在投票
		$infoService  = D('Info','Service');
		if($type=="article"){
		
			$voteData    = $infoService->getArticleVote($user["uid"],$articleId);
			if($voteData != null){
				$return  = array('status' =>  false,'msg'=>'你已经投过票');
				$this->ajaxReturn($return);
			}
			$voteData["uid"] = $user["uid"];
			$voteData["article_id"] = $articleId;
			if($action == "unsupport"){
				$voteData["is_support"] = 0;
			}else{
				$voteData["is_support"] = 1;
	 		}
	 		//保存投票
	 		$result  = $infoService->saveArticleVote($voteData);
	 

		}else if($type=="guide_article"){
			//检查是否投过票
			$voteData    = $infoService->getGuideArticleVote($user["uid"],$articleId);
			if($voteData != null){
				$return  = array('status' =>  false,'msg'=>'你已经投过票');
				$this->ajaxReturn($return);
			}
			$voteData["uid"] = $user["uid"];
			$voteData["guide_article_id"] = $articleId;
			if($action == "unsupport"){
				$voteData["is_support"] = 0;
			}else{
				$voteData["is_support"] = 1;
	 		}
	 		$result  = $infoService->saveGuideArticleVote($voteData);
		}else{
			$result  = false;
		}	
			if($result){
	 			$return  = array("status"=>true,"msg"=>"success");
	 		}else{
	 			$return  = array("status"=>false,"msg"=>"服务器繁忙");
	 		}

		$this->ajaxReturn($return);
	}



}