<?php
require_once("Framework/Manager.php");
require_once("model/entities/Comment.php");

class CommentManager extends Manager
{
    public function getCommentsByReport()
    {
        $results = $this->executeARequest('SELECT * FROM comments WHERE approved = "false" ORDER BY report DESC', array());
        $comments = [];

        foreach ($results as $element)
        {
            $comment = new Comment($element);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function getCommentsByPost($postId)
    {
        $results = $this->executeARequest('SELECT * FROM comments WHERE post_id = ? ORDER BY ID DESC LIMIT 0, 10', array($postId));
        $comments = [];

        foreach ($results as $element)
        {
            $comment = new Comment($element);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $comments = $this->executeARequest('INSERT INTO comments(post_id, author, comment, comment_date, approved) VALUES (?, ?, ?, NOW(), "false")', array($postId, $author, $comment));
   
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

    public function approveComment($id)
    {
        return $this->executeARequest('UPDATE comments SET approved = "true" WHERE id = ?', array($id));
    }

    public function reportComment($id) 
    {
        $comment = $this->getComment($id);
        $report = $comment->getReport();
        $report++;

        return $this->executeARequest('UPDATE comments SET report = ? WHERE id = ?', array($report, $id));
    }
    
}

