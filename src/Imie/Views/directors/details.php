<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Détails Réal</title>
  </head>
  <body>
    <?php include "header.php"; ?>

    <h2>Détails:</h2>
    Nom du réalisateur: <?= $director->getName() ?></br>
    Id: <?= $director->getId() ?></br>

    <a href="index.php?ctrl=director&act=delete&id=<?= $director->getId() ?>">Supprimer ce Réal.</a>
    <a href="index.php?ctrl=director&act=index">Retour à la liste des Réal.</a>
  </body>
</html>
