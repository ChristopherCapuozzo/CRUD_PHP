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
      <h4>Inscription Étudiant</h4>
    </div>
    <div class="container background-etudiant rounded text-center">
      <img class="img-etudiant mt-1 rounded-circle" src="../modules/img/etudiant.png" alt="">
      <div>
        <label class="form-label text-bold pt-2" for="email-create">Adresse-email</label>
        <input class="form-control" type="email" name="email-create" id="email-create" placeholder="exemple@etudiant.etu">
      </div>
      <div class="mt-3">
        <label class="form-label text-bold" for="password-create">Mots de passe</label>
        <input class="form-control" type="password" name="password-create" id="password-create" placeholder="Votre mots de passe">
      </div>
      <div class="mt-1">
        <input class="form-control" type="password" name="password-confirm" id="password-confirm" placeholder="Répeter votre mots de passe">
      </div>
      <a class="none-link" href="">MDP oubliez ?</a>
      <br>
      <a href="../index.php" class="btn btn-danger mt-2 mb-3">RETOUR</a>
      <button class="btn btn-success mt-2 mb-3" type="submit" name="btn-etudiant-create">INSCRIPTION</button>
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

if(isset($_POST['email-create']) && !empty($_POST['email-create']) && isset($_POST['password-create']) && !empty($_POST['password-create'])){
    $emailEtudiant = trim(htmlspecialchars($_POST['email-create']));
    $passwordEtudiant = trim(htmlspecialchars($_POST['password-create']));
    $passwordEtudiant_Confirm = trim(htmlspecialchars($_POST['password-confirm']));

    if($passwordEtudiant === $passwordEtudiant_Confirm){
        $sql ="INSERT INTO `utilisateurs_etudiant`(`email`, `pass`) VALUES (?,?)";
        $insertUser = $db->prepare($sql);
        $insertUser->bindParam(1, $emailEtudiant);
        $insertUser->bindParam(2, $passEtudiant);

        $insertUser->execute(array(
            $emailEtudiant,
            $passwordEtudiant
        ));

        if($insertUser == true){
            echo "<div class='container text-center'>
            <p class='alert alert-success mt-1'>Inscription réussi !</p>
            <a class='btn btn-success' href='../menu/etudiant_menu.php'>Se connecter</a>
            </div>";
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