 <?php

	include_once("../include/facebook/facebook.php");

	$fb = new Facebook(array(
		'appId'  => 216145502157759,
		'secret' => "e68a7fbff828c86f3e0bad6fdf87e321"
	));
	
	$user = $fb->getUser();
	
	if(!$user){
		$fbuser = null;
		$url = $fb->getLoginUrl(
			array(
				'redirect_uri' => "http://squizless.com/loginsocial/facebook.php",
				'scope' => 'email'
			)
		);
		header('location: '.$url);
	}
	else {
		$profile = $fb->api("/me?fields=id,first_name,last_name,email,gender,locale,picture,link");
		
		print_r($profile);
		
	}
?>