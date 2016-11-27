<?php
	
	include_once("../include/google/Google_Client.php");
	include_once("../include/google/contrib/Google_Oauth2Service.php");
	
	

	$gClient = new Google_Client();
	$gClient->setApplicationName('Login to squizless.com');
	$gClient->setClientId("516594253290-edf46uk4seniepfd9jme8ijl1u0lq38m.apps.googleusercontent.com");
	$gClient->setClientSecret("y6xuHXx7dKaHYHqDrMIofChV");
	$gClient->setRedirectUri("http://squizless.com/loginsocial/google.php");

	$google = new Google_Oauth2Service($gClient);
	 
	
	$code = (isset($_GET['code'])) ? $_GET['code'] : false;
	
	if($code) {
		$gClient->authenticate();
	}
	else {
		echo "<a href=\"".$gClient->createAuthUrl()."\">Login</a>";
	}
	
?>