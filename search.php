<?php
    include "header.php";
?>

<h1>Search Page</h1>

<div class="article-container">
    <?php
    if (isset($_POST["search"])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM article WHERE nom_article LIKE '%$search%' OR description_article LIKE '%$search%'";  //Requete pour rechercher un article qui "ressemble" a ce que j'ai tapé dans ma barre de recherche
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0 ){
            while($row = mysqli_fetch_assoc($result)){
                echo "<div>
                <h3>".$row['nom_article']."</h3>
                <p>Description : ".$row['description_article']."</p>
                <p>Prix unitaire : ".$row['prix_unit_article']." €</p>
                <p>Prix au kg : ".$row['prix_kg']." €</p>
                </div>";
            }
        }else{
            echo "No results SRY";
        }
    }
    ?>
</div>