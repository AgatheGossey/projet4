<?php
require_once("model/Manager.php");

class ConnectionManager extends Manager

{
    public function getConnection($username, $password)
    {
        $db = $this->getDb();
        $req = $db->prepare('SELECT * FROM users WHERE username = ? and password = ?');
        $req->execute(array($username, $password));
        $connection = $req->fetch();

        return $connection;
    }
}