<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style.css" />
        <title>Économie circulaire et valorisation des produits de dépose</title>
        <style>
        div.login{
            border: 3px solid rgb(171, 220, 24);;
            width: 80%;
            margin-left: 6%;
            height: 800px;
            margin-top: 20px;
            /* display: inline-block; */
            background-color:#FFF;
        }
        div.login form{
          margin-top: 250px;
        }
        div.login input{
          width: 50%;
        }
        </style>
    </head>
    <body>
        <div class="corp">
            <div class="blockAffiche">
              <div class="login">
                <form method="POST" action="">
                <center>
                </br>Login:</br>
                  <input type="text" name="login" value="" />
                </br></br>Mot de passe:</br>
                <input type="text" name="password" value="" />
              </br></br>
              <input type="submit" name="submit" value="Se connecter"/>
            </br></br><a href="inscription.php">S'inscrire</a>
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
  include_once('db.php');
  $login = $_POST['login'];
  $mdp = $_POST['password'];
  $requete = $db->prepare("SELECT COUNT(id) FROM utilisateurs WHERE login = :login AND password = :mdp");
  $requete->bindParam(':login', $login);
  $requete->bindParam(':mdp', $mdp);
  $requete->setFetchMode(PDO::FETCH_NUM);
  $requete->execute();
  $resultat = $requete->fetch();
  if ($resultat[0] == 1)
  {
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $mdp;
    header('Location: search.php');
  }else{
    echo "Identifiant invalide";
	   }
  }

 ?>
