<?php $this->title = "Modérer les commentaires"; ?>

<?php
foreach ($posts as $post)
{
?>
    <h1> <?= $post->getTitle() ?> </h1>
    <p><?= nl2br($post->getContent())?>
    <br/>
    <em><a href="index.php?controller=comment&amp;action=commentAdmin&id=<?php echo $post->getId() ?>">Commentaires</a></em>;</p>
<?php
} 

?>
