<?php
$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");

$query = "select max(id) from markers";
$id1 = mysqli_query($db, $query);
$id = mysqli_fetch_array($id1);

/*$name = $_GET['name'];

$email = $_GET['email'];
$description = $_GET['description'];*/
$name2 = $_GET['nazwa'];

/*
$query = sprintf("INSERT INTO markers (id, name,email,description )  VALUES ('', '%s','%s', '%s')",
         mysqli_real_escape_string($db, $name),
		 mysqli_real_escape_string($db, $email),
         mysqli_real_escape_string($db, $description));
		 
$result = mysqli_query($db, $query);

$data = json_decode(file_get_contents('php://input'), true);
if (!empty($data['names'])) {
    $query1 = sprintf('INSERT INTO markergroup (id_marker, id_group)  VALUES ($id[0],%s ) ', join(', ', $data['names']));
    mysqli_query($db, $query1);
}*/

foreach ($name2 as $nazwa){ 
$query2 = "INSERT INTO markergroup (id_marker, id_group)  VALUES ($id[0],$nazwa )";
$result2 = mysqli_query($db, $query2);
}

?>