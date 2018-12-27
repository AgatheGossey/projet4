<?php

require_once('Framework/Controller.php');
require_once('model/UserManager.php');
require_once('view/View.php');

class InscriptionController extends Controller {

    public function __construct() 
    {
        $this->userManager = new UserManager();
    }

    public function index() {
        $view = new View('Inscription');
        $view->generate(array());
    }

    public function register() {

        $username = $this->request->getParameter('user');
        $password = $this->request->getParameter('pass');
        $passCheck = $this->request->getParameter('passCheck');
        $email = $this->request->getParameter('email');

        if (isset($password) && isset($passCheck) && $password != $passCheck )
        {
            echo "Les mots de passe ne sont pas identiques";
        }
        else if (strlen($password) < 6) {
            echo "Le mot de passe doit comporter au minimum 6 caractères.";
        }
        else if (isset($email) && !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
        {	
            echo "L'adresse . $email . n'est pas valide, recommencez !";
        }
        else {
            $pass_hache = password_hash($password, PASSWORD_DEFAULT);
            $user = $this->userManager->addUser($username, $pass_hache, $email);
            $view = new View('Inscription');
            $view->generate(array('successfulRegistration' => 'Inscription réussie !'));
        }
    }
}