<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>ADMIN - AJOUT</title>
</head>
<body>
  

<div class="container-fluid card-etudiant" id="false">
  <form method="post">
    <div class="text-center mt-5">
      <h4>Inscription Étudiant</h4>
    </div>
    <div class="container background-etudiant rounded text-center">
      <img class="img-etudiant mt-3 rounded-circle" src="../modules/img/etudiant.png" alt="">
      <div class="d-flex">
        <div class="col">
          <label class="form-label text-bold" for="nom-create">Nom</label>
          <input class="form-control" type="text" name="nom-create" id="nom-create" placeholder="Nom">
        </div>
        <div class="col">
          <label class="form-label text-bold" for="prenom-create">Prénom</label>
          <input class="form-control" type="text" name="prenom-create" id="prenom-create" placeholder="Prénom">
        </div>
      </div>

      <div>
        <label class="form-label text-bold pt-1" for="email-create">Adresse-email</label>
        <input class="form-control" type="email" name="email-create" id="email-create" placeholder="nom.prenom-etudiant@school.etu">
      </div>

      <div class="pt-2">
        <label class="form-label text-bold" for="password-create-etudiant">Mots de passe</label>
        <div class="d-flex">
          <div class="col">
            <input class="form-control" type="password" name="password-create" id="password-create" placeholder="Crée un mdp">
          </div>
          <div class="col">
            <input class="form-control" type="password" name="password-confirm" id="password-confirm" placeholder="Répeter le mdp">
          </div>
        </div>
      </div>
      <div class="d-flex pt-2">
        <div class="col">
          <label for="date_naissance" class="text-bold">Date de naissance</label>
          <input class="form-control" type="date" name="date_naissance" id="date_naissance">
        </div>
        <div class="col">
          <label for="classe" class="text-bold">Classe</label>
          <select class="form-control" type="text" name="classe" id="classe">
            <option>6ème</option>
            <option>5ème</option>
            <option>4ème</option>
            <option>3ème</option>
          </select>
        </div>
      </div>
      <div class="pt-2 pb-2">
        <a href="liste_etudiant.php" class="btn btn-danger mx-1">RETOUR</a>
        <button class="btn btn-success" type="submit" name="btn-etudiant-create">VALIDER</button>
      </div>
    </div>
  </form>
</div>

<?php

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


if(isset($_POST['nom-create']) && !empty($_POST['nom-create']) && isset($_POST['prenom-create']) && !empty($_POST['prenom-create']) && isset($_POST['email-create']) && !empty($_POST['email-create']) && isset($_POST['password-create']) && !empty($_POST['password-create']) && isset($_POST['date_naissance']) && !empty($_POST['date_naissance'])){
    $nom = trim(htmlspecialchars($_POST['nom-create']));
    $prenom = trim(htmlspecialchars($_POST['prenom-create']));
    $emailEtudiant = trim(htmlspecialchars($_POST['email-create']));
    $passwordEtudiant = trim(htmlspecialchars($_POST['password-create']));
    $passwordEtudiant_Confirm = trim(htmlspecialchars($_POST['password-confirm']));
    $date_naissance = $_POST['date_naissance'];
    $classe = $_POST['classe'];

    if($passwordEtudiant === $passwordEtudiant_Confirm){
        $sql ="INSERT INTO `utilisateurs_etudiant`(`nom`, `prenom`, `email`, `pass`, `date_naissance`, `classe`) VALUES (?,?,?,?,?,?)";
        $insertUser = $db->prepare($sql);
        $insertUser->bindParam(1, $nom);
        $insertUser->bindParam(2, $prenom);
        $insertUser->bindParam(3, $emailEtudiant);
        $insertUser->bindParam(4, $passEtudiant);
        $insertUser->bindParam(5, $date_naissance);
        $insertUser->bindParam(6, $classe);

        $insertUser->execute(array(
            $nom,
            $prenom,
            $emailEtudiant,
            $passwordEtudiant,
            $date_naissance,
            $classe
        ));

        if($insertUser == true){
            echo "<div class='container text-center'>
            <p class='alert alert-success mt-5'>Étudiant crée !</p>
            <a class='btn btn-danger' href='liste_etudiant.php'>Retour</a>
            </div>";
            ?>
            <style>
              #false{
                display: none;
              }
            </style>
            <?php
        }else{
            echo "<div class='container mt-2'>
            <p class='alert alert-danger'>Erreur : l'inscription à échoué !</p></div>";
        }
    }else{
        echo "<div class='container mt-2'>
        <p class='alert alert-danger'>Erreur : Les 2 mots de passe ne sont pas identiques</p></div>";
    }
}else{
    echo "<div class='container mt-2'>
    <p class='alert alert-danger'>Erreur : Merci de remplir tout les champs !</p></div>";
}


?>

</body>
</html>