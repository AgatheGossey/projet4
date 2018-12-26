<?php $this->title = 'Mon blog'; ?>

     <section>
      <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5"><img id="img" src="./public/images/img.jpg" alt="Photo de la couverture"/></div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">

<?php
foreach ($posts as $data)
{
?>


          <article id="chapitre1">
            <h1> <?= htmlspecialchars($data['title']); ?> </h1>
            <p><?= nl2br(htmlspecialchars($data['content']));?>
              <br />
              <em><a href="index.php?action=post&id=<?php echo $data['id'] ?>">Commentaires</a></em>;</p>
          </article>

        

   

<?php
} 

?>
