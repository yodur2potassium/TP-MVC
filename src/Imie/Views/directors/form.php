<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
  </head>
  <body>
    <?php var_dump($director,$action) ?>
    <h3></h3>
    <form class="" action="index.php?ctrl=director&act=<?= $action ?>" method="post">
      <fieldset><legend>Ajout/Modif de Réal:</legend>
      <input type="text" name="name" value="<?= $director->getName() ?>" placeholder="Nom Prénom">
      <input type="hidden" name="id" value="<?= $director->getId() ?>">
      <input type="submit" value="Valider">


      </fieldset>
      <a href="index.php?ctrl=director&act=index">Retour à la liste.</a>
    </form>
  </body>
</html>
