<?php $this->title = 'Chapitres'; ?>

<?php
foreach ($posts as $post)
{
?>
    <h1> <?= $post->getTitle(); ?> </h1>
    <p><?= substr($post->getContent(), 0, 250);?>
    <br/>
    <em><a href="index.php?action=post&id=<?= $post->getId() ?>">Lire le chapitre</a></em></p>
<?php
} 

?>
