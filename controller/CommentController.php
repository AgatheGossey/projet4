<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/View.php');

class CommentController {

    private $commentManager;

    public function __construct() {
        $this->commentManager = new CommentManager();
    }

    public function addComment($postId, $author, $comment) {
        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function viewComment() {
        $comment = $this->commentManager->getComment($_GET['id']);
        $view = new View('EditComment');
        $view->generate(array('comment' => $comment));
    }

    public function editComment($id, $comment) {
            $newComment = $this->commentManager->updateComment($id, $comment);
            header('Location: index.php?');
    }

}