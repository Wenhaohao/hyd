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

class GuideWidget extends Controller {  



 /**
 *
 * 指南推荐
 *	 @param  order 
 */
 public function guideInfo($order){
 	 	$infoData	= D('Widget','Service')->getGuideInfo($order);
 	 	$this->assign("info",$infoData);
 	 	//dump($infoData);
 	 	$this->display("Widget/guideinfo");
 }

 public function sportSList($length){
 		$listData	= D('Widget','Service')->getSportsList($order);
 	 	$this->assign("list",$listData);

 	 	$this->display("Widget/sportslist");
 }
 

}
