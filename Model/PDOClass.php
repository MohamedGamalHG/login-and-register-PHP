<?php

require_once('Config.php');
require_once ('PDOInterface.php');
class PDOClass implements PDO_Interface{

	private $dbname,$dbhost,$dbuser,$dbpass,$stmt,$concat;
    public $connection;
	private static $instance = null;

	public function __construct()
	{

		$this->dbhost = DB_HOST;
		$this->dbname = DB_NAME;
		$this->dbuser = DB_USER;
		$this->dbpass = DB_PASS;

		try{

			$this->connection = new  PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,
															$this->dbuser,$this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_CLASS);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die();
		}
	}

    public function name()
    {
        return $this->dbname;
    }
	/*
	  function getInstance will create one instance from database
	  and will acess it by name of class ::getInstance 
	  ex: $db = PDOClass::getInstance;

		this the applay of SINGLETONE

	*/
	public static function getInstance()
	{
		if(!self::$instance)
			self::$instance = new self();
		return self::$instance;

	}


     public function bind($params = []){
        $i=0;
        foreach ($params as $key => $value) {

            if (is_string($value))
                $type = PDO::PARAM_STR;
            elseif (is_int($value))
                $type = PDO::PARAM_INT;
            elseif (is_bool($value))
                $type = PDO::PARAM_BOOL;
            else
                $type = PDO::PARAM_NULL;
            
            $this->stmt->bindValue(':'.$key , $value , $type);
           // echo 'i am here'.$i++.'<br>';
            //to test the function 
        }
        return $this;
    }
    
    /*
     * Query Model
     * Executes An Select SQL Statement
     * 
     * :: Additional Notes ::
     * 
     * Arguments $other Use it If Query Not Finished Yet As your use (WHERE , LIKE ..Etc)
     */
    
    public function query($colum , $table , $other = null){
        $this->stmt = $this->connection->prepare("SELECT $colum FROM `$table` $other");
        return $this;
    }
    
    /*
     * Insert Model
     * Executes An Insert SQL Statement
     */
    
    public function insert($table , $colums , $values){
        $this->stmt = $this->connection->prepare("INSERT INTO `$table` ($colums) VALUES ($values)");
        return $this;
    }
    
    /*
     * Update Model
     * Executes An Update SQL Statement
     */
    
    public function update($table , $values ,$colum, $value){
        $this->stmt = $this->connection->prepare("UPDATE `$table` SET $values WHERE `$colum` = $value");
        return $this;
    }
    
    /*
     * Delete Model
     * Executes An Insert SQL Statement
     */
    
    public function delete($table , $colum , $value){
        $this->stmt = $this->connection->prepare("DELETE FROM `$table` WHERE `$colum` = $value");
        return $this;
    }
    
    /*
     * Execute
     * Responsible For execution Any Model 
     */
    public function prepare($sql)
    {
        $this->stmt = $this->connection->prepare($sql);
        return $this->stmt;
    }
    public function execute(){
        
        $this->stmt->execute();
        return $this;
    }
    
    /*
     * Row Count
     * To Get Row Count From Database Table
     */
    
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    /*
     * Last Insert Id
     * To Get Last Insert Id After Use Insert Model
     */
    
    public function lastInsertId(){
        return $this->connection->lastInsertId();
    }
    
    /*
     * Fetch
     * You Can Use it To get One Row With Single Query
     */
    
    public function fetch(){
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /*
     * Fetch All
     * You Can Use it To get All Rows As an array
     */
    
    public function fetchAll(){
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    /*
     * Close Databse Connect
     * Use It When you Want Close Connection
     */
  
    public function close(){
        $this->connection = NULL;
    }























 //    public function exec($sql)
 //    {
 //        $this->stmt = $this->conn->exec($sql);
 //        return $this->stmt;
 //    }

 //    public function query2($sql)
 //    {
 //        $gh = $this->conn->query($sql);
 //        var_dump($gh);
 //        return $gh;
 //    }

	// public function query($colum , $table , $other = null){
 //        $this->stmt = $this->conn->prepare("SELECT $colum FROM `$table` $other");
 //        return $this->stmt;
 //    }
    
 //    /*
 //     * Insert Model
 //     * Executes An Insert SQL Statement
 //     */
    
 //    public function insert($table , $colums , $values){
 //        $this->stmt = $this->conn->prepare("INSERT INTO `$table` ($colums) VALUES ($values)");
 //        return $this;
 //    }
    
 //    /*
 //     * Update Model
 //     * Executes An Update SQL Statement
 //     */
    
 //    public function update($table , $values ,$colum, $value){
 //        $this->stmt = $this->conn->prepare("UPDATE `$table` SET $values WHERE `$colum` = $value");
 //        return $this;
 //    }
    
 //    /*
 //     * Delete Model
 //     * Executes An Insert SQL Statement
 //     */
    
 //    public function delete($table , $colum , $value){
 //        $this->stmt = $this->conn->prepare("DELETE FROM `$table` WHERE `$colum` = $value");
 //        return $this;
 //    }
    
 //    /*
 //     * Execute
 //     * Responsible For execution Any Model 
 //     */
 //    public function prepare($sql)
 //    {
 //    	$this->concat = $sql;
 //    	return $this->conn->prepare($this->concat);
 //    }
 //    public function execute($sql){
 //        $this->stmt = $this->prepare($sql);
 //        $this->stmt->execute();
 //        return $this->stmt;
 //    }
    
 //    /*
 //     * Row Count
 //     * To Get Row Count From Database Table
 //     */
    
 //    public function rowCount(){
 //        return $this->stmt->rowCount();
 //    }
    
 //    /*
 //     * Last Insert Id
 //     * To Get Last Insert Id After Use Insert Model
 //     */
    
 //    public function lastInsertId(){
 //        return $this->conn->lastInsertId();
 //    }
    
 //    /*
 //     * Fetch
 //     * You Can Use it To get One Row With Single Query
 //     */
    
 //    public function fetch(){
 //        return $this->stmt->fetch(PDO::FETCH_ASSOC);
 //    }
    
 //    /*
 //     * Fetch All
 //     * You Can Use it To get All Rows As an array
 //     */
    
 //    public function fetchAll(){
 //        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
 //    }
  
 //    /*
 //     * Close Databse Connect
 //     * Use It When you Want Close Connection
 //     */
  
 //    public function close(){
 //        $this->conn = NULL;
 //    }

}

?>