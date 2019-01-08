<?php

require_once('Request.php');
require_once('Controller.php');
require_once('view/View.php');

class Router
{

    // Execute the action associated at the request
    public function requestRouter()
    {
        try {
            $request = new Request(array_merge($_GET, $_POST)); // Merging the GET and POST parameters of the query
            $controller = $this->createController($request);
            $action = $this->createAction($request);
            $controller->executeAction($action);
        }
        catch (Exception $e)
        {
            $this->manageError($e);
        }
    }

    // Create the appropriate controller based on the query received
    private function createController(Request $request)
    {
        $controller = "Post"; // Default controller
        if ($request->existParameter('controller'))
        {
            $controller = $request->getParameter('controller');
            $controller = ucfirst (strtolower($controller)); // First letter in upper case
        }

        // Create the controller file name
        $classController = $controller . "Controller";
        $fileController = "controller/" . $classController . ".php"; // concatenation for build the name of the controller file
        if (file_exists($fileController)) 
        {
            // Instantiation of the controller adapted to the query
            require($fileController);
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        }
        else
            throw new Exception("Fichier '$fileController' introuvable");
    }

    // Determine the action to execute based on the request received
    private function createAction(Request $request) 
    {
        $action = "index"; // action par défaut 
        if ($request->existParameter('action')) 
        {
            $action = $request->getParameter('action');
        } 
        return $action;
    }

    // Manages the exceptions
    private function manageError(Exception $exception) 
    {
        $vue = new View('error');
        $vue->generate(array('msgError' => $exception->getMessage()));
    }
}