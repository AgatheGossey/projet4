<?php

require_once('model/Manager.php');
require_once('view/View.php');

class ConnectionController {

    public function __construct() {
        $this->connectionController = new ConnectionController();
    }

    public function logIn() {
        $username = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['pass']);

        $connection = $this->connectionManager->getConnection($username, $password);

        if ($connection['username'] === $username && $connection['password'] === $password) {
            echo "Connexion réussie !";
        } elseif ($connection === false) {
            throw new Exception('Impossible de se connecter.');
        }
        $view = new View('Login');
        $view->generate(array('connection' => $connection));
    }

}








