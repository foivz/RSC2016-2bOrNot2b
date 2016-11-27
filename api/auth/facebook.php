 <?php
	session_start();
	include("../core/init.php");
	include_once("thirdparty/facebook/facebook.php");

	$fb = new Facebook(array(
		'appId'  => 216145502157759,
		'secret' => "e68a7fbff828c86f3e0bad6fdf87e321"
	));
	
	$user = $fb->getUser();
	
	if(!$user){
		$fbuser = null;
		$url = $fb->getLoginUrl(
			array(
				'redirect_uri' => "http://".$_SERVER['HTTP_HOST']."/api/auth/facebook.php",
				'scope' => 'email'
			)
		);
		header('location: '.$url);
	}
	else {
		$profile = $fb->api("/me?fields=id,first_name,last_name,email,gender,locale,picture,link");
		
		print_r($profile);
		// Check if we have records on a user
		
		$query = $db->prepare("SELECT `user_id` FROM `rsc_user` WHERE `user_oid` = :oid"); 
		$query->bindValue(':oid', $profile['id']);
		$query->execute(); 
		
		$user = $query->fetch();
				
		// We don't know the user, register him/her
		if($user == false) {
			$register = $db->prepare("INSERT INTO `rsc_user`(`user_oid`, `user_name`, `user_email`, `user_url`, `user_picture`) 
										VALUES (:oid, :name, :email, :url, :picture)");
			$register->bindValue(':oid', $profile['id']);
			$register->bindValue(':name', $profile['first_name']." ".$profile['last_name']);
			$register->bindValue(':email', $profile['email']);
			$register->bindValue(':url', $profile['link']);
			$register->bindValue(':picture', $profile['picture']['data']['url']);
			
			$register->execute();
			
			$user_id = $register->lastInsertId();
		}
		else {
			$user_id = $user[0];
		}
			
		// Generate session for the user
		
		$session = $db->prepare("INSERT INTO `rsc_session`(`session_key`, `session_user`, `session_ip`) VALUES (:key, :user, :ip)");
		
		$token = substr( md5(rand()), 0, 14);
		$session->bindValue(':key', $token);
		$session->bindValue(':user', $user_id);
		$session->bindValue(':ip', ip2long($_SERVER['REMOTE_ADDR']));
		
		$session->execute();
		
		$_SESSION['usertoken'] = $token;
		
		header("location: ../../app/index.php?token=$token");
		
		
		
	}
?>