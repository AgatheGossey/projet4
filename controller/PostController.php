<?php

require_once('Framework/Controller.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/View.php');

class PostController extends Controller {

    private $postManager;
    private $commentManager;

    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function index() {
        $posts = $this->postManager->getPosts();
        $view = new View('Home');
        $view->generate(array('posts' => $posts));
    }

    public function post() {
        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);

        $view = new View('Post');
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
}


