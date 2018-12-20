<?php
require_once('controller/PostController.php');
require_once('controller/CommentController.php');
// require('controller/ConnectionController.php');

require_once('view/View.php');

class Router {

    private $postCtrl;
    private $commentCtrl;

    public function __construct() {
        $this->postCtrl = new PostController();
        $this->commentCtrl = new CommentController();
        // $this->connectionCtrl = new ConnectionController();
    }

    public function requestRouter() {

        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    $this->postCtrl->listPosts();
                }
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->postCtrl->post();
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->commentCtrl->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] === 'viewComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->commentCtrl->viewComment();
                    }
                    else {
                        throw new Exception ("Le commentaire n'a pas été trouvé");
                    }
                }
                elseif ($_GET['action'] === 'editComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['comment'])) {
                            $this->commentCtrl->editComment($_GET['id'], $_POST['comment']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
        
                elseif ($_GET['action'] === 'logIn') {
                    // $this->connectionCtrl->logIn();
                }
            }
            else {
                $this->postCtrl->listPosts();
            }
        }
        
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function error($msgError) {
        $view = new View('Error');
        $view->generate(array('msgError' => $msgError));
    }

    private function getParameter($array, $name) {
        if (isset($array[$name])) {
            return $array[$name];
        }
        else
            throw new Exception("Paramètre '$name' absent");
    }
        
}