<?php

require_once('Framework/Controller.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('view/View.php');

class CommentController extends Controller {

    private $commentManager;
    private $userManager;
    

    public function __construct() {
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function addComment() {
        $postId = $this->request->getParameter('id');
        $author = $this->request->getParameter('author');
        $comment = $this->request->getParameter('comment');

        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function index() {
        $commentId = $this->request->getParameter('id');
        $comment = $this->commentManager->getComment($commentId);
        $view = new View('EditComment');
        $view->generate(array('comment' => $comment));
    }

    public function editComment() {
        $commentId = $this->request->getParameter('id');
        $comment = $this->request->getParameter('comment');
        $newComment = $this->commentManager->updateComment($commentId, $comment);
        header('Location: index.php?');
    }

    public function deleteComment() {
        $commentId = $this->request->getParameter('id');
        $comment = $this->commentManager->getComment($commentId);

        if (isset($_SESSION['connected']) && $_SESSION['connected'] == true && $_SESSION['username'] === $comment['author'] 
            OR isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username'])) {
                $view = new View('Post');
                $view->generate(array('deleteComment' => 'coucou mon tcc !'));        
                $id = $this->request->getParameter('id');
                $delete = $this->commentManager->deleteComment($id);
                header('Location: index.php?');
                    } else {
                        throw new Exception('Impossible de supprimer ce commentaire');
                    }

   

    }

}