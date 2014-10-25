define(["jquery"],function($){
 	//添加 insert
	    	$("#add-tag").bind("click",function(){

	    			var dom  =  $(this).data("text");
	    			var tagValue = $(dom).val();
	    			if( tagValue=="" ){
	    				console,log("false");
	    				return ;
	    			}

	    				var arr = $(dom).data("value").split("||");			
	    				if(arr.length== 1 && arr[0] == "" ){
	    						arr[0] = tagValue;
	    				}else{
	    						arr.push(tagValue);
	    				}
						showTag.call($("#tag-text"),arr);
	    				if(arr.length > 1){
	    						$(dom).data("value",arr.join("||"));
	    				}else{
	    					$(dom).data("value",arr[0]);
	    				}
	    				$(dom).val("");		
	    	});

	    	//  show  tags 
	    	function showTag(array){

	    		if( typeof array == "string"){
	    			array = [array];
	    		}

	    		str = "";
	    		for (var i = 0; i < array.length; i++) {
	    			str += '<span class="label label-success">'
	    				+array[i]+'<i class="tag-close">&times;</i></span>';
	    		};
		       	this.html(str);
	    	}


	
});    	
	   