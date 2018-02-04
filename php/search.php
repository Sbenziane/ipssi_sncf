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
        <div class="corp">
            <div class="headCorp">
                <form method="post" action="traitement.php">
                   <span> Type de matériaux :
                        <select name="type" id="type">
                            <option value="bois">Bois</option>
                            <option value="rail">Rail</option>
                            <option value="ballast">Ballast</option>
                            <option value="beton">Beton</option>
                            <option value="cable">Câble électrique</option>
                        </select>
                    </span>
                    <span>Quantité :
                        <input type="number" name="quantite" />
                    </span>
                    <span id="right">
                        Par
                        <select name="tri" id="tri">
                            <option value="nom">Nom</option>
                            <option value="prix">Prix</option>
                            <option value="quantite">Quantité</option>
                        </select>
                    </span>
                </form>
            </div>
            <div class="blockAffiche">
                <div class="block1 block">
                    <div class="imageBlock"></div>
                    <div class=info>
                        <span>Mon Titre</span>
                        <span>Nombre possible</span>
                        <span>50€</span>
                   </div>
                   <div class="descr">

                        test description affiche
                   </div>
                </div>
                <div class="block2 block">

                </div>
                <div class="block3 block">

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script type="text/javascript">
        if($( ".block" ).hover){
                        $( ".block" ).hover(
            function(){
                $(".info").css("display" , "none");
                $(".imageBlock").css("display" , "none");
                $("descr").css("display" , "");
            }

        );
        }
        else{
            $(".info").css("display" , "");
            $(".imageBlock").css("display" , "");
            $("descr").css("display" , "");
        }

        </script>


    </body>

</html>
<?php
session_start();
?>
