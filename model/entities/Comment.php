<?php

class Comment {
    private $id, $postId, $author, $comment, $commentDate, $report;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {  
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /**
     * @return Number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Number
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param Number $postId
     */
    public function setPost_id($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return String
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param String $author
     */
    public function setAuthor($author)
    {
        $this->author = htmlspecialchars($author);
    }

    /**
     * @return String
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param String $comment
     */
    public function setComment($comment)
    {
        $this->comment = htmlspecialchars($comment);
    }

    /**
     * @return String
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param String $commentDate
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    /**
     * @return Number
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param Number $report
     */
    public function setReport($report)
    {
        $this->report = $report;
    }
}