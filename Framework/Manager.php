<?php

abstract class Manager {

    private $db;

    // Execute a SQL query
    protected function executeARequest($sql, $params = null) 
    {
        if ($params === null)
        {
            $result = $this->getDb()->query($sql); // direct execution
        }
        else
        {
            $result = $this->getDb()->prepare($sql); // prepared query
            $result->execute($params);
        }
        return $result;
    }
    
    public function getDb() 
    {
        if ($this->db === null) 
        {
            $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
        return $this->db;
    }
}





