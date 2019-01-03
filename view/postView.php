<?php $this->title = 'Les commentaires'; ?>


<p><a href="index.php?action=posts">Retour à la liste des billets</a></p>
<div class="news">
    <h3><?= $post->getTitle() ?></h3>
    <p><?= $post->getContent() ?></p>
</div>


<?php 
    if(isset($_SESSION['connected']) && $_SESSION['connected']) {
?>
<h2>Commentaire :</h2>

<form action="index.php?controller=Comment&action=addComment&amp;id=<?= $post->getId() ?>" method="POST">
    <div>

        <p><?= $_SESSION['username']?></p>
    </div>
    <div>
        <label for="comment">Commentaire</label><br/>
        <textarea id="comment" name="comment" required></textarea>
    </div>
    <div>
        <input type="submit"/>
    </div>
</form>
<?php } ?>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= $comment->getAuthor() ?></p>
    <p><?= nl2br($comment->getComment()) ?></p>

<?php 
    if(isset($_SESSION['connected']) && $_SESSION['connected']) 
    { ?>
        (<a href= "index.php?controller=Comment&amp;action=reportComment&amp;id=<?= $comment->getId() ?>">signaler</a>) 
    <?php } 

    if(isset($_SESSION['username']) && $_SESSION['username'] === $comment->getAuthor()) 
    { ?>
        (<a href= "index.php?controller=Comment&amp;id=<?= $comment->getId() ?>">modifier</a>) 
        (<a href= "index.php?controller=Comment&amp;action=deleteComment&amp;id=<?= $comment->getId() ?>">supprimer</a>) </p>
<?php } ?>
  
<?php
    if (isset($deleteComment))
    { ?>
        <p><?= $deleteComment ?></p>
<?php } 


}

?>


