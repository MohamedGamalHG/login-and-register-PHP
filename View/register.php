<?php 
$Done = false;
$error = null;





//filter_var($_POST['username'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH)

// if(isset($_POST['submit']) == 'Register')
// {
// 	if(
// 		filter_var($_POST['username'],FILTER_SANITIZE_STRING) == true &&
// 		filter_var($_POST['password'],FILTER_SANITIZE_STRING) == true &&
// 		filter_var($_POST['password2'],FILTER_SANITIZE_STRING) == true &&
// 		filter_var($_POST['address'],FILTER_SANITIZE_STRING) == true &&
// 		filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) == true &&
// 		filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT) == true 		){
		
// 			$username = $_POST['username'];
// 			$password = $_POST['password'];
// 			$password2 = $_POST['password2'];
// 			$address = $_POST['address'];
// 			$phone = $_POST['phone'];
// 			$email =$_POST['email'] ;

// 		if($username == null)
// 		$error = "where is your name ";
// 	elseif ($password != $password2) 
// 		$error = "your Password not identical";
// 	// elseif($phone < 12 && $phone > 11 )
// 	// 	$error = "there is a problem in phone";

// 	else{
// 		require_once '../Model/PDOClass.php';

			
// 			// echo '<pre>';
// 			// var_dump($username);
// 			// var_dump($password);
// 			// var_dump($password2);
// 			// var_dump($address);
// 			// var_dump($phone);
// 			// var_dump($email);
			


		
// 		$vkey = md5(time().$username);
// 		//var_dump($vkey);
// 		$pass = md5($password);
// 		//var_dump($pass);
// 		$sql = "INSERT INTO user (Addresse,phone,Email,Password,VKey,UserName)";
// 		$sql2 = " VALUES (:address,:phone,:email,:password,:vkey,:username)";
// 		$con = $sql.$sql2;
// 		 //var_dump($con);

// 		$conn = PDOClass::getInstance();
// 		//var_dump($sql);

// 		 $stmt = $conn->prepare($sql,$sql2);

// 		 //var_dump($stmt);

// 		$stmt->bindParam(':address',$address,PDO::PARAM_STR);
// 		$stmt->bindParam(':phone',$phone,PDO::PARAM_INT);
// 		$stmt->bindParam(':email',$email,PDO::PARAM_STR);
// 		$stmt->bindParam(':password',$pass,PDO::PARAM_STR);
// 		$stmt->bindParam(':vkey',$vkey,PDO::PARAM_STR);
// 		$stmt->bindParam(':username',$username,PDO::PARAM_STR);

// 		//var_dump($stmt->bindParam(':username',$username,PDO::PARAM_STR));
		

// 		//var_dump($stmt);

// 		//var_dump($stmt->execute());
// 		$isinserted = $stmt->execute();
// 		$suc = "the value add succsufully";
// 		if($isinserted)
// 		{
// 			$to = $email;
// 			$subject = "Email Verfication";
// 			$message = "<a href='http://localhost/hotel_reservation/register/verify.php?vkey = $vkey'>Register Account </a>";
// 			//$header = 
// 		}

	

// 	}

// 	}

	
	

	
// }

?>

<!DOCTYPE html>
<html>
<head>
	<link  href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<link href="../bootstrap/css/custome.css" rel="stylesheet" >
	<title>Form</title>
</head>
<body>
	<header>
		<div class="Container">
			<div class="contants logincont">
					<div class="register">
							<form method="post" action="../Controller/registerController.php">
								
									<label>UserName<input class="input-lg" type="text" name="username" required m></label><br>
									<label>Password<br><input class="input-lg" type="Password" name="password" required></label><br>
									<label>Confirm Password<br><input class="input-lg" type="Password" name="password2" required></label><br>
									<label>Address<br><input class="input-lg" type="text" name="address" required></label><br>
									<label>Phone<br><input class="input-lg" type="text" name="phone" required></label><br>
									<label>Email<br><input class="input-lg" type="Email" name="email" required></label><br>
									<input id="in" type="Submit" name="submit" value="Register" required  class="btn btn-primary"><br>	
							</form>
						</div>
						<div class="login">
							<form method="post" action="../Controller/loginController.php"> 
								<!-- ../Controller/loginController.php -->
									<label>UserName<input class="input-lg" type="text" name="username" required m></label><br>
									<label>Password<br><input class="input-lg" type="Password" name="password" required></label><br>
									<input id="in" type="Submit" name="submit" value="Login" required  class="btn btn-primary"><br>
							</form>
						</div>
			</div>
		</div>
	</header>

	<center>
		<?php 
			if($Done == true)
				echo "Done";
			elseif($error != null)
				echo $error;
			else
				echo '';
		?>
	</center>
	
</body>
</html>