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

    #(Burgers disponible
    ?>
    <p>Burgers disponible:</p>
    <?php
    $reponse= $bdd->query('SELECT * FROM produit WHERE 1 LIKE dispo="1"');
    echo "<ul>";
    while($donnees = $reponse->fetch())
    {
      $nom=$donnees['nom'];
      echo "<li>$nom</li>";
    }
    echo "</ul>";
    $reponse->closeCursor();
    #Burgers disponible)

    #(3 burgers les moins chers
    ?>
    <p>Bons plans:</p>
    <?php
    $reponse= $bdd->query('SELECT nom,prix FROM produit ORDER BY prix LIMIT 3');
    echo "<ul>";
    while($donnees = $reponse->fetch())
    {
      $nom=$donnees['nom'];
      echo "<li>$nom";
      $prix=$donnees['prix'];
      echo ": $prix €</li>";
    }
    echo "</ul>";
    $reponse->closeCursor();
    #3 burgers les moins chers)

    #(3 produits récemment ajoutés
    ?>
    <p>Nouveautés:</p>
    <?php
    $reponse= $bdd->query('SELECT nom FROM produit ORDER By id desc LIMIT 3');
    echo "<ul>";
    while($donnees = $reponse->fetch())
    {
      $nom=$donnees['nom'];
      echo "<li>$nom</li>";
    }
    echo "</ul>";
    $reponse->closeCursor();
    #3 produits récemment ajoutés)

    #(nombre total de produits présents dans la base
    $reponse= $bdd->query('SELECT COUNT(nom) FROM produit');
    while($donnees = $reponse->fetch())
    {
      $total=$donnees['COUNT(nom)'];
      echo "<li>$total produits.</li>";
    }
    $reponse->closeCursor();
    #nombre total de produits présents dans la base)

    #3 + noté(
    ?>
    <p>Les + noté:</p>
    <?php
      $reponse= $bdd->query('SELECT nom,note FROM produit ORDER By note desc LIMIT 3');
      echo "<ul>";
    while($donnees = $reponse->fetch())
    {
      $nom=$donnees['nom'];
      echo "<li>$nom";
      $note=$donnees['note'];
      echo ": $note étoiles!</li>";
    }
    echo "</ul>";
    $reponse->closeCursor();
    #3 + noté)

    #burgers classique disponible(
    ?>
    <p>Les burgers classique disponible:</p>
    <?php
      $reponse= $bdd->query('SELECT nom FROM produit WHERE categorie="classique" AND dispo=1');
      echo "<ul>";
    while($donnees = $reponse->fetch())
    {
      $nom=$donnees['nom'];
      echo "<li>$nom</li>";
    }
    echo "</ul>";
    $reponse->closeCursor();
    #burgers classique disponible)

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