<?php
    include "header.php";
    //Fonction pour nettoyer les chaines de caractère
    function sanitize($data){
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }
?>

<h1>Search Page</h1>

<div class="article-container">
    <?php
        if(isset($_POST['SEARCH'])){
            if(isset($_POST["search"]) && !empty($_POST["search"])){
                $search = sanitize($_POST['search']);
                try{
                    $bdd = new PDO('mysql:host=localhost;dbname=jonis','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    $req = $bdd->prepare("SELECT article.nom_article, article.description_article, article.prix_unit_article FROM article WHERE nom_article LIKE CONCAT('%', ?, '%') OR description_article LIKE CONCAT('%', ?, '%') ");  //Requete pour rechercher un article qui "ressemble" a ce que j'ai tapé dans ma barre de recherche
                    $req->bindParam(1,$search,PDO::PARAM_STR);
                    $req->bindParam(2,$search,PDO::PARAM_STR);
                    $req->execute();
                    $article = $req->fetchAll(PDO::FETCH_ASSOC);
                    //SI mon tableau associatif EXISTE => SI des articles correspondent à ma recherche => je les affiche
                    if($article != null){
                        //boucle for each qui va parcourir le tableau articles
                        foreach($article as $article){
                            echo "<div>
                            <h3>".$article['nom_article']."</h3>
                            <p>Description : ".$article['description_article']."</p>
                            <p>Prix unitaire : ".$article['prix_unit_article']." €</p>
                            </div>";
                        }
                    //SINON message pas de résultat
                    }else{
                        echo "No results SRY";
                    }
                }
                catch(Exception $error){
                    //En cas d'erreur, j'affiche le message d'erreur
                    die($error->getMessage());
                }
            }        
        }
    ?>
</div>