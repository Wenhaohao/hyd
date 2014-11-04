/***
*   该插件作用  触发 可切换两种状态  需要 jquery 库 支持
*   测试  0.0.1
*
*/
;(function($,window,document,undefined){


//定义myTab的构造函数  ele 是 jquery 对象 opt 是 设置参数
var MyTab = function(ele, opt) {

    this.$element = ele,    // this.$element 为  指定对象

    this.defaults = {
        'buttonBox' : {     // 按钮层级
                      'box':'myTab-box' , 
                      'button': 'myTab-button'
                      },
        'listener'  :{
            'event' : 'click' 
        },
        'status' :'hidden',   //status 值  show  hidden
        'nowText'   : '显示隐藏',
        'nextText'  : '隐藏列表',
    },
    this.options = $.extend({}, this.defaults, opt);
};

//定义MyTab的方法
MyTab.prototype = {
  
	// 初始化
	init  : function(){

       var result = this;
	 	   var button  = this.initButton();
       button.bind("click",function(){
            result.toggle(button);
                  //切换文字

       });

	},
  toggle: function($e) {        //切换状态

        this.$element.find("[data-tabs]").each(function(){
           $(this).attr("data-status",changeTabs($(this),($(this).attr("data-status")=="show")?"show":"hidden"));
        });
        var tempText = this.options.nextText;  //nextValue      
        this.options.nextText = this.options.nowText;
        this.options.nowText  = tempText;
        $e.html(tempText);
    },
  
  getOpt:function(name){

    	return  (this.options[name]==undefined)?undefined:this.options[name];
    },
 
  initButton:function(){    //创建一个按钮

      if(this.$element.find("."+this.options.button).length > 0){
         return this.$element;    //若已经存在 则返回该对象
      } 

     
      

   
      //var tempText  = this.options.nextText;
      var $box = $("<div class='"+this.options.buttonBox.box+"'><button class='btn btn-small "+this.options.buttonBox.button+"'>"+this.options.nowText+"</button></div>");
      $box.appendTo(this.$element);

      var $button = $box.find("."+this.options.buttonBox.button);

      $button.css("left",($box.width()-$button.width())/2+"px"); // 设置按钮位置,父亲宽度大小 /2 - 本身宽度大小/2    
      
      //初始 值  设置 不可显示或者可显示的 列表
      this.$element.find("[data-tabs]").each(function(){
            _class = $(this).attr("data-tabs");
            $(this).addClass(_class);    //添加 css属性
      });
      return $button;
    }
};
//切换当前状态
function  changeTabs(ele,status){   //将 去掉 或者添加 hidden class 类

  if(status=="hidden"){  
      //显示
      ele.addClass("show");
      return "show";
  }else{
      //隐藏
      ele.removeClass("show");
      return "hidden";
  }

}

// 在插件中使用 MyTab 对象
$.fn.myTab = function(options) {

	//MyTab实体
   var myTab = new MyTab(this, options);

   var settings = $.extend({},myTab.defaults, options);  // 将复制 defaults的值  多实例 使用 保护 defaults值

   // 初始化 按钮
   myTab.init();


   return this.css({   // this为对象
        'color': settings.color,
        'fontSize': settings.fontSize
   });
};

})(jQuery,window,document);
