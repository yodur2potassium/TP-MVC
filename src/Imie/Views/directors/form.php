<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
  </head>
  <body>
    <h3></h3>
    <form class="" action="index.php?ctrl=director&act=<?= $action ?>" method="post">
      <fieldset><legend>Ajout/Modif de Réal:</legend>
      <input type="text" name="name" value="<?= $director->getName() ?>" placeholder="Nom Prénom">
      <input type="submit" value="Valider">

      </fieldset>
    </form>
  </body>
</html>
