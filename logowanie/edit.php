<?php
$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");

/*if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['email']))
{*/
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $id = intval($_POST['id']);
  $query = "UPDATE markers SET name = '$name', description = '$description', email = '$email' WHERE id = '$id'";
  $result = mysqli_query($db,$query);
  echo json_encode(array('name'=>$_POST['name'],'description'=>$_POST['description'], 'email'=>$_POST['email']));

?>