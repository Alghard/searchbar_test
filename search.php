<?php
    include "header.php";
?>

<h1>Search Page</h1>

<div class="article-container">
    <?php
    if (isset($_POST["search"])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM article WHERE nom_article LIKE '%$search%' OR description_article LIKE '%$search%'";  //Requete pour rechercher un article qui "ressemble" a ce que j'ai tapé dans ma barre de recherche
        $statement = $pdo->query($sql);
        $article = $statement->fetchAll(PDO::FETCH_ASSOC);


        if($article){
            foreach($article as $article){
                echo "<div>
                <h3>".$article['nom_article']."</h3>
                <p>Description : ".$article['description_article']."</p>
                <p>Prix unitaire : ".$article['prix_unit_article']." €</p>
                </div>";
            }
        }else{
            echo "No results SRY";
        }
    }
    ?>
</div>