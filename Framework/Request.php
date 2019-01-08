<?php

class Request
{

    private $parameter;

    public function __construct($parameter) 
    {
        $this->parameter = $parameter;
    }

    public function existParameter($name)
    {
        return (isset($this->parameter[$name]) && $this->parameter[$name] !== "");
    }

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
