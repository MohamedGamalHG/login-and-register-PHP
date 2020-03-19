<?php

require_once('../Model/PDOClass.php');

class Login{

	private $username;
	private $pass;
	private $db;
	private $table_name = 'user';
	private $confirmpass;
	private $email;
	private $address;
	private $phone;
	private $columnaddress = 'Addresse';
	private $columnphone = 'phone';
	private $columnemail = 'Email';
	private $columnpass = 'Password';
	private $columnname = 'UserName';
	private $columnvkey = 'VKey';

	public function __construct($user,$pass)
	{
		$this->setData($user,$pass);
		$this->ConnectToDb();
		//$this->getDate();
	}

	private function setData($user,$pass)
	{
		$this->username = $user;
		$this->pass = $pass;
	}

	private function ConnectToDb()
	{
		$this->db = PDOClass::getInstance();
	}

	 public function getDate()
	{
		try{
			
				 $this->pass = md5($this->pass);
				 $stmt = "select * from ".$this->table_name."  where
				 		 UserName= '$this->username' AND Password= '$this->pass'";
				 $st = $this->db->prepare($stmt);
				 $arr = ["username" => "$this->username","pass" => "$this->pass"];
				 $st = $this->db->bind($arr);
				 $st = $this->db->execute();
				  $sr = $this->db->rowCount();

				 /* here i use new varibale becuase i use rowcount function and this fucntion return number of column that count it  so for that reason in if statment if use $sr > 0 and 
				 if i will use the st in if statment then i should use in if $st != null
				 */
				
				 
					if($sr > 0)
					{
						//include_once '../View/index.php';
						return True;
					}
					else
					{
						//throw new EXception("is not Invalid");
						
						header("Location:../View/register.php");
					}
			
	}catch(EXception $e)
	{
		echo $e->getMessage();
	}

	}
	 public function getDateRegister($address,$email,$phone)
	{
		try{

				
				 	$this->email = $email;
					$this->address = $address;
					$this->phone = $phone;
				 	$this->pass = md5($this->pass);
				 	$vkey = md5(time().$this->username);
				 	$stmt = "INSERT INTO ".$this->table_name."
				 	 ({$this->columnaddress},{$this->columnphone},
				 	  {$this->columnemail},{$this->columnpass},
				 	  {$this->columnvkey},{$this->columnname}
				 	 )
				 	VALUES 
				  (:addr,:phon,:emo,:passo,:VKey,:username)";
				  echo '<pre>';
				  var_dump($stmt);
				 $st = $this->db->prepare($stmt);
				 $arr = [
					 	"addr" => "$this->address","phon" => "$this->phone",
					 	"emo" => "$this->email","passo" => "$this->pass",
					 	"VKey" => "$vkey","username" => "$this->username"
				 	];

				 $st = $this->db->bind($arr);
				 $st = $this->db->execute();

				 var_dump($st);
				  //$sr = $this->db->rowCount();

				 /* here i use new varibale becuase i use rowcount function and this fucntion return number of column that count it  so for that reason in if statment if use $sr > 0 and 
				 if i will use the st in if statment then i should use in if $st != null
				 */
				
				 
					if($st)
					{
						//include_once '../View/index.php';
						return True;
					}
					else
					{
						//throw new EXception("is not Invalid");
						header("Location:../View/register.php");
						
					}
			
	}catch(EXception $e)
	{
		echo $e->getMessage();
	}

	}

	 function Close()
	{
		$this->db->close();
	}
}