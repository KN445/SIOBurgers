<!DOCTYPE html> 
<html> 
<head>
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
      $bdd = new PDO('mysql:hosst=localhost;dbname=burger', 'burgers',
      '1234');
    }   
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM produit');
    echo "<ul>";
    while($donnees = $reponse->fetch())
    {
      $identifiant=$donnees['id'];
      echo "<li>$identifiant". $donnees['nom'] ."<a href='detail.php?id=$identifiant'><img src=". $donnees['image']." alt='Burger' class='master'/></a></li>";
    }
    echo "</ul>";
    $reponse->closeCursor();

    $reponse= $bdd->query('SELECT * FROM produit WHERE 1 LIKE dispo="1"');
    while($donnees = $reponse->fetch())
    {
      $nom=$donnees['nom'];
      echo "$nom";
    }
    $reponse->closeCursor();

    $reponse= $bdd->query('SELECT MIN(prix),nom,prix FROM produit');
    while($donnees = $reponse->fetch())
    {
      $bonpl=$donnees['nom'];
      echo "$bonpl";
      $bonpl=$donnees['prix'];
      echo "$bonpl";
    }
    $reponse->closeCursor();

    ?>
      <div class="bande-burgers">
      <span>Nos burgers</span>
      <button id="panier-btn">
         <a href="panier.php">
         <img src="logopanier.png" alt="Image panier">
      </button>
      </div>
   <div class="contenu"> 
      <div class="master">
        <img src="master.png" alt="Image d'un burger" id="master">
      </div>
      <div id="desc">
        <h2>Description du burger:</h2> 
        <p>Un pain brioché, <br>une sauce onctueuse à la moutarde et à l'oignon, <br>des oignons croquants, <br>des tranches de bacon fumées <br>et une viande de boeuf Angus grillée à la flamme</p> 
        <h2>Prix du Master Bacon:</h2>
        <b>5,80€</b>
      </div>
   </div> 
   <footer> 
   <?php include('footer.inc.php'); ?>
   </footer> 
</body> 
</html> 