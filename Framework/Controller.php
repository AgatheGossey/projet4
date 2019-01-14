<?php 

require_once('Request.php');
require_once('./Framework/View.php');

abstract class Controller
{
    
    private $action; 
    protected $request;

    // Define the request
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    // Execute the action to be performed
    public function executeAction($action)
    {
        if (method_exists($this, $action)) // Checks if the class method exists
        {
            $this->action = $action;
            $this->{$this->action} ();
        }
        else
        {
            $classController = get_class($this); // Returns the name of the class of an object to use it in the error message
            throw new Exception ("Action '$action' non définie dans la classe $classController");
        }
    }

    // The default action
    public abstract function index();
}