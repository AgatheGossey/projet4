<?php

require_once('Framework/Controller.php');
require_once('model/UserManager.php');
require_once('view/View.php');

class ConnectionController extends Controller {

    private $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    public function index() {
        $view = new View('Login');
        $view->generate(array());
    }

    public function logIn() {
        $username = $this->request->getParameter('user');
        $password = $this->request->getParameter('pass');

        $user = $this->userManager->getUser($username);

        if ($user && password_verify($password, $user->getPass())) {
            $_SESSION['errors']['connectionCheckError'] = "";
            $_SESSION['connected'] = true;
            $_SESSION['username'] = $username;
            header('Location: index.php');
            } else {
                $_SESSION['errors']['connectionCheckError'] = "Mauvais nom d'utilisateur/Mot de passe";

            }
    }

}








