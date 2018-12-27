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

    public function createPost() {
        if ($this->request->existParameter('title') && $this->request->existParameter('content')) {
            $title = $this->request->getParameter('title');
            $content = $this->request->getParameter('content');

            $this->postManager->createPost($title, $content);

            header('Location: index.php');
        } else {
            $view = new View('CreatePost');
            $view->generate(array());
        }
    }

    public function editPost() {
        $postId = $this->request->getParameter('id');

        if ($this->request->existParameter('title') && $this->request->existParameter('content')) {
            $title = $this->request->getParameter('title');
            $content = $this->request->getParameter('content');

            $this->postManager->updatePost($postId, $title, $content);

            header('Location: index.php');
        } else {
            $post = $this->postManager->getPost($postId);

            $view = new View('EditPost');
            $view->generate(array('id' => $post['id'], 'title' => $post['title'], 'content' => $post['content']));
        }
    }

    public function deletePost() {
        $id = $this->request->getParameter('id');
        $delete = $this->postManager->deletePost($id);
        header('Location : index.php');
    }

}

