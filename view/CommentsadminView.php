<?php $this->title = "Modérer les commentaires"; ?>

<?php
foreach ($comments as $comment)
{
?>
    <p><?= $comment->getPostId() ?></p>
    <p><?= $comment->getAuthor() ?></p>
    <p><?= nl2br($comment->getComment()) ?></p>
    <p>Nombre de signalement : </p>
    (<a href= "index.php?controller=Comment&action=deleteComment&amp;id=<?= $comment->getId() ?>">supprimer</a>) </p>

<?php
} 

?>
