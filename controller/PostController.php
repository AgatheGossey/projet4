<?php

require_once('Framework/Controller.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('view/View.php');

class PostController extends Controller {

    private $postManager;
    private $commentManager;
    private $userManager;

    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function index() {
        $posts = $this->postManager->getPosts();
        $view = new View('Home');
        $view->generate(array('posts' => $posts));
    }

    public function posts() {
        $articlesPerPage = 3;
        $totalPosts = $this->postManager->totalPosts();
        $pagesTotales = ceil($totalPosts/$articlesPerPage);

        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0)
        {
            $_GET['page'] = intval($_GET['page']);
            $currentPage = $_GET['page'];

        } else {
            $currentPage = 1;
        }

        $start = ($currentPage-1)*$articlesPerPage;

        $posts = $this->postManager->getPosts($start, $articlesPerPage);

        $view = new View('Posts');
        $view->generate(array('posts' => $posts, 'pageTotales' => $pagesTotales));
    }

    public function post() {
        $postId = $this->request->getParameter('id');
        $post = $this->postManager->getPost($postId);

        $comments = $this->commentManager->getComments($postId);

        $view = new View('Post');
        $view->generate(array('post' => $post, 'comments' => $comments));
    }

    public function postsAdmin() {
        if(isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username']))
        {
            $posts = $this->postManager->getPosts();
            $view = new view('Postsadmin');
            $view->generate(array('posts' => $posts));
        }
        else 
        {
            header('Location: index.php?'); 
        }
    }


    public function postAdmin() {
        if(isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username']))
        {
            $postId = $this->request->getParameter('id');
            $post = $this->postManager->getPost($postId);
            $view = new View('Postadmin');
            $view->generate(array('post' => $post));
        }
        else 
        {
            header('Location: index.php?'); 
        }
    }

    public function createPost() {
        if ($this->request->existParameter('title') && $this->request->existParameter('content')) {
            $title = $this->request->getParameter('title');
            $content = $this->request->getParameter('content');
            $this->postManager->createPost($title, $content);
            header('Location: index.php?controller=post&action=postsAdmin');
        } else {
            $view = new View('CreatePostAdmin');
            $view->generate(array());
        }
    }

    public function editPost() {
        $postId = $this->request->getParameter('id');

        if ($this->request->existParameter('title') && $this->request->existParameter('content')) {
            $title = $this->request->getParameter('title');
            $content = $this->request->getParameter('content');
            $this->postManager->editPost($postId, $title, $content);
            header('Location: index.php?controller=post&action=postsAdmin');
        } else {
            $post = $this->postManager->getPost($postId);
            $view = new View('EditPostAdmin');
            $view->generate(array('id' => $post->getId(), 'title' => $post->getTitle(), 'content' => $post->getContent()));
        }
    }

    public function deletePost() {
        $id = $this->request->getParameter('id');
        $delete = $this->postManager->deletePost($id);
        header('Location: index.php?controller=post&action=postsAdmin');
    }

    public function paginateArticles() {
        $articlesByPage = 5;

        if (isset($_GET['page']) AND !empty($_GET['page']))
        {
            $_GET['page'] = intval($_GET['page']);
            $pageCourante = $_GET['page'];

        } else {
            $pageCourante = 1;
        }
        $depart = ($pageCourante-1)*$articlesByPage;
        
    }


}


