
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style.css" />
        <title>Économie circulaire et valorisation des produits de dépose</title>
    </head>
    <body>
        <div class="head">
            <a href="search.php">Recherche</a>
            <a href="partenaire.php">Nouveaux partenaire</a>
            <a href="idee.php">Nouvelle solution</a>
        </div>
            <form method="post" action="">
                <fieldset>
                    <legend>Soumettre votre idée</legend>
                    <center>Nom :</br>
                      <input type="text" name="libelle" /></p>
                  </br>Description :</br>
                      <textarea name="description" id="description" rows="10" cols="50" >
                    </textarea>
                  </br></br>
                  <input type="submit" name="submit" value="Proposer son idée"/>
                  </center>
                </fieldset>
            </form>
        </body>
    </html>
<?php
session_start();
if (isset($_POST['submit']))
{
include_once('db.php');
$libelle = $_POST['libelle'];
$description = $_POST['description'];
$getId = $db->prepare("SELECT id FROM utilisateurs WHERE login= :login");
$getId->bindParam(":login", $_SESSION['login']);
$getId->setFetchMode(PDO::FETCH_NUM);
$getId->execute();
$resultatID = $getId->fetch();

$insertion = $db->prepare("INSERT INTO idees (libelle, description, status, idUtilisateur) VALUES (:libelle, :description, 'En attente de validation', :idUtilisateur)");
$insertion->bindParam(':libelle', $libelle);
$insertion->bindParam(':description', $description);
$insertion->bindParam(':idUtilisateur', $resultatID[0]);
$insertion->execute();
}
 ?>
