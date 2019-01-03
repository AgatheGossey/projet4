<?php $this->title = "Gérer les articles"; ?>

<a href="index.php?controller=post&action=createPost">Créer un nouvel article</a> 

<?php
foreach ($posts as $post)
{
?>
    <h1> <?= $post->getTitle(); ?> </h1>
    <p><?= $post->getContent(); ?>
    <br/>
    
    <a href= "index.php?controller=Post&amp;action=editPost&amp;id=<?= $post->getId() ?>">Modifier article</a>

    <a href= "index.php?controller=Post&amp;action=deletePost&amp;id=<?= $post->getId() ?>">supprimer l'article</a>

    <em><a href="index.php?controller=Comment&amp;action=commentAdmin&id=<?= $post->getId() ?>">Modérer les commentaires</a></em>;</p>

<?php

} 

?>

