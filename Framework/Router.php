<?php

require_once('Request.php');
require_once('Controller.php');
require_once('view/View.php');

class Router {

    public function requestRouter() {
        try {
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        }
    }

    private function createController(Request $request) {
        $controller = "Post";
        if ($request->existParameter('controller')) {
            $controller = $request->getParameter('controller');
            $controller = ucfirst (strtolower($controller));
        }

        $classController = $controller . "Controller";
        $fileController = "controller/" . $classController . ".php";
        if (file_exists($fileController)) {
            require($fileController);
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        }
        else
            throw new Exception("Fichier '$fileController' introuvable");
    }

    private function createAction(Request $request) {
        $action = "index";
        if ($request->existParameter('action')) {
            $action = $request->getParameter('action');
        } 
        return $action;
    }

    private function manageError(Exception $exception) {
        $vue = new View('error');
        $vue->generate(array('msgError' => $exception->getMessage()));
    }
}