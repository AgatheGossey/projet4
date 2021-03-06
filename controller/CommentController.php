<?php

require_once('Framework/Controller.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('Framework/View.php');

class CommentController extends Controller 
{

    private $postManager;
    private $commentManager;
    private $userManager;
    

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function addComment()
    {
        $postId = $this->request->getParameter('id');
        $author = $_SESSION['username'];
        $comment = $this->request->getParameter('comment');

        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) 
        {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else
        {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function commentAdmin()
    {
        if(isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username']))
        {
            $comments = $this->commentManager->getCommentsByReport();
            $view = new View('CommentAdmin');
            $view->generate(array('comments' => $comments));
        }
        else 
        {
            header('Location: index.php');
        }   
    }

    // Default function 
    public function index()
    {
        $commentId = $this->request->getParameter('id');
        $comment = $this->commentManager->getComment($commentId);
        $postId = $comment->getPostId();

        if (isset($_SESSION['connected']) && $_SESSION['connected'] && $_SESSION['username'] === $comment->getAuthor())
        {
            if ($this->request->existParameter('comment')) 
            {
                $newComment = $this->commentManager->updateComment($commentId, $this->request->getParameter('comment'));
                header('Location: index.php?action=post&id=' . $postId);      
            } 
            else
            {
                $comment = $this->commentManager->getComment($commentId);
                $view = new View('EditComment');
                $view->generate(array('comment' => $comment));
            }    
        }
        else 
        {
            throw new Exception('Impossible de modifier ce commentaire');
        }
    }

    public function deleteComment() 
    {
        $commentId = $this->request->getParameter('id');
        $comment = $this->commentManager->getComment($commentId);
        
        if (isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username']) && $this->request->existParameter("fromAdminPanel"))
        {
            $this->commentManager->deleteComment($commentId);
            header('Location: index.php?controller=Comment&action=commentAdmin');      
        }
        else if (isset($_SESSION['connected']) && $_SESSION['connected'] && $_SESSION['username'] === $comment->getAuthor()
                OR isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username']))
        {           
            $postId = $comment->getPostId();
            $this->commentManager->deleteComment($commentId);  
            header('Location: index.php?action=post&id=' . $postId);      
        } 
        else
        {
            throw new Exception('Impossible de supprimer ce commentaire');
        }
    }

    public function reportComment()
    {
        $commentId = $this->request->getParameter('id');
        $comment = $this->commentManager->getComment($commentId);

        $postId = $comment->getPostId();


        if (isset($_SESSION['connected']) && $_SESSION['connected'])
        {
            $this->commentManager->reportComment($commentId);
            header('Location: index.php?action=post&id=' . $postId);
        }
        else 
        {
            throw new Exception('Impossible de signaler ce commentaire');
        }
    }

    public function approveComment()
    {
        $commentId = $this->request->getParameter('id');

        if (isset($_SESSION['connected']) && $_SESSION['connected'])
        {
            $this->commentManager->approveComment($commentId);
            header('Location: index.php?controller=Comment&action=commentAdmin');
        }
        else 
        {
            throw new Exception('Impossible d\'approuver ce commentaire');
        }
    }

}