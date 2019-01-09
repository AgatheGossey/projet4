<?php

class User
{
    private $id, $username, $pass, $email, $registrationDate, $groups ;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
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
     * @return String
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param String $username
     */
    public function setUsername($username)
    {
        $this->username = htmlspecialchars($username);
    }

    /**
     * @return String
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param String $pass
     */
    public function setPass($pass)
    {
        if (strlen($pass) < 6)
        {
            $_SESSION['errors']['passError'] = "Le mot de passe doit comporter au minimum 6 caractères.";
        }

        $this->pass = htmlspecialchars($pass);
    }

    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail($email)
    {
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
        {
            $_SESSION['errors']['mailError'] = "L'adresse email n'est pas valide, recommencez !";
        }

        $this->email = htmlspecialchars($email);
    }

    /**
     * @return String
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * @param String $registrationDate
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registration = htmlspecialchars($registrationDate);
    }

    /**
     * @return String
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param String $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }
    
}