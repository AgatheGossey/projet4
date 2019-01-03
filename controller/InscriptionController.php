<?php

require_once('Framework/Controller.php');
require_once('model/UserManager.php');
require_once('view/View.php');

class InscriptionController extends Controller {

    private $userManager;

    public function __construct() 
    {
        $this->userManager = new UserManager();
    }

    public function index() 
    {
        $view = new View('Inscription');
        $view->generate(array());
    }

    public function register()
    {
        $username = $this->request->getParameter('user');
        $password = $this->request->getParameter('pass');
        $passCheck = $this->request->getParameter('passCheck');
        $email = $this->request->getParameter('email');

        $temporaryUser = new User(array("username" => $username, "pass" => $password, "email" => $email));

        if (!$this->userManager->usernameIsFree($username))
        {
            $_SESSION['errors']['usernameError'] = "Username error";
        } else {
            $_SESSION['errors']['usernameError'] = "";
        }
        
        if (isset($password) && isset($passCheck) && $password !== $passCheck )
        {
            $_SESSION['errors']['passCheckError'] = "Les mots de passe ne sont pas identiques";
        } else {
            $_SESSION['errors']['passCheckError'] = "";
        }

        if (empty($_SESSION['errors']))
        {
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            $user = $this->userManager->addUser($username, $pass_hash, $email);
            $_SESSION['username'] = $username;
            $_SESSION['connected'] = true;
            $_SESSION['errors'] = [];
            header('Location: index.php');
        } else
        {
            $view = new View("Inscription");
            $view->generate(array());
        }
    }
}