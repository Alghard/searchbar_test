<?php
    include "header.php";
?>
<body>
    <form action="search.php" method="post">
        <input type="text" name="search" id="" placeholder="search">
        <button type="submit" name="SEARCH">SEARCH</button>
    </form>

    <h1>TEST SEARCH BAR</h1>
    <h2>Tous les articles</h2>

    <div class="article-container">
        <?php
            try{
                $sql = "SELECT * FROM article";                     //Je défini ma requete sql
                $statement = $pdo->query($sql);                     //J'interroge ma BDD avec la requete précedemment créée
                $article = $statement->fetchAll(PDO::FETCH_ASSOC);  //Je créer une variable ayant pour valeur tous les résultats de ma requete

                if ($article) {                         //Si il y a des résultats
                    foreach ($article as $article){     //TANT QUE il y a des lignes à afficher c'est à dire tant qu'"il y a des articles dans mon cas
                        echo "<div>
                        <h3>".$article['nom_article']."</h3>
                        <p>Description : ".$article['description_article']."</p>
                        <p>Prix unitaire : ".$article['prix_unit_article']." €</p>
                        </div>";
                    }
                }
            }
            catch(Exception $e){
                die($error->getMessage());
            }
        ?>
    </div>
</body>
</html>