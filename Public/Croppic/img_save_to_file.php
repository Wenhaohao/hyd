<?php
/*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/

    $IMAGE_URL = '/Public/Uploads/share/';
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
		 //   rename( $tempPath . $_FILES["img"]["name"], $DOCUMENT_ROOT.$IMAGE_URL.$_FILES["img"]["name"]);
			  //$DOCUMENT_ROOT . $IMAGE_URL.$_FILES["img"]["name"]
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

?>
