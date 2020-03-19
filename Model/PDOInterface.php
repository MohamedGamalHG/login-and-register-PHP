<?php

interface PDO_Interface{
    
    public function query($sql , $table , $other);
    
    public function execute();

    public function prepare($sql);

    public function rowCount();
    
    public function lastInsertId();
    
    public function fetch();
    
    public function fetchAll();
    
    public function bind($param=[]);
    
    public function update($table , $values ,$colum, $value);
    
    public function delete($table,$colum , $value);
    
    public function close();
}