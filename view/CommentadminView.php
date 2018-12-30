<?php $this->title = "Modérer les commentaires"; ?>


<p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">
    <h3><?= $post->getTitle() ?></h3>
    <p><?= $post->getContent() ?></p>
</div>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= $comment->getAuthor() ?></p>
    <p><?= $comment->getComment() ?> 
        (<a href= "index.php?controller=Comment&action=deleteComment&amp;id=<?= $comment->getId() ?>">supprimer</a>) </p>
    </p>
    
<?php
}

?>


