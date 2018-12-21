<?php
require_once("Framework/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $posts = $this->executeARequest('SELECT id, title, content FROM articles');
    
        return $posts;
    }

    public function getPost($postId)
    {
        $post = $this->executeARequest('SELECT id, title, content FROM articles WHERE id = ?', array($postId));
    
        if ($post->rowCount() == 1)
            return $post->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$postId'");
    }
}