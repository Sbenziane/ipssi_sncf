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
                    <legend>Partenaire : </legend>
                    <center>Nom :</br>
                      <input type="text" name="nom" />
                  </br>Adresse :</br>
                      <input type="text" name="adresse" />
                  </br></br>N° téléphone :</br>
                      <input type="tel" name="contact" />
                  </br></br>
                  <input type="submit" name="submit" value="S'inscrire"/>
                  </center>
                </fieldset>
            </form>
        </body>
    </html>
<?php
if (isset($_POST['submit']))
{
include_once('db.php');
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$contact = $_POST['contact'];

$insertion = $db->prepare("INSERT INTO partenaires (nom, adresse, numero_contact) VALUES (:nom, :adresse, :numeroContact)");
$insertion->bindParam(':nom', $nom);
$insertion->bindParam(':adresse', $adresse);
$insertion->bindParam(':numeroContact', $contact);
$insertion->execute();
}
 ?>
