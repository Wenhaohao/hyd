<?php
function is_login(){
	$user = session('user');
	if(!$user){
		 $this->redirect('User/index');
	}else{
		return $user['uid'];
	}
}