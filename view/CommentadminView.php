<?php $this->title = "Modérer les commentaires"; ?>


<p><a href="">Retour à la liste des billets</a></p>
<div class="news">
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> 
        (<a href= "index.php?controller=Comment&action=deleteComment&amp;id=<?= $comment['id'] ?>">supprimer</a>) </p>
    </p>


    
<?php
}

?>


