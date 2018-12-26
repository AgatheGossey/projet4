<?php
require_once("Framework/Manager.php");

class UserManager extends Manager

{
    public function getUserWithPassword($username, $password)
    {
        $db = $this->getDb();
        $user = $this->executeARequest('SELECT * FROM users WHERE username = ? and password = ?', array($username, $password));

        return $user->fetch();
    }
}