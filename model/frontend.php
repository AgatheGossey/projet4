<?php 
function getPosts ()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content FROM articles');

    return $req;
}

function getPost($postId) 
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content FROM articles WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId) 
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT author, comment FROM comments WHERE post_id = ? ORDER BY ID DESC LIMIT 0, 10 ');
    $comments->execute(array($postId));

    return $comments;
}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // activate errors
    return $db;
}