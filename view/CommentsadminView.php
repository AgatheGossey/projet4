<?php $this->title = "Modérer les commentaires"; ?>

<?php
foreach ($posts as $data)
{
?>
            <h1> <?= htmlspecialchars($data['title']); ?> </h1>
            <p><?= nl2br(htmlspecialchars($data['content']));?>
            <br/>
            <em><a href="index.php?controller=comment&amp;action=commentAdmin&id=<?php echo $data['id'] ?>">Commentaires</a></em>;</p>

<?php
} 

?>
