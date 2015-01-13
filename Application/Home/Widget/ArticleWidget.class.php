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

class ArticleWidget extends Controller {  

 /**
 *  文章排行
 *
 */
  public function articleRank($where,$order,$top = 8){
 	 
	  $rankData = D('Widget','Service')->getArticleRank($where,$order,$top);
	  $this->assign("list",$rankData);
	  $this->display("Widget/articlerank");
	
  }

  /**
  *  相似文章分享
  *
  */
  public function artcileInfo($where,$order,$count){
  	 $listData  =	D('widget','Service')->getArticleInfoList($where,$order,$count);
  	 $this->assign('list',$listData);
  	 $this->display("Widget/articlelist");
  }


 
}
?>