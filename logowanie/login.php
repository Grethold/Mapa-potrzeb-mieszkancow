<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f2f2f2;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  padding: 20px 0 30px 0;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 50%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
</head>
<body>
<?php
 
session_start();
if (isset($_SESSION['LOG']))
{
	if ($_SESSION['LOG'])
	{
		echo '<a href="resources.php">Baza danych</a><br><br> '; 
		echo '<a href="logout.php"> Wyloguj </a>';
		echo $_SESSION['zalogowany'];
	}
}

if (!isset($_SESSION['LOG']))
{
echo '<div class="container">
	
  <form action="loginb.php" method="post">
    <div class="row">
      <h1 style="text-align:center">Mapa potrzeb mieszkańców Świecia</h1>
	 <center> <a href="https://www.facebook.com/Mapa-potrzeb-mieszka%C5%84c%C3%B3w-%C5%9Awiecia-1531233323555043/"> <img src="logo500x500.png" width="200px" height="200px"</img></a></center>
      </div>
		<center>
        <input type="text" name="login" placeholder="Username" required>
        <input type="password" name="pass" placeholder="Password" required>
        <input type="submit" value="Zaloguj">
		</center>
  </form>
</div>';
}
?>

</body>
</html>
