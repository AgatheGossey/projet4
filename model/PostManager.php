<?php
require_once("Framework/Manager.php");
require_once("model/entities/Post.php");

class PostManager extends Manager
{
    public function getPosts($start = 0, $articlesPerPage = 2)
    {
        $results = $this->executeARequest('SELECT id, title, content FROM articles ORDER BY id DESC LIMIT ' .$articlesPerPage. ' OFFSET ' .$start);

        $posts = [];

        foreach ($results as $element)
        {
            $post = new Post($element);
            $posts[] = $post;
        }
        
        return $posts;
    }

    public function totalPosts()
    {
        $request = $this->executeARequest('SELECT COUNT(*) FROM articles');
        $result = $request->fetch();

        return $result[0];
    }

    public function getPost($postId)
    {
        $request = $this->executeARequest('SELECT id, title, content FROM articles WHERE id = ?', array($postId));
        $result = $request->fetch();

        if ($result)
        {
            $post = new Post($result);
            
            return $post;
        }
        else
        {
            throw new Exception("Aucun billet ne correspond à l'identifiant '$postId'");
        }
    }

    public function createPost($title, $content)
    {
        $post = $this->executeARequest('INSERT INTO articles(title, content) VALUES(?, ?)', array($title, $content));
        
        return $post;
    }

    public function editPost($id, $title, $content)
    {
        $newPost = $this->executeARequest('UPDATE articles SET title = ?, content = ? WHERE id = ?', array($title, $content, $id));
        
        return $newPost;
    }

    public function deletePost($id) 
    {
        $this->executeARequest('DELETE FROM articles WHERE id = ?', array($id));
    }

}