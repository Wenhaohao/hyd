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
		$arrUserData = I("session.name");   //从session 调取
        $pathInfo   = I('server.REQUEST_URI');
     
        $pattern = "/\/([^\/\?\&\=\.]+)/i";   //使用正则表达式 提取 获取actionName
        preg_match($pattern, $pathInfo, $matches, PREG_OFFSET_CAPTURE, 1); //捕抓指定匹配
      
        $this->assign('nameAction',$matches[1][0]); //  第1个 下标1 表示 括号抓捕的第一个数据数组 第2个下标0表示抓捕的字符串    
        $this->assign('userData',$arrUserData); // User控制器 附加的右栏 

    }
	/**
    *   个人资料
    *
    */
	public function index(){
        
		$intUserId = $this->uid;
		$arrUserData = D('User','Service')->getUserInfo($intUserId);
		$this->assign('user',$arrUserData);
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
		$intUserId = $this->uid;
		$intUserArticleCount = D('User','Service')->getUserArticleCount($intUserId);
		
		// 翻页
		$page = new \Think\Page($intUserArticleCount,5);
		$first = $page->firstRow;
		$last = $page->listRows;
		$listPage = $page->show();
		$arrUserArticle = D('User','Service')->getUserArticle($intUserId,$first,$last);

		$this->assign('list',$arrUserArticle);
		$this->assign('page',$listPage);
		
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
            $arrArticleData['category_id'] = I('post.categoryId');
    		$arrArticleData['ref_image'] = I('ref_image');
    		$arrArticleData['ref_contents'] = trim(I('post.ref_contents'));
    		
    		
    		$edit = I('post.editorValue');
    		//$intro_info = str_replace("&lt;p&gt;","",$edit); //过滤p标签
    		//$intro_info = str_replace("&lt;/p&gt;","",$intro_info); //过滤/p标签
    		$arrArticleData['contents'] = $edit;
    		$booResult = D('User','Service')->createArticle($arrArticleData);
    		$this->success('发表文章成功','/User/article');
    	}else{
            // 获取 分类
            if(S('categorysAll') == null){
    
                $categoryData = D('List','Service')->getCategorys();
            }else{
                $categoryData = S('categorysAll');
            }

            $categoryTree = array();    // 父类分类列表
            $defaultCat   = array();    //默认子分类列表
            $index = null;
            foreach ($categoryData as $category) {
                if($category['parent_id'] == null){
                   if($index == null ){    //首个分类选项 id标识
                       $index =  $category['category_id'];    
                   }
                       $categoryTree[] = $category;
                }else{
                   if($index != null && $category['parent_id'] == $index){
                      $defaultCat[] = $category; 
                   }
                }
            }
            $this->assign('categoryTree',$categoryTree);
            $this->assign('defaultCat',$defaultCat);
            $this->display();
    	}
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
    		$where['province'] = intval(I('post.province'));
    		$where['city']   = intval(I('post.city'));
    		$where['county'] = intval(I('post.county'));
    		$where['description'] = I('post.ref_contents');
    		$where['head_url'] = I('ref_image');
    		$result = D('User','Service')->saveUserInfo($where);

    		if($result){
                //修改session  对应的 列          
                foreach ($where as $key => $value) {
                    $_SESSION['name'][$key] = $value;  // 直接修改session值
                }

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
	
        $user     = I('session.name'); 
        //获取用户关注列表
        $userService = D('User','Service');
        $focusCount      = $userService->getUserFocusCount($user["uid"]);

        //好友分页
        $page  = new \Think\Page($focusCount,20);
        $first = $page->firstRow;
        $last  = $page->listRows;
        $listPage = $page->show();
        $listData = $userService->getUserFocusList($user["uid"],$first,$last);

        $this->assign('list',$listData);
        $this->assign("page",$listPage);
		$this->display();
	}

    public function searchFriends(){
        $keywords = I('get.keywords');  //  查询好友   
        $user     = I('session.name'); 
        if(isset($keywords)&&$keywords!=''){
             $userService = D('User','Service');
             $focusCount      = $userService->getUsersCount($keywords);
             $page  = new \Think\Page($focusCount,20);
             $first = $page->firstRow;
             $last  = $page->listRows;
             $listData  =  $userService->getUsersList($keywords,$first,$last);
             $listData  =  $userService->getUsersFocusStatus($user["uid"],$listData);
             $listPage = $page->show();
        }
        

        $this->assign('list',$listData);
        $this->assign("page",$listPage);
        $this->display();
    }
    /**
    *   个人社区   用户文章收藏
    *
    */

    public function collection(){
        // 获取用户所有收藏
       $user = I('session.name');
       $userService = D('User','Service');
       $listCount =  $userService->getUserCollectsCount($user["uid"]); 
       //分页查询
       $page  = new \Think\Page($listCount,2);
       $first = $page->firstRow;     //起始行
       $last  = $page->listRows;     //

       $listData = $userService->getUserCollectList($user['uid'],$first,$last);

       $list = $page->show();       // 分页导航样式
       $this->assign('list',$listData);
       $this->assign('page',$list);
       $this->display();
    }
  
    /**
    *   用户添加取消关注
    * 
    */
    public function  uploadFocus(){

       $user = I('session.name');
       if($user==null){
            $return  = array("status"=>false,"msg"=>"请用户登录");
            $this->ajaxReturn($return);
            return;
       }
        $focusUid = I('post.focus_uid');
        if($focusUid == null || !is_numeric($focusUid)){
            $return  = array('status' =>false ,"msg"=>"非法参数格式" );
            $this->ajaxReturn($return);
            return;
        }
        if($focusUid  == $user["uid"]){
            $return  = array('status' =>false ,"msg"=>"用户无法关注本身" );
            $this->ajaxReturn($return);
            return;
        }

        $userService = D('User','Service');
        $focusData = $userService->getUserFocus($user["uid"],$focusUid);

        $result = false;
        if($focusData==null){
            //添加关注
            $focusData["uid"] =  $user["uid"];
            $focusData["focus_uid"] = $focusUid;
            $result = $userService->createUserFocus($focusData);
            if($result  == true){
                $return = array("status"=>true,"msg"=>"取消关注");
            }
        }else{
            //更新关注

            $focusData["is_focused"]=(($focusData["is_focused"]==0)? 1 : 0);


            $result =  $userService->saveUserFocus($focusData);

            if($result  == true){
                $return['status'] = true;
                if($focusData["is_focused"]==0){
                    $return['msg'] = "关注";
                }else{
                    $return['msg'] = "取消关注";
                }
            } 
        }
        if($result == false){
            $return  =array("status"=>false,"msg"=>"服务器繁忙");
            return;
        }
        $this->ajaxReturn($return);
    }


}