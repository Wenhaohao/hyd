<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>运动健康分享平台--首页</title>
	<!--  css 浏览器标准化 -->
	<link rel="stylesheet" href="/Public/static/css/normalize.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="/Public/static/css/bootstrap.css">


	<!-- 网站logo -->
	<link rel="Bookmark" href="/Public/static/img/favicon_x16.ico" />
	<link rel="shortcut icon" href="/Public/static/img/favicon_x16.ico" type="image/x-icon" />
	<link rel="icon" href="/Public/static/img/favicon_x16.ico" type="image/x-icon" />

	<link rel="stylesheet" href="/Public/Home/css/common/style.css">
	<script data-main="/Public/Home/js/main" type="text/javascript" src="/Public/Home/js/require.js"></script>

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
				<li>
					<div >
						<a  class="head-tool head-tool-register" href="#">注册</a>
					</div>
				</li>
				<li class="">
					<div>
						<a href="#" class="head-tool head-tool-login">登录</a>
					</a>
					</div>
					
				</li>
				
			</ul>

		 	
		 	</div> 
		 </div>
	</div>
</div>
<div id="pagewrap">

  <div  class="container" >
  	
  <form class="form-horizontal" name="loginForm" id="loginForm"  data-error="control-group" action="<?php echo U('Passport/login');?>" method="post">
    <fieldset>
      <div id="legend" >
        <legend>
        	用户登录
        </legend>
      </div>
   		<div class="control-group" >
          <!-- Text input-->
         <label class="control-label" >用户名</label>
          <div class="controls">
            <input placeholder="请输入用户名" class="input-xlarge" type="text" id="uid_name" name="uid_name" type="text" />
           	<p class="help-block">以字母开头,长度在6~18之间，只能包含字符、数字和下划线</p>
          </div>
        </div>

    	<div class="control-group ">

          <label class="control-label">密码</label>
          <div class="controls">
            <input placeholder="请输入你的密码" class="input-xlarge" type="password" name="passwd" id="passwd" />
            <p class="help-block">长度在6~18之间，只能包含字符、数字和下划线</p>
          </div>
        </div>
<!--     	<div class="control-group"> -->
<!--           Text input -->
<!--           <label class="control-label" >验证码</label> -->
<!--           <div class="controls"> -->
<!--             <input  class="input-small" type="text" name="confirm_code" id="confirm_code"> -->
<!--             <a href="javascript:void(0)"><img  class="confirm-img" src="../../../../Public/Home/images/get_img.jpg" alt=""></a> -->
<!--             <p class="help-block">请输入右图验证码</p> -->
<!--           </div> -->
<!--         </div> -->
   
    	<div class="control-group">
          <!-- Button -->
          <div class="controls">
         	 <button class="btn btn-primary"  type="submit" form="loginForm" >登录</button>
             <button class="btn" type="reset" form="loginForm" id="reset">重置</button>
          </div>
        </div>
		
    </fieldset>

   </form>
	
  </div>
   <div class="p-wrap"></div>
   <div class="p-wrap"></div>
   <div class="p-wrap"></div>
   <div class="p-wrap"></div>

</div>
 <footer id="footer">
  	
  		<div class="container">footer</div>
  </footer>
</body>
<script type="text/javascript">
	window.onload = function(){
		/*
			加载 登录验证插件
		*/
		require(["jquery","validForm/login"],function($,config){	
	
			var form = {name:"loginForm"};	
		 	$("form[name="+form.name+"]").validate(config);
		
		});
	};
</script>
</html>