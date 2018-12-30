<?php
require_once("Framework/Manager.php");
require_once("model/entities/Comment.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $results = $this->executeARequest('SELECT * FROM comments WHERE post_id = ? ORDER BY ID DESC LIMIT 0, 10', array($postId));
        $comments = [];

        foreach ($results as $element){
            $comment = new Comment($element);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $comments = $this->executeARequest('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())', array($postId, $author, $comment));
   
        return $comments;
    }

    public function getComment($id)
    {
        $request = $this->executeARequest('SELECT * FROM comments WHERE id = ?', array($id));
        $result = $request->fetch();

        $comment = new Comment($result);

        return $comment;
    }

    public function updateComment($id, $comment)
    {
        $newComment = $this->executeARequest('UPDATE comments SET comment = ? WHERE id = ?', array($comment, $id));
        
        return $newComment;
    }

    public function deleteComment($id) 
    {
        $delete = $this->executeARequest('DELETE FROM comments WHERE id = ?', array($id));

        return $delete;
    }
}

