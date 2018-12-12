<?php

function getComments($bdd, $idArticle) 
{
    $req = $bdd->prepare('SELECT pseudo, message, date FROM comments INNER JOIN articles ON comments.article_id = articles.id WHERE articles.id = :id');
    $response = $req->execute(array('id' => $idArticle));
    return $response;
}

