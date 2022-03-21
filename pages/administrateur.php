<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>CONNEXION - ADMINISTRATEUR</title>
</head>
<body>
  
<div class="container-fluid card-admin">
  <form action="" method="post">
    <div class="text-center mt-5">
      <h4>Connexion Admin</h4>
    </div>
    <div class="container background-admin rounded text-center">
      <img class="img-admin mt-1 rounded-circle" src="../modules/img/admin.png" alt="">
      <div>
        <label class="form-label text-bold pt-2" for="email-admin">Adresse-email</label>
        <input class="form-control" type="email" name="email-admin" id="email-admin" placeholder="exemple@admin.etu">
      </div>
      <div class="mt-3">
        <label class="form-label text-bold" for="password-admin">Mots de passe</label>
        <input class="form-control" type="password" name="password-admin" id="password-admin" placeholder="Votre mots de passe">
      </div>
      <br>
      <a class="none-link" href="">MDP oubliez ?</a>
      <br>
      <a href="../index.php" class="btn btn-danger mt-2 mb-3">RETOUR</a>
      <button class="btn btn-success mt-2 mb-3" type="submit" name="btn-admin-connexion">CONNEXION</button>
    </div>
  </form>
</div>

<?php

function connexion_admin(){

  $utlisateur_phpadmin = "root";
  $mdp_phpadmin = "";
  $dbname = "ecommerce";
  $hote = "localhost";

  try {
    $db = new PDO("mysql:host=".$hote.";dbname=".$dbname.";charset=UTF8", $utlisateur_phpadmin, $mdp_phpadmin);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $exception){
    echo "Erreur de connexion a PDO MySQL " . $exception->getMessage();
    die();
  }

  if(isset($_POST['email-admin']) && !empty($_POST['email-admin']) && isset($_POST['password-admin']) && !empty($_POST['password-admin'])){
    $emailUtilisateur = trim(htmlspecialchars($_POST['email-admin']));
    $passwordUtilisateur = trim(htmlspecialchars($_POST['password-admin']));

    $sql = "SELECT * FROM utilisateurs_admin WHERE email = ? AND pass = ?";
    $connexion = $db->prepare($sql);
    $connexion->bindParam(1, $emailUtilisateur);
    $connexion->bindParam(2, $passwordUtilisateur);

    $connexion->execute();

    if($connexion->rowCount() >= 0){
      $ligne = $connexion->fetch();

      if($ligne){
        $email = $ligne['email'];
        $password = $ligne['pass'];

        if($emailUtilisateur === $email && $passwordUtilisateur === $password){
          $_SESSION['email'] = $emailUtilisateur;
          header("Location: connecter.php");
        }else{
          echo "<div class='mt-3 container'>
          <p class='alert alert-danger'>Erreur de connextion : Merci de vérifier vos identifiant !</p>
          </div>";
        }
      }else{
        echo "<div class='mt-3 container'>
        <p class='alert alert-danger p-3'>Erreur de connexion : Aucun utilisateur reconnue !</p>
        </div>";
      }
    }else{
      echo "<div class='mt-3 container'>
      <p class='alert alert-danger p-3'>Erreur de connexion : Base de donnée vide !</p>
      </div>";
    }
  }else{
    echo "<div class='mt-3 container'>
    <p class='alert alert-danger p-3'>Erreur de connexion : Merci de remplir les champs !</p>
    </div>";
  }

  //var_dump($emailUtilisateur);
  //var_dump($passwordUtilisateur);

}

if(isset($_POST['btn-admin-connexion'])){
  connexion_admin();
}

?>
</body>
</html>