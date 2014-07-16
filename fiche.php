<?php
if(isset($_POST['txtNom']) && isset($_POST['txtCIN'])){
   	    // on vérifie si le nom existe dans la nouvelle table
   	    // si oui on effectue la mise à jour (UPDATE)
   	    // si non on effectue l'ajout (INSERT) 
  include("connexion.php");

  $sql = "SELECT * FROM new_students WHERE nom = '".$_POST['txtNom']."'";
  $resultat = mysql_query($sql) or die("ajout modif ".mysql_error());

  $student = mysql_fetch_assoc($resultat);

        // HTML2PDF
  $content = '
  <page> 
  </page>';
  require_once('html2pdf.class.php');
  $html2pdf = new HTML2PDF('P','A4','fr');
  $html2pdf->WriteHTML($content);
  $html2pdf->Output('Fiche_Preinscription_'$student['nom'].'.pdf', 'D');
}

?>