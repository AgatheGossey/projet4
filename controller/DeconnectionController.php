<?php

require_once('Framework/Controller.php');
require_once('model/UserManager.php');
require_once('Framework/View.php');

class DeconnectionController extends Controller
{

    private $userManager;

    public function __construct() 
    {
        $this->userManager = new UserManager();
    }

    // Default function 
    public function index()
    {
        $view = new View('Deconnection');
        $view->generate(array());
    }
    
}