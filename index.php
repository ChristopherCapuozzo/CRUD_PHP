<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="modules/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="modules/css/style.css">
    <link rel="stylesheet" href="modules/js/bootstrap.js">
    <title>ACCUIEL</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="">School-Training</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="pages/etudiant.php">Connexion</a>
          <a class="nav-link" href="pages/formateur.php">Formateur</a>
          <a class="nav-link" href="pages/administrateur.php">Administrateur</a>
        </div>
      </div>
    </div>
  </nav>
  <img class="img-index" src="modules/img/background.png">
</body>
</html>