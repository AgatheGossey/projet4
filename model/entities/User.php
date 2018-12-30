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