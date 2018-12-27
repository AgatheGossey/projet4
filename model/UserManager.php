<?php
require_once("Framework/Manager.php");

class UserManager extends Manager

{
    public function addUser($username, $password, $email) 

    {
        $user = $this->executeARequest('INSERT INTO users(username, pass, email, registration_date, groups) VALUES (?, ?, ?, NOW(), "user")', array($username, $password, $email));
        return $user;
    }

    public function getUserWithPassword($username, $password)
    {
        $user = $this->executeARequest('SELECT * FROM users WHERE username = ? and pass = ?', array($username, $password));

        return $user->fetch();
    }
}