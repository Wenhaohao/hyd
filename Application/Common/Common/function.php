<?php
function is_login(){
	$user = session('user');
	if(!$user){
		 $this->redirect('User/index');
	}else{
		return $user['uid'];
	}
}


  /**
    *    上传图片函数 操作  
    *    @param  $name        文件名称
    *    @param  $path        文件路径  以document_root 为根目录
    *    @return 
    */
function img_save_to_file($name,$path){

    $IMAGE_URL = '/Public/Uploads/share/';  // path
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']; 
	$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);

	if ( in_array($extension, $allowedExts))
	  {
	  if ($_FILES["img"]["error"] > 0)
		{
			 $response = array(
				"status" => 'error',
				"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
			);
			echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
		}
	  else
		{
			
		  $filename = $_FILES["img"]["tmp_name"];
		  list($width, $height) = getimagesize( $filename );
		  //存放文件 路径
		  $result =  move_uploaded_file($filename, $DOCUMENT_ROOT.$IMAGE_URL.$_FILES["img"]["name"]);

		  if($result ==false){
				$response = array(
					"status" => 'error',
					 "message" => "move_upload_file error",
					);
		  							
		  }else{
		  // 移动指定文件
		
			  $response = array(
				"status" => 'success',
				"url" =>  $IMAGE_URL . $_FILES["img"]["name"],
				"width" => $width,
				"height" => $height
			  );
		  }
		}
	  }
	else
	  {
	   $response = array(
			"status" => 'error',
			"message" => 'something went wrong',
		);
	  }
	  
	  print json_encode($response);
}
/*

	*/
function img_crop_to_file($path){

$imgUrl = $_POST['imgUrl'];
$imgInitW = $_POST['imgInitW'];
$imgInitH = $_POST['imgInitH'];
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];
$cropW = $_POST['cropW'];
$cropH = $_POST['cropH'];

$jpeg_quality = 100;

$path = '/Public/Uploads/share/';  // 路径

$output_filename = $path."croppedImg_".rand();
$imgUrl = $_SERVER['DOCUMENT_ROOT'].$imgUrl;
$what = getimagesize($imgUrl);
switch(strtolower($what['mime']))
{
    case 'image/png':
        $img_r = imagecreatefrompng($imgUrl);
		$source_image = imagecreatefrompng($imgUrl);
		$type = '.png';
        break;
    case 'image/jpeg':
        $img_r = imagecreatefromjpeg($imgUrl);
		$source_image = imagecreatefromjpeg($imgUrl);
		$type = '.jpeg';
        break;
    case 'image/gif':
        $img_r = imagecreatefromgif($imgUrl);
		$source_image = imagecreatefromgif($imgUrl);
		$type = '.gif';
        break;
    default: die('image type not supported');
}
	
	$resizedImage = imagecreatetruecolor($imgW, $imgH);
	imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, 
				$imgH, $imgInitW, $imgInitH);	
	
	
	$dest_image = imagecreatetruecolor($cropW, $cropH);
	imagecopyresampled($dest_image, $resizedImage, 0, 0, $imgX1, $imgY1, $cropW, 
				$cropH, $cropW, $cropH);	


	imagejpeg($dest_image, $_SERVER['DOCUMENT_ROOT']."/".$output_filename.$type, $jpeg_quality);
	
	$response = array(
			"status" => 'success',
			"url" => $output_filename.$type 
		  );
	 print json_encode($response);
}