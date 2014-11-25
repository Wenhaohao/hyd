<?php 
// +----------------------------------------------------------------------
// | Service/HealthService.class.php
// +----------------------------------------------------------------------
// | 运动健康指南
// +----------------------------------------------------------------------
// | Author:  min_wenhao<min_Wenhao@163.com>
// +----------------------------------------------------------------------
// | 2014-11-20
// +----------------------------------------------------------------------

/**
 * 运动健康指南
 */
namespace Common\Service;
use Common\Service\CommonService;

class HealthService extends CommonService{
	
	/**
	 * 运动健康指南文章总数
	 */
	public function getCount(){
		$intHealthCount = M('sports')->count();
		return $intHealthCount;
	}
	
	/**
	 * 运动健康指南文字列表
	 * @param int $first 起始页
	 * @param int $last 每页多少条数据
	 */
	public function getList($first,$last){
		$arrHealth = M('sports')
					->limit($first,$last)
					->select();
		return $arrHealth;
	}
	
}
?>