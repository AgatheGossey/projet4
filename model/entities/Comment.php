<?php

class Comment 
{

    private $id, $postId, $author, $comment, $commentDate, $report, $approve;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {  
            // We foun the name of the setter corresponding to the attribute.
            $method = 'set'.ucfirst($key);
            // If the setter exist
            if (method_exists($this, $method))
            {
                // We call it 
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

     /**
     * @return String
     */
    public function getApprove()
    {
        return $this->approve;
    }

    /**
     * @param String $approve
     */
    public function setApprove($approve)
    {
        $this->approve = $approve;
    }
    
}