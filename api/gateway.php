<?php
	include('core/init.php');
	
	$user = false;
	$level = 0;
	if(isset($_REQUEST['cmd'])) {
		$command = $_REQUEST['cmd'];
	}
	else {
		die('No command has been passed');
	}
	
	if(isset($_REQUEST['token'])) {	
		$sid = $_REQUEST['token'];
		
		$query = $db->prepare("SELECT * FROM `rsc_user`, `rsc_session` WHERE `rsc_user`.`user_id` = (SELECT `rsc_session`.`session_user` FROM `rsc_session` WHERE `rsc_session`.`session_key` = :key) AND `rsc_session`.`session_key` = :key"); 
		$query->bindValue(':key', $sid);
		$query->execute(); 
		$user = $query->fetch();
		
		if($user) $rank = $user['user_rank'];
		else $rank = 0;
	}
	
	$found = false;
	$path = false;
	
	
	// Check if command's path is cached
	
	$query = $db->prepare("SELECT `cache_path` FROM `rsc_cache` WHERE `cache_active` = 1 AND `cache_cmd` = :command AND `cache_rank` = :rank AND `cache_added` >= CURDATE() - INTERVAL 2 WEEK ORDER BY `cache_added` DESC"); 
	$query->bindValue(':command', $command);
	$query->bindValue(':rank', $rank);
	$query->execute(); 
	$cache = $query->fetch();
	
	
	if($cache) {
		$path = $cache['cache_path'];
		$found = true;
	}
	else {
		$ranks = json_decode(file_get_contents('commands/ranks.json'));
	
		foreach($ranks as $r) {
			if(($rank == false && $r->default == true) || $r->level == $rank) {
				$_rank = $r;
			}
		}
		
		$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('commands/'), RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $name => $object) {
			$folder = explode(DIRECTORY_SEPARATOR, $name);
			$folder = $folder[1];
			
			if(basename($name) === $command) {
				$found = true;
				if(in_array($folder, $_rank->commands)) {
					$path = $name;
					break;
				}
				else {
					$path = false;
				}
			}
		}
		
		if($found && $path == false) die('Permission for this command is denied');
		else if(!$found && !$path) die('Command not found');
		else {
			$query = $db->prepare("INSERT INTO `rsc_cache`(`cache_cmd`, `cache_rank`, `cache_path`) VALUES (:command, :rank, :path)");
			$query->bindValue(':command', $command);
			$query->bindValue(':rank', $rank);
			$query->bindValue(':path', $path);
			$query->execute();
		}
		
	}
	
	$sql = file_get_contents($path);
	
	$query = $db->prepare($sql); 
	if($user) {
		if(strpos($sql, ":_uid") !== false) $query->bindValue(":_uid", $user['user_id']);
		if(strpos($sql, ":_uemail") !== false) $query->bindValue(":_uemail", $user['user_email']);
		if(strpos($sql, ":_uname") !== false) $query->bindValue(":_uname", $user['user_name']);
		if(strpos($sql, ":_urank") !== false) $query->bindValue(":_urank", $rank);
	}
	
	
	$reserved = ['method', 'cmd', 'token', 'jsonp', 'debug'];
	
	foreach($_REQUEST as $k => $v) {
		if(!in_array($k, $reserved) && substr($k, 0, 1) !== '_') {
			$query->bindValue(":$k", $v);
		}
	}
	
	
	$success = @$query->execute();
	
	$result = @json_encode($query->fetchAll(PDO::FETCH_ASSOC));
	
	if($success && !$result) echo "#success";
	else if(!$success) echo "#fail";
	else {
		if(isset($_GET['jsonp'])) echo "jsonp($result);";
		else echo $result;
	}
	
	if(isset($_REQUEST['debug'])) $query->debugDumpParams();
	
	$query = $db->prepare("INSERT INTO `rsc_log`(`log_cmd`, `log_session`, `log_ip`, `log_agent`, `log_request`) VALUES (:command, :session, :ip, :agent, :request)");
	$query->bindValue(':command', $path);
	$query->bindValue(':session', $user['session_id']);
	$query->bindValue(':ip', ip2long($_SERVER['REMOTE_ADDR']));
	$query->bindValue(':agent', $_SERVER['HTTP_USER_AGENT']);
	$query->bindValue(':request', json_encode($_REQUEST));
	
	$query->execute();
?>