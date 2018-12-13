<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Billet pour l'Alaska</h1>
    <p>Derniers articles du blog :</p>
            
<?php
while ($data = $posts->fetch())
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
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>