// 加载 自定义 扩展设置 validMethod
define(["jquery","jquery.validate","validForm/validMethod"],function(){

	var formName = "loginForm";
	var action   = "checkCode";
	$("#"+formName).attr("action",action);
	var validatorForm = $("form[name="+formName+"]").validate({
		//	debug: true, // 开启debug 模式
			errorElement :"span",
			validClass: "success",
			submitHandler:function(form){
				console.log("提交表单");
				form.submit();
			},
			//文本提示
			errorPlacement: function(error, element) { 	
			 	error.addClass("help-inline"); //添加到 表单尾部
				error.insertBefore( element.siblings(".help-block") );
			},
			rules: {
						uid_name:{
							required:true,
							login:true,
							
						},
						passwd:{
							required:true,
							password:true
						},
						confirm_code:{
							required:true,
							minlength:4,
							maxlength:4,
							remote:{
								url:"checkUserName",
								type:"post",
								dataType:"json",
								data:{
									confirm_code:function(){
										 console.log("send ajax to checkCode");
										 return $("#confirm_code").val();
									}
								}
							}
						}

						
					},
			messages :{

							passwd: {
									required: "请输入邮箱地址",
									email: "邮箱格式必须满足example@xxx.com"
							},
							confirm_code:{
									minlength:"长度不得小于指定长度",
									maxlength:"长度不得超于指定长度",

									remote:"验证码有误"
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