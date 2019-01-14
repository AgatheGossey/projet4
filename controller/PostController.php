<?php

require_once('Framework/Controller.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('Framework/View.php');

class PostController extends Controller
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

    public function index()
    {
        $posts = $this->postManager->getPosts();
        $view = new View('Home');
        $view->generate(array('posts' => $posts));
    }

    public function posts()
    {
        // PAGINATION
        $articlesPerPage = 3;
        $totalPosts = $this->postManager->totalPosts();
        $pagesTotales = ceil($totalPosts/$articlesPerPage); // Round to the next number
        $currentPage = 1;

        if ($this->request->existParameter('page') && $this->request->getParameter('page') > 0)
        {
            $currentPage = intval($this->request->getParameter('page')); // Get the integer value 
        }

        $start = ($currentPage-1)*$articlesPerPage;

        // GET POSTS
        $posts = $this->postManager->getPosts($start, $articlesPerPage);

        // GENERATE VIEW
        $view = new View('Posts');
        $view->generate(array('posts' => $posts, 'pageTotales' => $pagesTotales, 'currentPage' => $currentPage));
    }

    public function post() 
    {
        $postId = $this->request->getParameter('id');
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsByPost($postId);

        $view = new View('Post');
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
    
    public function postsAdmin()
    {
        if(isset($_SESSION['username']) && $this->userManager->adminConnection($_SESSION['username']))
        {
            // Data needed for pagination
            $articlesPerPage = 2;
            $totalPosts = $this->postManager->totalPosts();
            $pagesTotales = ceil($totalPosts/$articlesPerPage);
            $currentPage = 1;
    
            if ($this->request->existParameter('page') && $this->request->getParameter('page') > 0) 
            {
                $currentPage = intval($this->request->getParameter('page'));
            }
    
            $start = ($currentPage-1)*$articlesPerPage;
    
            $posts = $this->postManager->getPosts($start, $articlesPerPage);
            
            $view = new view('Postsadmin');
            $view->generate(array('posts' => $posts, 'pageTotales' => $pagesTotales, 'currentPage' => $currentPage));
        }
        else 
        {
            header('Location: index.php'); 
        }
    }

    public function createPost() 
    {
        if ($this->request->existParameter('title') && $this->request->existParameter('content'))
        {
            $title = $this->request->getParameter('title');
            $content = $this->request->getParameter('content');
            $this->postManager->createPost($title, $content);
            header('Location: index.php?controller=post&action=postsAdmin');
        } 
        else
        {
            $view = new View('CreatePostAdmin');
            $view->generate(array());
        }
    }

    public function editPost() {
        $postId = $this->request->getParameter('id');

        if ($this->request->existParameter('title') && $this->request->existParameter('content'))
        {
            $title = $this->request->getParameter('title');
            $content = $this->request->getParameter('content');
            $this->postManager->editPost($postId, $title, $content);
            header('Location: index.php?controller=post&action=postsAdmin');
        }
        else
        {
            $post = $this->postManager->getPost($postId);
            $view = new View('EditPostAdmin');
            $view->generate(array('id' => $post->getId(), 'title' => $post->getTitle(), 'content' => $post->getContent()));
        }
    }

    public function deletePost()
    {
        $id = $this->request->getParameter('id');
        $delete = $this->postManager->deletePost($id);
        header('Location: index.php?controller=post&action=postsAdmin');
    }

}


