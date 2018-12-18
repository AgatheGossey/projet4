<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectionManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('./view/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('./view/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function viewComment()
{
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($_GET['id']);

    require('./view/editCommentView.php');
}

function editComment($id, $comment)
{
    $commentManager = new CommentManager();
    $newComment = $commentManager->updateComment($id, $comment);
    header('Location: index.php?');

}

function logProcess()
{
    $connectionManager = new ConnectionManager();
    $username = stripcslashes($_POST['user']);
    $password = stripcslashes($_POST['pass']);

    $connection = $connectionManager->getConnection($username, $password);

    if ($connection['username'] === $username && $connection['password'] === $password) {
        echo "Connexion réussie !";
    } elseif ($connection === false) {
        throw new Exception('Impossible de se connecter.');
    }

}