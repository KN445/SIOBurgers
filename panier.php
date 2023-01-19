<!DOCTYPE html>
<html>
    <head>
        <title>Burger</title>
        <link rel="stylesheet" href="burger.css">
    </head>
    <body>
        <header>
            <?php include('header.inc.php'); ?>
        </header>
        <?php
        if (isset($_POST["quantite"])){
            $quantite = $_POST['quantite'];
            echo 'Quantité: ',$quantite;
        }
        try
        {
            $bdd = new PDO('mysql:hosst=localhost;dbname=burger', 'burgers',
            '1234');
        }      
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        
        $identifiant= $_GET['id'];
        $requete = "SELECT * FROM produit WHERE id=$identifiant";
        $reponse = $bdd->query($requete);

        echo "<table>
        <tr><th>Produit</th><th>Qt</th><th>PU</th><th>PT</th><th>Img</th></tr>";
        while ($row=$reponse->fetch()){
            echo "<td>".$row[1]."</td>
            <td>0</td>
            <td>".$row[3]."</td>
            <td>0</td>
            <td>".$row[6]."</td>";
        }
        echo "</table>";
        ?>
        <footer>
            <?php include('footer.inc.php'); ?>
        </footer>
    </body>
</html>