<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>运动健康分享平台--发表文章</title>
	<!--  css 浏览器标准化 -->
		<link rel="stylesheet" href="/Public/static/css/normalize.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="/Public/static/css/bootstrap.css">
	

	<!-- 网站logo -->
	<link rel="Bookmark" href="/Public/static/img/favicon_x16.ico" />
	<link rel="shortcut icon" href="/Public/static/img/favicon_x16.ico" type="image/x-icon" />
	<link rel="icon" href="/Public/static/img/favicon_x16.ico" type="image/x-icon" />

	<link rel="stylesheet" href="/Public/Home/css/common/style.css">

	
	<link href="/Public/Home/css/libs/flickerplate/flickerplate.css"  type="text/css" rel="stylesheet">
	<!-- 图片上传  -->
	<link href="/Public/static/css/croppic.css" rel="stylesheet" />
	<script type="text/javascript" src="/Public/Home/js/lib/jquery.js"></script>
	<script data-main="/Public/Home/js/main" type="text/javascript" src="/Public/static/js/require.js"></script>

</head>
<body>
<div class="navbar">


	<div class="navbar-fixed-top">
		 <div class="navbar-inner">    
		 	<div class="container nav-collapse" >
		 		<div class="brand">
		 			<a class="logo"></a>
		 			<span>运动健康分享平台</span>
		 		</div>
		 	<ul class="nav " id="nav">  
		 		<li>
		 			<a href="http://www.hyd.com">首页</a>
		 		</li>  
		 		<li>
					<a  href="#">运动分享 </a>
		 		</li>
		 		<li><a href="#">专家指导</a></li>
		 		
		 		<li><a href="#">健康指南</a></li>
		 	</ul>
			<ul class="nav pull-right" id="nav-right">
				<li>
					<form class="navbar-search pull-left"> 
					 <input type="text" class="search-query"  placeholder="Search">
					 <span class="head-tool head-tool-search"></span>
					</form>
				</li>
				<!-- 网站配置选项 -->
				<li><div class="head-tool head-tool-config"></div></li>
				<!-- 个人选项  -->
				<li class="dropdown dropdown-head">
					<a class="dropdown-toggle head-tool-user" data-toggle="dropdown" data-target="#" id="headLabel" >
						 <img  src="/Public/HOME/images/default-user.png" alt="头像" > 
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="headLabel">
						<li><a tabindex="-1" href="#">个人中心</a></li>
						<li><a tabindex="-1" href="#">消息</a></li>
						<li><a tabindex="-1" href="#">意见反馈</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="#">退出</a></li>
					</ul>
					
				</li>
				
			</ul>

		 	
		 	</div> 
		 </div>
	</div>
