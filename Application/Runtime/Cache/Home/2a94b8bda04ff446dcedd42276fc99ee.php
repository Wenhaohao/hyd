<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>运动健康分享平台--首页</title>
	<!--  css 浏览器标准化 -->
	<link rel="stylesheet" href="/Public/Static/css/normalize.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="/Public/Static/css/bootstrap.css">


	<!-- 网站logo -->
	<link rel="Bookmark" href="/Public/Static/img/favicon_x16.ico" />
	<link rel="shortcut icon" href="/Public/Static/img/favicon_x16.ico" type="image/x-icon" />
	<link rel="icon" href="/Public/Static/img/favicon_x16.ico" type="image/x-icon" />

	<link rel="stylesheet" href="/Public/Home/css/common/style.css">
	<script data-main="/Public/Home/js/main" type="text/javascript" src="/Public/Static/js/require.js"></script>

	<script type="text/javascript" src="/Public/Static/js/jquery.js"></script>
	<script type="text/javascript" src="/Public/Static/js/bootstrap.js"></script>
	
	<link href="/Public/Home/css/libs/flickerplate/flickerplate.css"  type="text/css" rel="stylesheet">


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
					<!--<div class="head-tool head-tool-config"></div> -->
				</li>
				<li >

					<div>
						<a href="/passport/login" class="head-tool head-tool-login">登录</a>
					</a>
					</div>
					<!--
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
					 -->
				</li>
				
			</ul>

		 	
		 	</div> 
		 </div>
	</div>
</div>
<!--  首页独立css-->	
<link rel="stylesheet" href="/Public/Home/css/common/main.css">

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
                <a href="/list/article" class="thumbnail">
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
                <a href="/share/index" class="thumbnail">
                  <span class="head-app-icon head-app-sns"></span>
                  <span class="head-app-name">个人社区</span>
                   <span class="badge badge-important ">100</span>
                </a>
              </li>
            </ul>
	</div>

	<div class="module-slide">
    	<div class="hero-unit">
			<div class="flicker-example" style="display:none;" data-block-text="false" id="flicker-tool">
			<ul>
			   			 <li data-background="">
			          	<h1>运动&健康</h1>
			    			<p>给大家提供一个运动健康的分享平台</p>
			    		<p>
			   	 			<a class="btn btn-primary btn-large">
			  					查看更多
					    	</a>
			    		</p>
			    		</li>
			    <li data-background="">
			          	<h1 >运动&健康</h1>
			    			<p>给大家提供一个运动健康的分享平台</p>
			    			<p>
			   	 			<a class="btn btn-primary btn-large">
			  					查看更多
					    	</a>
			    		</p>	
			    </li>
			    <li data-background="">
			      
			    </li>
			  </ul>
			</div>	
    	</div>
	</div>
	
	<!-- 文章内容  -->
	<div class="container">
		
		<section class="module-left pull-left">
			<div class="module-app">
				
			
			<ul class="media-list module-app-list">
				<li class="media item"> 
					<a class="pull-left thumbnail" href="#">
					<img  class="media-object item-img" alt="128x128" data-src="">
					</a>
					<div class="media-body">
					<h4 class="media-heading page-header">
						<a href="#">
						传微软将发布智能运动手环：支持多个系统
						</a>
					</h4>
					<div class="item-nav">
						<a href="#">
							<span class="label label-info">丽丽	
							</span>
						</a>
						<span class="label-time">
							2014-10-20 08:45
						</span>
						<div class="pull-right">
						<span class="label">赞
						</span>
						<span class="badge badge-info">8</span>
						
						
						</div>
						
					</div>
					<div class="media">
						微软这款手环将首先专注于运动功能。通过内置的多个传感器，这款手环将可以用于计步、追踪心率、热量消耗，以及其他关键的健康信息。
					</div>
					</div>
					
				</li>
				<li class="media item"> 
					<a class="pull-left thumbnail" href="#">
					<img  src=""  alt="128x128" class="media-object item-img" data-src="holder.js/64x64">
					</a>
					<div class="media-body">
						<h4 class="media-heading page-header">
							<a href="#">
							传微软将发布智能运动手环：支持多个系统</a></h4>
					<div class="item-nav">
						<a href="#">
							<span class="label label-info">丽丽	
							</span>
						</a>
						<span class="label-time">
							2014-10-20 08:45
						</span>
						<div class="pull-right">
						<span class="label">赞
						</span>
						<span class="badge badge-info">8</span>
						</div>
					</div>
					<div class="media">
						微软这款手环将首先专注于运动功能。通过内置的多个传感器，这款手环将可以用于计步、追踪心率、热量消耗，以及其他关键的健康信息。
					</div>
					</div>
					
				</li>
			</ul>
				<div class="pagination">
				    <ul class="pull-right">
				    <li ><a href="#">上一页</a></li>
				    <li class="active"><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li><a href="#">下一页</a></li>
				    </ul>
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
			<section class="tab-pane   active" id="new"><ul>
				<li>
					<span class="rank rank-top">1</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				<li>
					<span class="rank rank-middle">2</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>
				</li>
				<li>
					<span class="rank rank-third">3</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>
					
				</li>
				<li>
					<span class="rank">4</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>	
				</li>
				<li>
					<span class="rank ">5</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				<li>
					<span class="rank ">6</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				
				<li>
					<span class="rank ">7</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				
				<li>
					<span class="rank ">8</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				
			</ul>
			</section>
			<section class="tab-pane " id="hot">
				<ul>
				<li>
					<span class="rank rank-top">1</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				<li>
					<span class="rank rank-middle">2</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>
				</li>
				<li>
					<span class="rank rank-third">3</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>
					
				</li>
				<li>
					<span class="rank ">4</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>	
				</li>
			 </ul>

			</section>
			<section class="tab-pane" id="recommend">
				<ul>
				<li>
					<span class="rank rank-top">1</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a></li>
				<li>
					<span class="rank rank-middle">2</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>
				</li>
				<li>
					<span class="rank rank-third">3</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>
					
				</li>
				<li>
					<span class="rank ">4</span>
					<a href="#">“凹凸共享租车”A轮融资近千万美... </a>	
				</li>
			</ul>
			</section>
			</div>
			</div>
		</aside>
	</div>

</div>
 <footer id="footer">
  
  		<div class="container">footer</div>
  </footer>
</body>
<script type="text/javascript">
	window.onload = function(){

		require(["jquery","flicker/headUnit"],function(J,obj){
			
			$(obj.selector).flicker(obj.config);
			$(obj.selector).show();
		});

	};
</script>
</html>