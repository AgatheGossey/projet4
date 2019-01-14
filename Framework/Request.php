<?php

class Request
{

    private $parameter;

    public function __construct($parameter) 
    {
        $this->parameter = $parameter;
    }

    // Return true if the parameter exists in the request
    public function existParameter($name)
    {
        return (isset($this->parameter[$name]) && $this->parameter[$name] !== "");
    }

    // Return the value of the parameter
    public function getParameter($name)
    {
        if ($this->existParameter($name))
        {
            return $this->parameter[$name];
        }
        else
            throw new Exception ("Paramètre '$name' absent de la requête");
    }
    
}