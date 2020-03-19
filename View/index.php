<?php 
session_start();
if(!isset($_SESSION['username']))
{
	include_once 'register.php';
	die();
}
session_destroy();


// echo "welcome to our website"."<br>".$_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
	<link  href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<link href="../bootstrap/css/index.css" rel="stylesheet" >
	<title>Home Page</title>
</head>
<body>
	<header>
			<div class="main">
				<div class="logo"><a href="index.php"><h2>Confusion</h2></a></div>
				<div>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
	</header>
</body>
</html>