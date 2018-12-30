<?php $this->title = "Gérer les articles"; ?>

<a href="index.php?controller=post&action=createPost">Créer un nouvel article</a> 

<?php
foreach ($posts as $post)
{
?>
            <h1> <?= $post->getTitle(); ?> </h1>
            <p><?= $post->getContent(); ?>
            <br/>
            
            <a href= "index.php?controller=post&amp;action=postAdmin&id=<?php echo $post->getId() ?>">Modérer l'article</a>
<?php
} 

?>

