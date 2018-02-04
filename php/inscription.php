<?php include_once('db.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style.css" />
        <title>Économie circulaire et valorisation des produits de dépose</title>
        <style>
        div.registration{
            border: 3px solid rgb(171, 220, 24);;
            width: 80%;
            margin-left: 6%;
            height: 800px;
            margin-top: 20px;
            /* display: inline-block; */
            background-color:#FFF;
        }
        div.registration form{
          margin-top: 250px;
        }
        div.registration input{
          width: 50%;
        }
        </style>
    </head>
    <body>
        <div class="corp">
            <div class="blockAffiche">
              <div class="registration">
                <form method="POST" action="">
                <center>
                </br>Nom:</br>
                  <input type="text" name="nom" value="" />
                </br></br>Prenom:</br>
                <input type="text" name="prenom" value="" />
              </br></br>Mail:</br>
              <input type="email" name="mail" value="" />
            </br></br>Login:</br>
            <input type="text" name="login" value="" />
          </br></br>Mot de passe:</br>
          <input type="text" name="password" value="" />
        </br></br>Partenaire :
        <select name="partenaire">
        <option value="rien">Aucun</option>
          <?php
          $partenaires = $db->prepare("SELECT nom FROM partenaires");
          $partenaires->setFetchMode(PDO::FETCH_NUM);
          $partenaires->execute();
          $partenaires = $partenaires->fetchALL();
          foreach ($partenaires as $partenaire) {
          echo "<option value=$partenaire[0]>$partenaire[0]</option>";
          }
           ?>
        </select></br></br>
              <input type="submit" name="submit" />
            </br></br><a href="login.php">Se connecter</a>
              </center>
            </form>
              </div>
            </div>
        </div>
    </body>

</html>
<?php
if (isset($_POST['submit']))
{
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$login = $_POST['login'];
$password = $_POST['password'];
$partenaireLabel = $_POST['partenaire'];
$Loginarray;
$checkLogin = $db->prepare("SELECT login FROM utilisateurs");
$checkLogin->setFetchMode(PDO::FETCH_NUM);
$checkLogin->execute();
$resultatCheck = $checkLogin->fetchALL();
foreach ($resultatCheck as $resultat) {
$Loginarray[] = $resultat[0];
}
if (!in_array($login,$Loginarray)){
$insertion = $db->prepare("INSERT INTO utilisateurs (nom, prenom, mail, login, password, role) VALUES (:nom, :prenom, :mail, :login, :password, 'utilisateur')");
$insertion->bindParam(':nom', $nom);
$insertion->bindParam(':prenom', $prenom);
$insertion->bindParam(':mail',$mail);
$insertion->bindParam(':login',$login);
$insertion->bindParam(':password',$password);
$insertion->execute();
}else{
  echo "Login déja pris";
     }
if (!in_array($login,$Loginarray) && $partenaireLabel != "rien"){
$partenaire = $db->prepare("SELECT count(id), id FROM partenaires WHERE nom=:partenaire");
$partenaire->bindParam(':partenaire',$partenaireLabel);
$partenaire->setFetchMode(PDO::FETCH_NUM);
$partenaire->execute();
$partenaire = $partenaire->fetch();
if ($partenaire[0] == 1)
  {
    $idUtilisateur = $db->prepare("SELECT id FROM utilisateurs WHERE nom=:nom AND prenom=:prenom AND mail=:mail AND login=:login");
    $idUtilisateur->bindParam(':nom', $nom);
    $idUtilisateur->bindParam(':prenom', $prenom);
    $idUtilisateur->bindParam(':mail',$mail);
    $idUtilisateur->bindParam(':login',$login);
    $idUtilisateur->setFetchMode(PDO::FETCH_NUM);
    $idUtilisateur->execute();
    $idUtilisateur = $idUtilisateur->fetch();
    $insertion = $db->prepare("INSERT INTO utilisateur_partenaire (idUtilisateur, idPartenaire) VALUES (:utilisateur, :partenaire)");
    $insertion->bindParam(':utilisateur', $idUtilisateur[0]);
    $insertion->bindParam(':partenaire', $partenaire[1]);
    $insertion->execute();
  }else{
    echo "Partenaire invalide";
        }
  }
}
?>
