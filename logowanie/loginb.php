<?php
if (
isset($_POST['login']) &&
isset($_POST['pass'])
)
{
	
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	//echo file_get_contents('config.txt'); tutaj trzeba uwazac na sciezke dlatego trzeba zrobic bindParam i w dodatku qq' OR 1=1'
   try
   {
      $pdo = new PDO('mysql:host=localhost;dbname=mapa;port=3306', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
  /*    $stmt = $pdo->prepare('SELECT count(*) AS CNT FROM usr
WHERE pass=sha2(:login,256)
AND login = :pass');
$stmt ->bindParam(':login',$login);
$stmt ->bindParam(':pass',$pass);*/

$stmt = $pdo->prepare("SELECT count(*) AS CNT FROM usr
WHERE pass=:pass
AND login = :login");
$stmt ->bindParam(':login',$login);
$stmt ->bindParam(':pass',$pass);

	  
	  $stmt->execute();
	  $row = $stmt->fetch();
	  if ($row[0] ==1)
	  {
		  //zalogowany
		  session_start();
		  $_SESSION['LOG'] = true;
	  }
	  /*
      foreach($stmt as $row)
      {
          print_r($row);
      }
      */
   }
   catch(PDOException $e)
   {
      echo 'Po³¹czenie nie mog³o zostaæ utworzone: ' . $e->getMessage();
   }
   session_start();
   $_SESSION['zalogowany'] = $_POST['login'];
	header('Location: login.php');
}