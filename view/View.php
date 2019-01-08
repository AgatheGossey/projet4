<?php

require_once('model/UserManager.php');

class View 
{

  private $file;
  private $title;

  public function __construct($action)
  {
    $this->file = './view/' . $action . "View.php";
    $this->userManager = new UserManager();
  }

  public function generate($data)
  {
    if (isset($_SESSION['username']))
    {
      $isAdmin = $this->userManager->adminConnection($_SESSION['username']);
    }
    else
    {
      $isAdmin = false;
    }
    
    $content = $this->generateFile($this->file, $data);
    $view = $this->generateFile('view/template.php',
      array('title' => $this->title, 'content' => $content, 'isAdmin' => $isAdmin)); 
    echo $view;
  }

  private function generateFile($file, $data) 
  {
    if (file_exists($file))
    {
      extract($data);
      ob_start();
      require $file;
      return ob_get_clean();
    }
    else
    {
      throw new Exception("Fichier '$file' introuvable");
    }
  }
}
