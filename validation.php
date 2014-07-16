<?php
if(isset($_POST['txtNom']) && isset($_POST['txtCIN'])){
   	    // on vérifie si le nom existe dans la nouvelle table
   	    // si oui on effectue la mise à jour (UPDATE)
   	    // si non on effectue l'ajout (INSERT) 
  include("connexion.php");

  $sql = "SELECT * FROM new_students WHERE nom = '".$_POST['txtNom']."' OR cin = '".$_POST['txtCIN']."'";
  $resultat = mysql_query($sql) or die("recherche ".mysql_error());
  $nombreLigne = mysql_num_rows($resultat);
  if($nombreLigne != 0)
  {
   $sql = "UPDATE new_students SET cin = '".trim($_POST['txtCIN'])."', nom = '".$_POST['txtNom']."' WHERE nom = '".$_POST['txtNom']."' OR cin = '".$_POST['txtCIN']."'";
 }
 else
 {
  $sql = "INSERT INTO new_students(nom,cin) VALUES('".$_POST['txtNom']."','".trim($_POST['txtCIN'])."')";
}
mysql_query($sql) or die("ajout modif ".mysql_error());
$sql = "UPDATE old_students SET cin = '".trim($_POST['txtCIN'])."', nom = '".$_POST['txtNom']."' WHERE nom = '".$_POST['txtNom']."' OR cin = '".$_POST['txtCIN']."'";
mysql_query($sql) or die("ajout modif ".mysql_error());

$sql = "SELECT * FROM new_students WHERE nom = '".$_POST['txtNom']."'";
$resultat = mysql_query($sql) or die("ajout modif ".mysql_error());

$student = mysql_fetch_assoc($resultat);

        // HTML2PDF
$content = '
<page>   
  <p> <span style="font-size: 20px;"><span style="font-family: arial,helvetica,sans-serif;"><img alt="FSJES" src="logos/Logo_FSJES.png" width="127" height="127" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="vertical-align: 50px;">Casablanca le '.date('d/m/Y').'</span></span></span></p> <div style="border: 1px solid black;width: 270px;border-radius: 5px;padding: 2px;margin-left: 300px;background-color: #0070c0;color:#FFFFFF;"> <h1 style="text-align: center;"> <span style="font-size:28px;"><span style="font-family: arial,helvetica,sans-serif;">CONVOCATION</span></span></h1> </div> <p> <span style="font-size:20px;"><span style="font-family: arial,helvetica,sans-serif;">Nom: '.$student['nom'].'</span></span><span style="font-size:20px;"><span style="font-family: arial,helvetica,sans-serif;"><br /> CIN: '.$student['cin'].'<br /> Code examen: '.$student['id'].'</span></span></p> <div>&nbsp;</div> <p> <span style="font-size:20px;"><span style="font-family: arial,helvetica,sans-serif;">Nous vous invitons &#224; prendre connaissance ci-apr&#232;s du planning du test d&#8217;entr&#233;e pour l&#8217;obtention d&#8217;un Dipl&#244;me d&#8217;universit&#233; (Bac+3)</span></span></p> <div>&nbsp;</div> <p style="margin-bottom: 0.14in; line-height: 115%; text-align: center;"> <span style="font-size:20px;"><span style="font-family: arial,helvetica,sans-serif;"><font color="#0070c0"><font style="font-size: 16pt"><strong>12 JUILLET 2014 &#224; 12h:00 (midi)</strong></font></font></span></span></p> <p style="text-indent: 0.49in; margin-bottom: 0in; line-height: 150%; text-align: justify;"> <span style="font-size: 14pt;"><span style="font-family: arial,helvetica,sans-serif;"><font style="font-size: 14pt;">Les &#233;preuves se d&#233;rouleront aux dates et heures ci-dessus &#224; la facult&#233; des Sciences Juridiques, Economiques et Sociales AIN SEBAA et nous vous rappelons que votre participation est obligatoire. Vous devrez IMPERATIVEMENT &#234;tre pr&#233;sent 15 minutes avant le d&#233;but des &#233;preuves pour signer la feuille de pr&#233;sence !</font></span></span></p> <p style="text-indent: 0.49in; margin-bottom: 0in; line-height: 150%; text-align: justify; font-size: 14pt;"> <span style="font-size:20px;"><span style="font-family: arial,helvetica,sans-serif;"><font style="font-size: 14pt">La pr&#233;sente lettre tient lieu de convocation&nbsp;; vous devrez donc ABSOLUMENT en &#234;tre muni pour acc&#233;der aux salles d&#8217;examen ou pour satisfaire &#224; d&#8217;&#233;ventuels contr&#244;les.</font></span></span></p> <p style="text-align: justify; font-size: 14pt;"> <span style="font-size:20px;"><span style="font-family: arial,helvetica,sans-serif;"><font style="font-size: 14pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vous devrez par ailleurs &#234;tre en possession d&#8217;un document prouvant votre identit&#233; (Carte Nationale d&#8217;Identit&#233;, Passeport,&#8230;)</font></span></span></p> <div> <p style=" 0in; 150%" align="justify"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp; Restant &#224; votre disposition pour toute pr&#233;cision qui pourrait vous &#234;tre utile, nous vous prions d&#8217;agr&#233;er, Madame, Monsieur, nos salutations distingu&#233;es.</span></p> &nbsp;</div> <p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img alt="cache" src="logos/cach.png" width="167" height="167" /></p>  
</page>';
                                      require_once('html2pdf.class.php');
                                      $html2pdf = new HTML2PDF('P','A4','fr');
                                      $html2pdf->WriteHTML($content);
                                      $html2pdf->Output($student['nom'].'.pdf', 'D');

                                      echo $student['nom'].'.pdf';
                                    }

                                    ?>
