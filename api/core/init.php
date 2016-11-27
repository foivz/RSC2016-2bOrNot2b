<?php

	$db = new PDO('mysql:host=localhost;dbname=zadmin_rsc;charset=utf8mb4', 'rsc', 'mubyrenuh');
	
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	
	
	
	function get_unique_id() {
		global $db;
		
		$newChar = base_convert(microtime(false), 10, 36);
		
		$check = $db->prepare("SELECT * FROM `zbirka_keys` WHERE `key_chars` = :chars");
		$check->bindValue(':chars', $newChar);
		$check->execute();
		
		$res = $check->fetch();
				
		if(!$res) {
			$insert = $db->prepare("INSERT INTO `zbirka_keys`(`key_chars`) VALUES (:chars)");
			$insert->bindValue(':chars', $newChar);
			$insert->execute();
			
			
			return $db->lastInsertId();
		}
		else {
			return get_unique_id();
		}
	}
?>