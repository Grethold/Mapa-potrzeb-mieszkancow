<?php
$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");


// Gets data from URL parameters.
$name = $_GET['name'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$email = $_GET['email'];
$description = $_GET['description'];
$name2 = $_GET['nazwa'];




// Inserts new row with place data.
$query = sprintf("INSERT INTO markers (id, name, lat, lnt,email,description )  VALUES ('', '%s', '%s', '%s','%s', '%s')",
         mysqli_real_escape_string($db, $name),
         mysqli_real_escape_string($db, $lat),
         mysqli_real_escape_string($db, $lng),
		 mysqli_real_escape_string($db, $email),
         mysqli_real_escape_string($db, $description));
		 
$result = mysqli_query($db, $query);

/*
$query = "select max(id) from markers";
$id1 = mysqli_query($db, $query);
$id = mysqli_fetch_array($id1);


foreach ($name2 as $nazwa){ 
$query2 = "INSERT INTO markergroup (id_marker, id_group)  VALUES ($id[0],$nazwa )";
$result2 = mysqli_query($db, $query2);
}


foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        $name = $_FILES["pictures"]["name"][$key];
        move_uploaded_file($tmp_name, "data/$name");
		$query = "INSERT INTO opis (photos)  VALUES ('$name')";
		$result = mysqli_query($db, $query);
    }
}*/

?>