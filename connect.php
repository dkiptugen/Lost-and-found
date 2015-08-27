<?php
try {
	$db = new PDO('mysql:host=localhost;dbname=laf;charset=utf8','root','admin');
//var_dump($db);
} catch (Exception $e) {
	echo "error connecting";
}

?>