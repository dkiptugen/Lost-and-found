<?php

include 'connect.php';

//foreach ($db->query("SELECT * FROM clients") as $row) {
$stmt = $db->query("SELECT * FROM document WHERE ID=?");

$stmt->bindValue(1,'23');
$stmt->execute();

while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		# code...
	echo htmlentities($row['DOC'])."  ". htmlentities($row['NAME'])."  ".htmlentities($row['NUMBER'])." ". htmlentities($row['EMAIL']). "<br />";
 }
?>