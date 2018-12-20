<?php
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT id, title, content FROM articles');
    
        return $req->fetchAll();
    }

    public function getPost($postId)
    {
        $db = $this->getDb();
        $req = $db->prepare('SELECT id, title, content FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
    
        return $post;
    }
}