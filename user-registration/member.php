<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<h2>Welcome, <?=$_SESSION['sess_id'];?>! <a href="logout.php">Logout</a></h2>
<p>
Bien ouej fiston ta fais 1% du projet
</p>
</body>
</html>
<?php
}
?>


