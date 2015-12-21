<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Réalisateurs</title>
  </head>
  <body>
    <main>
      <h1>Liste des Réalisateurs</h1>
      <a href="index.php?ctrl=director&act=form">Insérer un réalisateur</a>
      <table>
        <tr>
          <th>Nom</th>
          <th>Action</th>
        </tr>

        <?php foreach ($directors as $director): ?>
          <tr>
            <td><?= $director->getName() ?></td>
            <td><?= $director->getId() ?></td>
            <td>
              <a href="index.php?ctrl=director&act=details&id=<?= $director->getId() ?>">Détails</a>
              <a href="index.php?ctrl=director&act=delete&id=<?= $director->getId() ?>">X</a>
              <a href="index.php?ctrl=director&act=clone&id=<?= $director->getId() ?>">Cloner</a>
              <a href="index.php?ctrl=director&act=modForm&id=<?= $director->getId() ?>">Modifier</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <a href="index.php?ctrl=director&act=deleteAll"><button type="button" name="button">Supprimer tout</button></a>
    </main>
  </body>
</html>
