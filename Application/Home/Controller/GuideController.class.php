<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-11-5
// +----------------------------------------------------------------------

/**
 *  健康指南 
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Home\Controller\CommonController;	//表示引入Think\Controller明明空间便于直接使用

class GuideController extends CommonController {

    public function _before_index(){
        //分类筛选  年龄分类
        $categoryData  =  C('HUMAN_GROUP');
        $this->assign("humanlist",$categoryData);
        //运动分类
        $healthSerivce = D('Health','Service');
        if(S('sports_category_list') == null){
           $scListData  =  $healthSerivce->getSportsCategoryList();
            S('sports_category_list',$sportsListData);
        }else{
           $scListData  =  S('sports_category_list');
        }
        if(I('get.cid') != null){
           $sportsListData =   $healthSerivce->getSportsList(I('get.cid'));
           $this->assign("sport_list",$sportsListData);
        }
        $this->assign("sports_category_list",$scListData);
    }


    public function index(){
        $cid = I("get.cid");
        if($cid!=null){
            $where['hyd_sports.category_id'] = $cid;
        }
        $sid = I('get.sid');
        if($sid !=null){
            $where['hyd_guide_articles.sport_id'] = $sid;
        }
        $healthService = D('Health','Service');
        $intHealthCount = $healthService->getCount($where);

        $page = new \Think\Page($intHealthCount,10);
        $first = $page->firstRow;
        $last = $page->listRows;
        $listPage = $page->show();
        $listData = $healthService->getList($first,$last,$where);
      
        $this->assign('list',$listData);
        $this->assign('page',$listPage);
        $this->display();
    }
}