</div>
<div class="container" id="pagewrap">
	<div class=" module-show">
			<!-- 功能模块 展示 -->
			<ul class="row">

              <li class="span3">
                <a href="#" class="thumbnail">
                  <span class="head-app-icon head-app-sys"></span>
                  <span class="head-app-name">网站公告</span>
                   <span class="badge badge-important ">100</span>
                </a>

              </li>
              <li class="span3">
                <a href="#" class="thumbnail">
                  <span class="head-app-icon head-app-sport"></span>
                  <span class="head-app-name">运动健康分享</span>
                   <span class="badge badge-important ">100</span>
                </a>
              </li>
              <li class="span3">
                <a href="#" class="thumbnail">
                  <span class="head-app-icon head-app-share"></span>
                  <span class="head-app-name">专家指导</span>
                   <span class="badge badge-important ">100</span>
                </a>
              </li>
              <li class="span3">
                <a href="#" class="thumbnail">
                  <span class="head-app-icon head-app-sns"></span>
                  <span class="head-app-name">运动计划分享</span>
                   <span class="badge badge-important ">100</span>
                </a>
              </li>
            </ul>
	</div>

	
	
	<!-- 文章内容  -->
	<div class="container">

		<div class="clearfix"></div>
		<section class="module-left pull-left">

	
			<ul class="breadcrumb">
    				<li><a href="#">首页</a> <span class="divider">/</span></li>
	    		<li><a href="/share">分享</a> <span class="divider">/</span></li>
    			<li class="#">文章发布 <span class="label ">ing...</span></li>
    		</ul>
	
			<div class="module-app ">
				<div class="module-app-share">
						
			<form class="form-horizontal" name="registerForm" id="createArticle"  data-error="control-group" action="/Home/Share/uploadArticle" method="post">
		   	 <fieldset>
		      <div id="legend" class="">
		        <legend class="">运动分享</legend>
		      </div>
					
		   		<div class="control-group" >
		         <label class="control-label" >主标题</label>
		          <div class="controls">
		            <input placeholder="主标题" class="input-xlarge" type="text" id="title" name="title" data-provide="typeahead" />
		           	<p class="help-block">文章标题在15~20字以内</p>
		          </div>
		        </div>

		    	<div class="control-group ">
		          <label class="control-label" >副标题</label>
		          <div class="controls">
		            <input placeholder="副标题" class="input-xlarge" type="text" name="sub-title" id="sub-title" />
		            <p class="help-block">标题格式:主标题---副标题</p>
		          </div>
		        </div>
				
				<div class="control-group ">
		          <label class="control-label" >运动分类</label>
		          <div class="controls">
		          	<!-- 二级联动 -->
		            <select class="span2">	
						<option value="1">室内运动</option>
						<option value="2">户外运动</option>
					</select>
					<select class="span2">	
						<option value="3">a</option>
						<option value="4">b</option>
					</select>
		            <p class="help-block">选择运动分类</p>
		          </div>
		        </div>

		    	<div class="control-group">
		          <!-- Text input-->
		          <label class="control-label" >文章标签</label>
		          <div class="controls">
		            <input placeholder="请输入标签名" class="input-small" type="text" name="tag" id="tag" data-value="">
		            <button class="btn btn-info" type="button" data-text="#tag" id="add-tag">添加</button>      
		          </div>
		        </div>
				<div class="control-group">
				
		          <div class="controls">
		       		<p class="help-block tags" id="tag-text">

		       		</p>
		          </div>
		        </div>
		        <div class="control-group">
				  <label class="control-label" >内容介绍</label>
		          <div class="controls">
		       		 <textarea rows="3" class="textarea" name="ref_contents">
		       		 	
		       		 </textarea>
		       		<p class="help-block">
						
		       		</p>
		          </div>
		        </div>
			 <div id="legend" class="">
		        <legend >正文</legend>
		      </div>
		    <div class="control-group">
			  	<!-- 文章编辑框 -->
			     <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
		    </div>

		    	<div class="control-group">
		    		<div class="controls">
						<label class="checkbox inline">
						我已阅读相关信息
						<input type="checkbox"  name="contact" checked="checked" value="ok">
						</label>

					</div>
				</div>
		    	<div class="control-group">
		          
		          <!-- Button -->
		          <div class="controls">
		            <button class="btn btn-primary"  type="submit" form="createArticle" >提交</button>
		             <button class="btn" type="reset" form="createArticle" id="reset">重置</button>
		          </div>
		        </div>
				<div class="upload">
					<div class=" thumbnail " href="#">
						<div class="upload-img" id="uploadImg"></div>
						<input type="text" style="display:none;" id="ref_image" name="ref_image">
					</div>
				</div>
		    </fieldset>

   		</form>

				</div>
			</div>

		</section>
	
			<!-- 网站旁白 -->
		<aside class="module-aside pull-right">
			<div class="module-app">
				

			
			<ul class="nav nav-tabs ">
				    <li class="active"><a href="#new" data-toggle="tab">最新文章</a></li>
				    <li><a href="#hot" data-toggle="tab">热门文章</a></li>
				    <li><a href="#recommend" data-toggle="tab">推荐文章</a></li>
    		</ul>
    		<div class="tab-content module-app-rank">
					
			</div>
			</div>
		</aside>
	
	</div>

</div>
<input type="file" name="fileToUpload" id = "fileToUpload" />	
</body>
<!-- 加载文本编辑器 -->
<script type="text/javascript" charset="UTF-8"  src="/Public/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="UTF-8"  src="/Public/Ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="UTF-8"  src="/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">

	window.onload = function(){
		
		require(["ueditor/createArticle"],function(config){
			
				var ue = UE.getEditor('editor',config);
					
		});
	
	    /* 注册 事件 */
	    require(["jquery","app/demo"],function(){
	    	$("#reset").bind("click",function(){
	    			var ue = UE.getEditor('editor');
	    			ue.setContent(""); //清空 编辑器内容
	    			$("#tag").data("value","");
	    			$("#tag-text").html("");
	    	});

	    
	    });
	 
	};
</script>
<script src="/Public/static/js/croppic.js"></script>
<script type="text/javascript" >
$(function(){

	//  croppic 容器 模型 配置文件
	var croppicContainerModalOptions = {
				uploadUrl:'/share/uploadImage',
				cropUrl:'/share/uploadCroppicImage',
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',

				onAfterImgCrop:function(){ 
					$("#ref_image").val($('#uploadImg img:first').attr("src")); 
				}
		}
	// 新建对象
	var cropContainerModal = new Croppic('uploadImg', croppicContainerModalOptions);

});

</script>

</html>