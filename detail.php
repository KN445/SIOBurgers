<!DOCTYPE html> 
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="burger.css">
    <title>Vente de burgers</title> 
</head> 
<body> 
    <header>
      <?php include('header.inc.php'); ?>
    </header>
    <?php
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=burger;charset=utf8', 'burgers', '1234');
    }   
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    $identifiant= $_GET['id'];
    $requete = "SELECT * FROM produit WHERE id=$identifiant";
    $reponse = $bdd->query($requete);
    while ($donnees = $reponse->fetch()){
      $nom=$donnees['nom'];
      $description=$donnees['description'];
      ?>
      <p><?php echo $nom;?></p>
      <p><?php echo $description;?></p>
      <?php
    }
      echo "<div>";
      echo "<form action='panier.php?id=".$identifiant."' method='post'>";
      ?>
        <label for="quatité">quantite</label>
        <input type="number" id="quantite" name="quantite"
        min="0" max="100">
        <button type="submit" id="val">panier</button>
        </div>
   <footer> 
      <?php include('footer.inc.php'); ?>
  </footer> 
</body> 
</html>