<?php
	include('../core/init.php');

	if(!isset($_POST['email']) || !isset($_POST['password'])) {
		die("#no-logininfo");
		
	}
	else {
		$email = $_POST['email'];
		$pass = $_POST['password'];
		if(isset($_POST['callback'])) {
			$callback = $_POST['callback'];
		}
		else {
			die("#no-callback");
		}
	}
	
	//$results = DB::queryFirstRow("SELECT `user_password`, `user_id` FROM `zbirka_users` WHERE `user_email` = %s", $email);
	
	$query = $db->prepare("SELECT `user_password`, `user_id` FROM `zbirka_users` WHERE `user_email` = :email"); 
	$query->bindValue(':email', $email);
	$query->execute(); 
	$user = $query->fetch();
	
	
	if($user !== false && password_verify($pass, $user['user_password'])) {
		$key = get_unique_id();
		
		$query = $db->prepare("INSERT INTO `zbirka_sessions` (`session_key`, `session_user`, `session_ip`) VALUES (:key, :user, :ip)");
		$query->bindValue(':key', $key);
		$query->bindValue(':user', $user['user_id']);
		$query->bindValue(':ip', ip2long($_SERVER['REMOTE_ADDR']));
		$query->execute();
				
		$session_key = $db->prepare("SELECT `key_chars` FROM `zbirka_keys` WHERE `key_id` = :id");
		$session_key->bindValue(':id', $key);
		$session_key->execute();
		
		$session_key = $session_key->fetch();
				
		echo $callback . (parse_url($callback, PHP_URL_QUERY) ? '&' : '?') . "sid={$session_key['key_chars']}";
	}
	else {
		die('#invalid');
	}
		
	function generate_key() {
		global $db;
		
		$key = substr(base64_encode(rand(0, PHP_INT_MAX)), 0, 12);
		
		$query = $db->prepare("SELECT COUNT(*) AS 'count' FROM `zbirka_sessions` WHERE `session_key` = :key"); 
		$query->bindValue(':key', $key);
		$query->execute(); 
		$keycheck = $query->fetch();
		
		if($keycheck['count'] == 0) return $key;
		else return generate_key();
	}
?>