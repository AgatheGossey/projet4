<?php
require_once("Framework/Manager.php");

class UserManager extends Manager

{
    public function usernameIsUnfree($username)
    {
        $req = $this->executeARequest('SELECT username FROM users WHERE username = ?', array($username));

        $user = $req->fetch();

            if (empty($user)) {
                return false;
            } else {
                return true;
            }
    }

    public function addUser($username, $password, $email) 
    {
        $user = $this->executeARequest('INSERT INTO users(username, pass, email, registration_date, groups) VALUES (?, ?, ?, NOW(), "user")', array($username, $password, $email));
        return $user;
    }

    public function getUser($username)
    {
        $user = $this->executeARequest('SELECT * FROM users WHERE username = ?', array($username));

        return $user->fetch();
    }

    public function adminConnection($username) {

        $req = $this->executeARequest('SELECT username, groups FROM users WHERE username = ?', array($username));
        $user = $req->fetch();

        return $user['groups'] === 'admin';
    }
}