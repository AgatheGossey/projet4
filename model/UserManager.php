<?php
require_once("Framework/Manager.php");
require_once("model/entities/User.php");

class UserManager extends Manager
{

    public function usernameIsFree($username)
    {
        $req = $this->executeARequest('SELECT username FROM users WHERE username = ?', array($username));
        $user = $req->fetch();

        return empty($user); 
    }

    public function addUser($username, $password, $email) 
    {
        $user = $this->executeARequest('INSERT INTO users(username, pass, email, registration_date, groups) VALUES (?, ?, ?, NOW(), "user")', array($username, $password, $email));

        return $user;
    }

    public function getUser($username)
    {
        $request = $this->executeARequest('SELECT * FROM users WHERE username = ?', array($username));
        $result = $request->fetch();

        if ($result != NULL)
        {
        $user = new User($result);
        return $user;
        } 

        return false;
        
    }

    public function adminConnection($username) 
    {
        $request = $this->executeARequest('SELECT username, groups FROM users WHERE username = ?', array($username));
        $result = $request->fetch();

        $user = new User($result);

        return $user->getGroups() === 'admin';
    }
    
}