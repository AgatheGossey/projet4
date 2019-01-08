<?php $this->title = 'Modifier un article'; ?>

<h3>Modifier l'article :</h3>
 
 <form id="formAdminPostView" action="index.php?controller=post&action=editPost&amp;id=<?= $id ?>" method="post">

     <p class ="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" name="title" value="<?= $title ?>"></input>
    </p>

    <p class ="form-group">
        <label for="content">Article</label>
        <textarea class="post" name="content" cold="50" rows="30" id="content"><?= $content ?></textarea>
    </p>
    
    <p>
        <button id="submitPost" type="submit button" class="btn btn-success">Editer</button>
    </p>

 </form>
  

