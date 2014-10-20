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
				<li>
					<div >
						<a  class="head-tool head-tool-register" href="/passport/register">注册</a>
					</div>
				</li>
				<li >
					<div>
						<a href="/passport/login" class="head-tool head-tool-login">登录</a>
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
  	
  <form class="form-horizontal" name="registerForm" id="registerForm"  data-error="control-group" action="" method="post">
    <fieldset>
      <div id="legend" class="">
        <legend class="">
        	用户注册
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

          <!-- Text input-->
          <label class="control-label" >密码</label>
          <div class="controls">
            <input placeholder="请输入你的密码" class="input-xlarge" type="password" name="passwd" id="password" />
            <p class="help-block">长度在6~18之间，只能包含字符、数字和下划线</p>
          </div>
        </div>
    	<div class="control-group">
          <!-- Text input-->
          <label class="control-label" >确认密码</label>
          <div class="controls">
            <input placeholder="请再次输入您的密码" class="input-xlarge" type="password" name="confirm_password">
            <p class="help-block">与输入密码一致</p>
          </div>
        </div>
    <div class="control-group">
	    <label class="control-label" for="inputEmail">邮箱地址</label>
	    <div class="controls">
	    <div class="input-prepend">
	    	<span class="add-on"><i class="icon-envelope"></i></span>
	   	</div>
	    	<input class="span3" id="inputEmail" placeholder="example@xxx.com" type="email" name="email" />
	     	<p class="help-block"></p>
	    </div>
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
            <button class="btn btn-primary"    data-form="registerForm" type="submit" form="registerForm" >开始注册</button>
             <button class="btn" type="reset" form="registerForm" id="reset">重置</button>
          </div>
        </div>
		
    </fieldset>

   </form>
	
  </div>

 
</div>
 <footer id="footer">
  		<div class="container">footer</div>
  </footer>
</body>
<script type="text/javascript">
	window.onload = function(){
		/*
			加载 注册插件
		*/
		var form ={ name:"registerForm"};
		require(["jquery","validForm/register"],function($,config){	

			 $("form[name="+form.name+"]").validate(config);
		});
	};
</script>
</html>