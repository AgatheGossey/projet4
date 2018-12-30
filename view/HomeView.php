<?php $this->title = 'Bienvenue !'; ?>

<?php
foreach($posts as $key => $post)
if ($key < 2) {

    ?>
    <h1> <?= $post->getTitle(); ?> </h1>
    <p><?= substr($post->getContent(), 0, 250);?>
    <br/>
    <em><a href="index.php?action=post&id=<?= $post->getId() ?>">Continuez la lecture</a></em></p>
<?php
} 

?>










