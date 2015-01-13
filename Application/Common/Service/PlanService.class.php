<?php 
namespace Common\Service;
use Common\Service\CommonService;
// +----------------------------------------------------------------------
// | Service/PlanService.class.php
// +----------------------------------------------------------------------
// | 运动计划模型
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-11-25
// +----------------------------------------------------------------------

/**
 * 运动计划模型
 */
class PlanService extends CommonService{
	
	/**
	 *	获取运动计划的总数 
	 *	@return int $intCount
	 */
	public function getCount(){
		$intCount = M('plans')->count();
		return $intCount;
	}
	
	/**
	 *	获取运动计划的信息 
	 */
	public function getList($first,$list){
		$arrPlanData = M('plans')
						->join('hyd_users ON hyd_plans.uid = hyd_users.uid')
						->order('publish_time desc')
						->limit($first,$list)
						->select();
		return $arrPlanData;
	}
	/**
	*	添加运动计划
	*/
	public function savePlan($data){

		$result = M('plans')->data($data)->add();
		
		if(isset($result) && $result > 0 ){
			return true;
		}else{
			return false;
		}
	}
}
?>