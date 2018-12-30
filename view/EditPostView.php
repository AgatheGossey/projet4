<?php $this->title = 'Modifier un article'; ?>

<h3>Modifier l'article :</h3>
 
 <form action="index.php?controller=post&action=editPost&amp;id=<?= $id ?>" method="post">

     <div>
        <label for="title">Titre :</label>
        <input type="text" name="title" value="<?= $title ?>"></input>

        <label for="content">Article</label>
        <textarea name="content" cold="50" rows="30" id="content"><?= $content ?></textarea>

     </div>

     <div>
        <input type="submit" value="Publier"/>
     </div>

 </form>
  
  
