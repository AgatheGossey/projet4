<?php

abstract class Manager {

    private $db;

    protected function executeARequest($sql, $params = null) 
    {
        if ($params == null)
        {
            $result = $this->getDb()->query($sql);
        }
        else
        {
            $result = $this->getDb()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }
    
    public function getDb() 
    {
        if ($this->db == null) 
        {
            $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
        return $this->db;
    }
}





