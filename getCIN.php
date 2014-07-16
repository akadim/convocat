    <?php
    include("connexion.php");
 
    if (isset($_GET['nom'])){

       $sql = "SELECT * FROM old_students WHERE nom LIKE '%".str_replace("'", "", $_GET['nom'])."%'";
       $resultat = mysql_query($sql) or die(mysql_error());
       $student = mysql_fetch_assoc($resultat);
      
       $sql = "SELECT cin FROM new_students WHERE nom LIKE '%".str_replace("'", "", $_GET['nom'])."%'";
       $resultat = mysql_query($sql) or die(mysql_error());
       $convoque = mysql_num_rows($resultat);

       /* Toss back results as json encoded array. */

       echo trim($student['cin'])."#".$student['cne']."#".$student['sexe']."#".$student['dateNaissance']."#".$student['lieuNaissance']."#".$student['adresse']."#".$student['email']."#".$student['tel']."#".$student['diplome']."#".$student['etablissement']."#".$student['specialite']."#".$student['filiere']."#".$convoque;
    }
     
    ?>