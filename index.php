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
            $sql = "SELECT * FROM article";
            $result = mysqli_query($conn, $sql);            //Requête a ma database
            $queryResults = mysqli_num_rows($result);       //Retourne le nombre de ligne de ma requete result

            if ($queryResults > 0 ) {                       //Si il y a des résultats
                while ($row = mysqli_fetch_assoc($result)) {//TANT QUE il y a des lignes à afficher c'est à dire tant qu'"il y a des articles dans mon cas
                    echo "<div>
                    <h3>".$row['nom_article']."</h3>
                    <p>Description : ".$row['description_article']."</p>
                    <p>Prix unitaire : ".$row['prix_unit_article']." €</p>
                    <p>Prix au kg : ".$row['prix_kg']." €</p>
                    </div>";
                }
            }
        ?>
    </div>
</body>
</html>