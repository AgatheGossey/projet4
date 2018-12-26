<?php
require_once("Framework/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $comments = $this->executeARequest('SELECT id, author, comment FROM comments WHERE post_id = ? ORDER BY ID DESC LIMIT 0, 10', array($postId));    
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $comments = $this->executeARequest('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())', array($postId, $author, $comment));
   
        return $comments;
    }

    public function getComment($id)
    {
        $req = $this->executeARequest('SELECT id, author, comment FROM comments WHERE id = ?', array($id));
        $comment = $req->fetch();

        return $comment;
    }

    public function updateComment($id, $comment)
    {
        $newComment = $this->executeARequest('UPDATE comments SET comment = ? WHERE id = ?', array($comment, $id));
        
        return $newComment;
    }
}

