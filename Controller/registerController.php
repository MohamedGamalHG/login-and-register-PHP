<?php

include_once('../Model/login.php');

if(isset($_POST['submit']) && isset($_POST['submit']) == 'Register')
		{
			if(
				filter_var($_POST['username'],FILTER_SANITIZE_STRING) == true &&
				filter_var($_POST['password'],FILTER_SANITIZE_STRING) == true &&
				filter_var($_POST['password2'],FILTER_SANITIZE_STRING) == true &&
				filter_var($_POST['address'],FILTER_SANITIZE_STRING) == true &&
				filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) == true &&
				filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT) == true 		
			)
			{
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$email =$_POST['email'] ;

				
				if ($password != $password2) 
					$error = "your Password not identical";

					try{
						
						$log  = new Login($username,$password);
						$lo = $log->getDateRegister($address,$email,$phone);
						
						if($lo == True)
						{
							header("Location:../View/register.php");
						}
						else{
							
							header("Location:../View/register.php");
							
						}
						

					}catch(EXception $e)
					{
						echo $e->getMessage();
					}
			}
		
		}
	
