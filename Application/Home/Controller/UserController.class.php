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
use Home\Controller\CheckController;

class UserController extends CheckController {
	
	public function index(){
		$intUserId = $this->uid;
		$arrUserData = D('User','Service')->getUserInfo($intUserId);
// 		dump($arrUserData);
// 		exit();
		$this->assign('user',$arrUserData);
		$this->display();
	}



	/**
    *    编辑文章页面
    *    @param
    *    @return 
    */

    public function createArticle(){
        $this->display();
    }


    /**
    *    提交文章页面
    *    @param
    *    @return 
    */

    public function uploadArticle(){
        print_r($_POST);
        return ;
    // $this->display();
    }
    
   /**
    *    异步上传图片
    *    @param
    *    @return 
    */
    public function uploadImage(){
  		
        /* Applicaiton  Common  文件上传保存 */
        $name = "demo";
        $path ="";
        img_save_to_file($name,$path);
//         $intUserId = $this->uid;
//         D('User','Service')->saveImageUrl($intUserId,$data);
    }
    
    /**
    *    异步裁剪图片
    *    @param     action  目的 上传为头像还是文章图片
    *    @return 
    */
    public function uploadCroppicImage(){

        /* 文件  裁剪 保存  */

        $path = "/Public/Uploads/share/";  
        img_crop_to_file($path);  // 裁剪图片
        return;
    }


  /**
    *  
    *    修改个人资料个人偏好
    *    @param
    *    @return 
    *
    */
    public function editor(){
    	$intUserId = $this->uid;
    	$arrUserData = D('User','Service')->getUserInfo($intUserId);
    	$this->assign('user',$arrUserData);
        $this->display();
    }
	
    /**
     * 保存修改信息
     */
    public function saveInfo(){
    	if(IS_POST){
    		$where['birthday'] = I('post.birthday');
    		$where['sex'] = I('post.sex');
    		$where['province'] = I('post.province');
    		$where['city'] = I('post.city');
    		$where['country'] = I('post.country');
    		$where['description'] = I('post.ref_contents');
    		$where['head_url'] = I('ref_image');
    		dump($where);
    		exit();
    	}
    }
    
  /**
    *  
    *    用户好友界面
    *    @param
    *    @return 
    *
    */
	public function friends(){


		$this->display();
	}

  /**
    *  
    *    用户分享文章页面
    *    @param
    *    @return 
    *
    */
    public function article(){

        

        $this->display();

    }


}