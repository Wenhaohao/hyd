/*
	
	time  2014/10/23
	author liyanlong1993@sina.com
	description :  基于 jquery　上传图片
*/



(function($){


/ *   基本配置参数 */
var DEFAULTS ={
		SERVER_URL : '/share/uploadImage',
		FORM_DATA:{},
		TYPE:'POST',
		ENCTYPE:'multipart/form-data',
		FORM_ID : 'MyUploadForm',
		FILE_NAME :'fileToUpload',
		//验证文件是否符合要求
		UPLOAD_IMAGE:'upload-img'
};

var init = function(){

	var other = this;
	this.bind("click",function(e){
	
		
		var input = $("#"+other.MY_UPLOAD_CONFIG.FILE_NAME);

		input.trigger("click",function(){
				$("#"+other.MY_UPLOAD_CONFIG.UPLOAD_IMAGE).attr("alt",input.val());
		});
		// 验证
		//	ajaxSubmit.call(other);
		
	});
	this.bind("ajaxClick",function(){
		console.log("ajax");
	});
};

var ajaxSubmit  = function(other){
	
	$.ajaxFileUpload
		(
			{
				url:this.MY_UPLOAD_CONFIG.SERVER_URL,
				secureuri:false,
				type: this.MY_UPLOAD_CONFIG.TYPE,
				fileElementId:this.MY_UPLOAD_CONFIG.FILE_NAME,
				dataType: 'text',
				data:{
						name:'logan', id:'id',
					  
					  },
				success: function (data, status)
				{
					console.log(data);
				},
				error: function (data, status, e)
				{
					console.log(data);
				}
			}
		)
};



function uploadMergeConfig(config){
	console.log(DEFAULTS);
	var newConfig = {};

		for ( name  in  DEFAULTS) {
				//  验证 参数
			
		    newConfig[name] = (typeof config[name] =="undefined") ? DEFAULTS[name] : config[name];

		}

	return newConfig;
}


jQuery.fn.extend({

myUpload: function(opt) {
		
	 //console.log(DEFAULTS);
	if(typeof opt !="object") {
		opt ={};
	} 
	this.MY_UPLOAD_CONFIG = uploadMergeConfig(opt);

	init.call(this);

	return this;

}

});

})(jQuery);

