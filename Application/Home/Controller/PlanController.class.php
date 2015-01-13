<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-11-10
// +----------------------------------------------------------------------

/**
 *  运动计划
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Think\Controller;	//表示引入Think\Controller明明空间便于直接使用

class PlanController extends CommonController {
	
    /**
     * 首页输出  -- 运动计划
     * @param 
     * @return 
     */
    public function index(){
    	$objPlanService = D('Plan','Service');
//    	$intCount = $objPlanService->getCount();
//    	$page = new \Think\Page($intCount,2);
//    	$first = $page->firstRow;
//    	$last = $page->listRows;
//    	$planPage = $page->show();

    	$arrPlanData = $objPlanService->getList($first,10);
    	$this->assign('list',$arrPlanData);
//    	$this->assign('page',$planPage);
    	$this->display();
    }

    //编辑计划
    public function  createPlan(){
        // 判断是否登录
       if(!empty($this->userName)){
              // 设置表单令牌
                md5(date());
              $this->display();
       }else{
            echo 'error';
            $this->error('请先登录后发表运动计划','/Passport/login');
       }
    }

    // 发表计划
    public function uploadPlan(){

        $user = $this->userName;
    
        if(IS_POST&&isset($user)){
            $data    =   M('plans')->create($_POST);
            $data['uid'] = $user['uid'];

            $result  =   D('Plan','Service')->savePlan($data);
        }else{
            //跳回首页
            $this->redirect('/Index/index');
            return ;
        }

        if($result){
            $this->success('运动计划添加成功','/Plan/index');
        }else{
            $this->error('运动计划添加失败','/Plan/createplan');
        }
    }
     public function  demo(){

    	$this->display();
    }
 
}

