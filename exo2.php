<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset= "latin1" />
    <title></title>
  </head>
  <body>
    <form method="get" action="exo2.php">
    <?php
     $link=mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
     if(!$link){
       die("<p>connexion impossible</p>");
     }
    ?>
    <label>Nom</label>
    <input type="text" name="nom" />
    <br>
    <label>Genre</label>
      <?php
      echo "<select name="."genre".">";
      $resultat=mysqli_query($link,"select distinct genre from Film");
     if($resultat)
     {
       while ($film=mysqli_fetch_assoc($resultat)){
        echo "<option>".$film['genre']."</option>";
       }
      echo "</select>";
     }
    ?>
    <br>
    <label>Pays</label>
    <?php
      echo "<select name="."pays".">";
      $resultat=mysqli_query($link,"select distinct codePays from Film");
     if($resultat)
     {
       while ($film=mysqli_fetch_assoc($resultat)){
        echo "<option>".$film['codePays']."</option>";
       }
      echo "</select>";
     }
    ?>
    <br>
    <label>Realisateur</label>
    <?php
      echo "<select name="."realisateur".">";
      $resultat=mysqli_query($link,"select distinct nom from Film join Artiste where idArtiste=idMes");
     if($resultat)
     {
       echo "<option>"."Tous"."</option>";
       while ($film=mysqli_fetch_assoc($resultat)){
        echo "<option>".$film['nom']."</option>";
       }
    echo "</select>";
     }
      ?>
    <br>
    <label>Resume</label>
    <textarea rows="3" cols="30" name="resume"></textarea>
    <br>
    <label>Annee</label>
    <input type="text" name="annee" />
    <br>
    <input type="submit" value="Ajoutez"/></input>
</form>
    <table border=1>
      <tr>
        <th>Titre</th>
        <th>Genre</th>
      </tr>
   <?php
      if(isset($_GET["nom"]) && isset($_GET["genre"]) && isset($_GET["pays"]) && isset($_GET["realisateur"]) && isset($_GET["resume"]) && isset($_GET["annee"])){
      $nom=$_GET["nom"];
      $genre=$_GET["genre"];
      $annee=$_GET["annee"];
      $sql="INSERT INTO Artiste(nom,prenom,anneeNaiss) VALUES ('".$nom."','".$prenom."','".$annee."')";
      $requete=mysqli_query($link,$sql);
      }
       $resultat=mysqli_query($link,"select titre,genre from Film");
       if($resultat)
       {
        while ($film=mysqli_fetch_assoc($resultat)){
            echo "<tr>";
            echo "<td>".$film['titre']."</td>";
            echo "<td>".$film['genre']."</td>";
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