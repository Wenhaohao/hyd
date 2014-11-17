// 百度地图API功能  initlize
(function(options){

  var textId= options.inputText;
  
  var map = new BMap.Map(options.sitemap);          
  map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
  var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map}
  });


var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
  var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
  map.addControl(top_left_control);        
  map.addControl(top_left_navigation);   

  function G(id) {
    return document.getElementById(id);
  }

  function searchAddress(){
   var text   =   G(textId).value;  //查询按钮触发事件
   local.search(text);
  }

  var ac = new BMap.Autocomplete({              //建立一个自动完成的对象
     "input" : textId,
     "location" : map
  });

  var myValue;
  ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
  var _value = e.item.value;
    myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
    setPlace();
  });

function setPlace(){
    map.clearOverlays();    //清除地图上所有覆盖物
    function myFunc(){ 
      var pp = local.getResults().getPoi(0).point;    
      //获取第一个智能搜索的结果
      map.centerAndZoom(pp, 45);
      map.addOverlay(new BMap.Marker(pp));    //添加标注
    }
     local.search(myValue); //  搜索 
}

function showInfo(e){
  //清空坐标物
    map.clearOverlays();    //清除地图上所有覆盖物

    var marker = new BMap.Marker(e.point,{});
    marker.enableDragging();
    marker.addEventListener("dragend",showInfo);  
    map.addOverlay(marker);
    //设置表单值
    G("lat").value=e.point.lat;
    G("lng").value=e.point.lng;
    //反解析 成详细地址

    var geoc = new BMap.Geocoder();    
 //   local.search(maker);
    geoc.getLocation(e.point, function(rs){
      var addComp = rs.addressComponents;  //根据 经纬度 获取 详细地址
      G(textId).value=( addComp.city  + addComp.district  + addComp.street  + addComp.streetNumber);
    });
}

map.addEventListener("click", showInfo);

})({
  inputText   :  "mapAddress",    //　　地址填写框　　　
  sitemap       :  "sitemap"　　　 //    地图 
});
