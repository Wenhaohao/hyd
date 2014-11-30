<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong
// +----------------------------------------------------------------------
// | 2014-11-29
// +----------------------------------------------------------------------

namespace Home\Widget;
use Think\Controller;

class RankWidget extends Controller {  

 /**
 *  文章排行
 *
 */
  public function articleRank($where,$order,$top = 8){
 	 
	  $rankData = D('Widget','Service')->getArticleRank($where,$order,$top);
	  $this->assign("list",$rankData);
	  $this->display("Widget/articlerank");
	
  }
}