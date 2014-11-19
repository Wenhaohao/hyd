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
	
	/**
	 *	初始化
	 */
	public function __construct(){
		parent::__construct();
		$intUserId = $this->uid;
		$arrUserData = D('User','Service')->getUserInfo($intUserId);
		$this->assign('rightUser',$arrUserData);
	}
	
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
    	if(IS_POST){
    		$arrArticleData['uid'] = $this->uid;
    		$arrArticleData['title'] = I('post.title');
    		$arrArticleData['sub_title'] = I('post.sub_title');
    		$arrArticleData['article_tag'] = I('post.tag');
    		$arrArticleData['ref_contents'] = trim(I('post.ref_contents'));
    		$edit = I('post.editorValue');
    		$intro_info = str_replace("&lt;p&gt;","",$edit); //过滤p标签
    		$intro_info = str_replace("&lt;/p&gt;","",$intro_info); //过滤p标签
    		$arrArticleData['contents'] = $intro_info;
    		dump($arrArticleData);
    		exit();
    		$booResult = D('User','Service')->createArticle($arrArticleData);
    	}
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
    		$where['uid'] = $this->uid;
    		$where['birthday'] = I('post.birthday');
    		$where['sex'] = I('post.sex');
    		$where['province'] = I('post.province');
    		$where['city'] = I('post.city');
    		$where['county'] = I('post.country');
    		$where['description'] = I('post.ref_contents');
    		$where['head_url'] = I('ref_image');
    		
//     		dump($where);
//     		exit();
    		$result = D('User','Service')->saveUserInfo($where);
    		if($result){
    			$this->success('修改资料成功','/User/index');
    		}else{
    			$this->error('修改资料失败','/User/editor');
    		}
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