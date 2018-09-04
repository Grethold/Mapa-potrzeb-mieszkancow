<?php
$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");

if(isset($_POST['id']))
{
  $id = intval($_POST['id']);
  $query = "DELETE FROM markers WHERE id = '$id'";
  mysqli_query($db,$query);
  echo 'dupa ';
}
?>