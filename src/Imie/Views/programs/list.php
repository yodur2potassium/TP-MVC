<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Programmes</title>
  </head>
  <body>
    <!-- <?php include "header.php"; ?> -->
    <main>
      <h1>Liste des Programmes</h1>
      <a href="index.php?ctrl=director&act=form">Insérer un progamme</a>
      <table>
        <tr>
          <th>Id</th>
          <th>Nom Programme</th>
          <th>Durée</th>
          <th>Type</th>
          <th>Réal ID</th>
        </tr>

        <?php foreach ($programs as $program): ?>
          <tr>
            <td><?= $program->getId() ?></td>
            <td><?= $program->getName() ?></td>
            <td><?= $program->getLength() ?></td>
            <td><?= $program->getType() ?></td>
            <td><?= $program->getDirectorId() ?></td>
            <td>
              <a href="index.php?ctrl=program&act=details&id=<?= $program->getId() ?>">Détails</a>
              <a href="index.php?ctrl=program&act=delete&id=<?= $program->getId() ?>">X</a>
              <a href="index.php?ctrl=program&act=clone&id=<?= $program->getId() ?>">Cloner</a>
              <a href="index.php?ctrl=program&act=modForm&id=<?= $program->getId() ?>">Modifier</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <a href="index.php?ctrl=director&act=deleteAll"><button type="button" name="button">Supprimer tout</button></a>
    </main>
  </body>
</html>
