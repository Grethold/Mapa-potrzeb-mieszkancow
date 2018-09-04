<?php

$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");



    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'data/' . $_FILES['file']['name']);
		 $name = $_FILES["file"]["name"];
		$query = "INSERT INTO photo (id,photos)  VALUES ('NULL','$name')";
		// $zapytanie = "SELECT max(id) AS id FROM opis";
		//$id = $db->query($zapytanie);
		// $MaxID = mysqli_query("SELECT MAX(id) FROM `opis`");
		// $MaxID = mysqli_fetch_array($MaxID, MYSQLI_BOTH);
		//$MaxID = $MaxID[0];
		//echo $MaxID;
		//$query = "UPDATE opis SET photos = '$name' WHERE id='$id'";
		//$query = "INSERT INTO opis (id, photos) VALUES('$MaxID', '$name') ON DUPLICATE KEY UPDATE id= '$MaxID',photos='$name'";
		$result = mysqli_query($db, $query);
    }
 
?>