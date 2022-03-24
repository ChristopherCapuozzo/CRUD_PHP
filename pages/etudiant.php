<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>CONNEXION - ÉTUDIANT</title>
</head>
<body>
  
<div class="container-fluid card-etudiant">
  <form action="" method="post">
    <div class="text-center mt-5">
      <h4>Connexion Étudiant</h4>
    </div>
    <div class="container background-etudiant rounded text-center">
      <img class="img-etudiant mt-1 rounded-circle" src="../modules/img/etudiant.png" alt="">
      <div>
        <label class="form-label text-bold pt-2" for="email-etudiant">Adresse-email</label>
        <input class="form-control" type="email" name="email-etudiant" id="email-etudiant" placeholder="exemple@etudiant.etu">
      </div>
      <div class="mt-3">
        <label class="form-label text-bold" for="password-etudiant">Mots de passe</label>
        <input class="form-control" type="password" name="password-etudiant" id="password-etudiant" placeholder="Votre mots de passe">
      </div>
      <br>
      <a class="none-link" href="">MDP oubliez ?</a>
      <br>
      <a href="../index.php" class="btn btn-danger mt-2 mb-3">RETOUR</a>
      <button class="btn btn-success mt-2 mb-3" type="submit" name="btn-etudiant-connexion">CONNEXION</button>
    </div>
  </form>
</div>

<?php

function connexion_etudiant(){

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

  if(isset($_POST['email-etudiant']) && !empty($_POST['email-etudiant']) && isset($_POST['password-etudiant']) && !empty($_POST['password-etudiant'])){
    $emailUtilisateur = trim(htmlspecialchars($_POST['email-etudiant']));
    $passwordUtilisateur = trim(htmlspecialchars($_POST['password-etudiant']));

    $sql = "SELECT * FROM utilisateurs_etudiant WHERE email = ? AND pass = ?";
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

if(isset($_POST['btn-etudiant-connexion'])){
  connexion_etudiant();
}

?>

</body>
</html>