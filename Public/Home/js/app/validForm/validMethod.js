define(["jquery","jquery.validate"],function(){
	//修改默认 信息
	$.validator.messages.required = "该选项是必须的";

	$.validator.addMethod("login",function(value,element,params){
		return this.optional(element) || 
		/^[a-zA-Z]\w{5,17}/.test(value);

	},"你输入的用户名有误,请重新输入");
	
	/* 添加验证方法 验证密码  */

	$.validator.addMethod("password",function(value,element, params){
		 //params  为 参数  

		return this.optional(element) || 
		/\w{6,18}/.test(value);
	
	},"你输入的密码有误,请重新输入");
});