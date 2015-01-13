<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong
// +----------------------------------------------------------------------
// | 2014-11-29
// +----------------------------------------------------------------------

namespace Home\Widget;	//声明为 组件 空间
use Think\Controller;

class CommonWidget extends Controller {  

 
  public function commentList($model,$where,$pagesize){
      //分页 
      $page =   I('get.page');
      $page = (empty($page)||$page<=0)? 1: $page;
      $order ='comment_time desc';
      $service  = D('Widget','Service');
      $listData =  $service->getCommentList($model,$where,$order,$page,$pagesize);
      $count   =  $service->getCommentCount($model,$where);
      $this->assign('list',$listData);
      $this->assign('offsetFloor',($page-1)*$pagesize-1);
      $this->assign('count',$count);
      $this->display("Widget/commentlist");
  }

  public function focusList($first,$pagesize){
      $user  =   I('session.name');
      if(empty($user)){
          return ;
      }
      $service =D('User','Service');
      $listData = $service->getUserFocusList($user["uid"],$first,$pagesize);

      $this->assign('list',$listData);
      $this->display("Widget/focuslist");
  }   

 
}
?>