<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author:  liyanlong<liyanlong1993@sina.com>
// +----------------------------------------------------------------------
// | 2014-10-21
// +----------------------------------------------------------------------

/**
 *  分享控制器
 */
namespace Home\Controller;	//表示当前类是Home模块下的控制器类
use Think\Controller;	//表示引入Think\Controller明明空间便于直接使用

class ShareController extends Controller {
	
    /**
     * 首页输出
     * @param 
     * @return 
     */
    public function index(){
    	$this->display();
    }

    /**
    *   
    *  共享文章查看 
    *  @param
    *  @return
    */

    public function article(){

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
    *    @param
    *    @return 
    */
    public function uploadCroppicImage(){

        /* 文件  裁剪 保存 */
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
    public function uploadUser(){
        
        $this->display();
    }
}

