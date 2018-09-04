<?php
session_start();
if (isset($_SESSION['LOG']))
{
	if ($_SESSION['LOG'])
	{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery Ajax Panel</title>
 
<link rel="stylesheet" type="text/css" media="screen" href="styl.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>
 
</head>
<body>
<?php
$db = new mysqli('localhost', 'root', '', 'mapa');
$db -> query("SET CHARSET utf8");
$db -> query("SET NAMES 'UTF-8' COLLATE 'utf8_polish_ci'");

$query = "SELECT * FROM markers";
$result = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($result))
{
    $out[]=$row;
}
echo '<table id="tab">
<tr><th>Id</th><th>Nazwa</th><th>Opis</th><th>E-mail</th><th id="ex">Akcje</th></tr>';
foreach($out as $art)
{
     echo '<tr>';
     echo '<td>'.$art['id'].'</td>';
     echo '<td>'.htmlspecialchars($art['name'],ENT_QUOTES).'</td>';
     echo '<td>'.htmlspecialchars($art['description'],ENT_QUOTES).'</td>';
	 echo '<td>'.htmlspecialchars($art['email'],ENT_QUOTES).'</td>';
echo '<td>
<form method="post"><input type="hidden" name="id" value="'.$art['id'].'" />
<input class="sub" type="submit" value="" />
</form>
     <form method="post" action="">
<input type="hidden" name="id" value="'.$art['id'].'" />
<input class="del" type="submit" value="" title="Usuń" />
</form>
</td>';
     echo '</tr>';
}
echo '</table>';
?>
</body>
</html>
<?php
}
}
?>
