<?php

require_once('Framework/Controller.php');
require_once('model/UserManager.php');
require_once('Framework/View.php');

class InscriptionController extends Controller 
{

    private $userManager;

    public function __construct() 
    {
        $this->userManager = new UserManager();
    }

    // Default function 
    public function index() 
    { 
        $view = new View('Inscription');
        $view->generate(array());
        $_SESSION['errors'] = [];
    }

    public function register()
    {    
        $username = $this->request->getParameter('user');
        $password = $this->request->getParameter('pass');
        $passCheck = $this->request->getParameter('passCheck');
        $email = $this->request->getParameter('email');

        if (!$this->userManager->usernameIsFree($username))
        {
            $_SESSION['errors']['usernameError'] = "Pseudo déjà utilisé, veuillez en choisir un autre.";
        }

        if (strlen($password) < 6)
        {
            $_SESSION['errors']['passError'] = "Le mot de passe doit comporter au minimum 6 caractères.";
        }
        
        if (isset($password) && isset($passCheck) && $password !== $passCheck )
        {
            $_SESSION['errors']['passCheckError'] = "Les mots de passe ne sont pas identiques.";
        }

        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
        {
            $_SESSION['errors']['mailError'] = "L'adresse email n'est pas valide, recommencez !";
        }

        if (empty($_SESSION['errors']))
        {
            $pass_hash = password_hash($password, PASSWORD_DEFAULT); // hash the password to make it unreadable in the database
            $user = $this->userManager->addUser($username, $pass_hash, $email);
            $_SESSION['username'] = $username;
            $_SESSION['connected'] = true;
            $_SESSION['errors'] = [];
            header('Location: index.php');
        } 
        else
        {
            header('Location: index.php?controller=inscription');
        }
    }
}