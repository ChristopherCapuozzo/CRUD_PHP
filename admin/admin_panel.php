<?php
session_start();
if(isset($_SESSION['email-admin'])){
  
}else{
    header("Location: ../index.php");
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>ADMIN</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link disabled">Bienvenue <?= $_SESSION['email-admin']?></a>
            <a class="nav-link" href="liste_etudiant.php">Liste Étudiant</a>
            <a class="nav-link" href="pages/etudiant.php">Liste Formateur</a>
          </div>
        </div>
      </div>
    </nav>
    <form method="post">
      <button class="btn btn-danger" id="btn-unlog" name="btn-unlog">Déconnexion</button>
    </form>
<?php

    function un_log(){
      session_unset();
      session_destroy();
      header("Location: ../index.php");
    }


    if(isset($_POST['btn-unlog'])){
      un_log();
    }

?>
</body>
</html>