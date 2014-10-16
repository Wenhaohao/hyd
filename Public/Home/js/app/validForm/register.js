	// 加载 自定义 扩展设置 validMethod
define(["jquery","jquery.validate","validForm/validMethod"],function(){

	var formName = "registerForm";
	var action   = "checkUserName";
	
	$("#"+formName).attr("action",action);
	var validatorForm = $("form[name="+formName+"]").validate({
		//	debug: true, // 开启debug 模式
			errorElement :"span",
			validClass: "success",
			//文本提示
			errorPlacement: function(error, element) { 	
			 	error.addClass("help-inline"); //添加到 表单尾部
				error.insertAfter( element );
			},
			rules: {
						uid_name:{
							required:true,
							login:true,
							remote:{
								url:"checkUserName",
								type:"post",
								dataType:"json",
								data:{
									username:function(){
										 console.log("send ajax to checkUserName");
										 return $("#uid_name").val();
									}
								}
							}
						},
						passwd:{
							required:true,
							password:true
						},
						confirm_password:{
							required:true,
							equalTo: "#password"
						},
						email: {
							required: true,
							email: true
						},
						contact:{
							required:true
						}
						
					},
			messages :{
						    uid_name: {
									
									login:"输入的用户名有误"
							},
							email: {
									required: "请输入邮箱地址",
									email: "邮箱格式必须满足example@xxx.com"
							},
							confirm_password:{
									equalTo:"与原密码不一致,请确认"
							},

			},
			 //高亮警告提示
			 highlight: function(element, errorClass, validClass) {
			 
			 	// is error   
					$(element).addClass(errorClass).removeClass(validClass);
					$(element).parentsUntil(".control-group").parent().addClass(errorClass).removeClass(validClass);
			},
			 unhighlight: function(element, errorClass, validClass) {
				// is ok

					$(element).removeClass(errorClass).addClass(validClass);
					$(element).parentsUntil(".control-group").parent().removeClass(errorClass).addClass(validClass);
			}

		});
	return validatorForm;
});