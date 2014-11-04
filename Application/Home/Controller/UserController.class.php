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
use Think\Controller;

class UserController extends Controller {
	
	public function index(){
		
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
        return ;
    // $this->display();
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
        
        $this->display();
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