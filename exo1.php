<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset= "latin1" />
    <title></title>
  </head>
  <body>
    <form method="get" action="exo1.php">
    <?php
     $link=mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
     if(!$link){
       die("<p>connexion impossible</p>");
     }
    ?>
    <label>Nom</label>
    <input type="text" name="nom" />
    <label>Prenom</label>
    <input type="text" name="prenom" />
    <label>Annee</label>
    <input type="text" name="annee" />
    <input type="submit" value="Ajouter"/></input>
</form>
    <table border=1>
      <tr>
        <th>Artiste</th>
        <th>Annee de Naissance</th>
      </tr>
   <?php
      if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["annee"])){
      $nom=$_GET["nom"];
      $prenom=$_GET["prenom"];
      $annee=$_GET["annee"];
      $sql="INSERT INTO Artiste(nom,prenom,anneeNaiss) VALUES ('".$nom."','".$prenom."','".$annee."')";
      $requete=mysqli_query($link,$sql);
      }
       $resultat=mysqli_query($link,"select nom,prenom,anneeNaiss from Artiste");
       if($resultat)
       {
        while ($film=mysqli_fetch_assoc($resultat)){
            echo "<tr>";
            echo "<td>".$film['nom']." ".$film['prenom']."</td>";
            echo "<td>".$film['anneeNaiss']."</td>";
            echo "</tr>";
        }
       }
       else
         die("<p>Erreur dans l'execution de la requete.</p>");
       mysqli_close($link);
      
   ?>
    </table>
  </body>
</html>