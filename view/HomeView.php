<?php $this->title = 'Mon blog'; ?>

    <h1>Billet pour l'Alaska</h1>
    <p>Derniers articles du blog :</p>
            
<?php
foreach ($posts as $data)
{
?>
    <div class="news">
        <h3><?= htmlspecialchars($data['title']); ?></h3>
        
        <p><?= nl2br(htmlspecialchars($data['content']));?>
            <br />
            <em><a href="index.php?action=post&id=<?php echo $data['id'] ?>">Commentaires</a></em>;
        </p>
    </div>
<?php
} 

?>
