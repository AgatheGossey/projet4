<?php

require_once('Framework/Controller.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/View.php');

class CommentController extends Controller {

    private $commentManager;

    public function __construct() {
        $this->commentManager = new CommentManager();
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
        $comment = $this->commentManager->getComment($_GET['id']);
        $view = new View('EditComment');
        $view->generate(array('comment' => $comment));
    }

    public function editComment() {
        $id = $this->request->getParameter('id');
        $comment = $this->request->getParameter('comment');
        $newComment = $this->commentManager->updateComment($id, $comment);
        header('Location: index.php?');
    }

    public function deleteComment() {
        $id = $this->request->getParameter('id');
        $delete = $this->commentManager->deleteComment($id);
        header('Location: index.php?');
    }

}