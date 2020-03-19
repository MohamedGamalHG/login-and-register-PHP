<?php
include_once('../Model/login.php');

		if(isset($_POST['submit']) && isset($_POST['submit']) == 'Login')
		{
			if(filter_var($_POST['username'],FILTER_SANITIZE_STRING) == true &&
				filter_var($_POST['password'],FILTER_SANITIZE_STRING) == true)
			{
					$user = $_POST['username'];
					$pass = $_POST['password'];

					try{
						
						$log  = new Login($user,$pass);
						$lo = $log->getDate();
						if($lo == True)
						{
							session_start();
							$_SESSION['username'] = $user;
							header("Location:../View/index.php");
						}
						else{
							//echo "There is an Error";
							header("Location:../View/register.php");
						}
						

					}catch(EXception $e)
					{
						echo $e->getMessage();
					}
			}
		
		}
	
