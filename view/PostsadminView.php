<?php $this->title = "Gérer les articles"; ?>

<a href="index.php?controller=post&action=createPost">Créer un nouvel article</a> 

<?php
foreach ($posts as $data)
{
?>
            <h1> <?= htmlspecialchars($data['title']); ?> </h1>
            <p><?= nl2br(htmlspecialchars($data['content']));?>
            <br/>
            
            <a href= "index.php?controller=post&amp;action=postAdmin&id=<?php echo $data['id'] ?>">Modérer l'article</a>
<?php
} 

?>

