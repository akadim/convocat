<?php
   if(isset($_POST['txtNom']) && isset($_POST['txtCIN'])){
   	    // on vérifie si le nom existe dans la nouvelle table
   	    // si oui on effectue la mise à jour (UPDATE)
   	    // si non on effectue l'ajout (INSERT) 
        mysql_connect("localhost","root","");
        mysql_select_db("convocat");

        $sql = "SELECT * FROM new_students WHERE nom = '".$_POST['txtNom']."'";
        $resultat = mysql_query($sql) or die("recherche ".mysql_error());
        $nombreLigne = mysql_num_rows($resultat);
        if($nombreLigne != 0)
        {
        	$sql = "UPDATE new_students SET cin = '".trim($_POST['txtCIN'])."' WHERE nom = '".$_POST['txtNom']."'";
        }
        else
        {
            $sql = "INSERT INTO new_students(nom,cin) VALUES('".$_POST['txtNom']."','".trim($_POST['txtCIN'])."')";
        }
        mysql_query($sql) or die("ajout modif ".mysql_error());
        $sql = "UPDATE old_students SET cin = '".trim($_POST['txtCIN'])."' WHERE nom = '".$_POST['txtNom']."'";
        mysql_query($sql) or die("ajout modif ".mysql_error());

        $sql = "SELECT * FROM new_students WHERE nom = '".$_POST['txtNom']."'";
        $resultat = mysql_query($sql) or die("ajout modif ".mysql_error());

        $student = mysql_fetch_assoc($resultat);

        // HTML2PDF
        $content = '
          <page>
    <p>
      <img alt="FSJES Ain sebaa" src="logos/Logo_FSJES.png" style="width: 200px;height: 200px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><span style="font-size: 48px;vertical-align: 60px;">Convocation</span></span></p>
    <p>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
    <table border="1" cellpadding="1" cellspacing="1" height="233" width="813">
      <tbody>
        <tr>
          <td>
            <p>
              <span><span style="font-size: 36px;"><strong>CODE EXAMEN:</strong></span></span></p>
            <p>
              &nbsp;</p>
          </td>
          <td style="padding-left: 30px;">
            <p>
              <span style="font-size: 36px;">'.$student['id'].'</span></p>
            <p>
              &nbsp;</p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <span><span style="font-size: 36px;"><strong>NOM: </strong></span></span></p> 
          </td>
          <td style="padding-left: 30px;">
            <p>
              <span><span style="font-size: 36px;">'.$student['nom'].'</span></span></p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <span><span style="font-size: 36px;"><strong>CIN: </strong></span></span></p>
            <p>
              &nbsp;</p>
          </td>
          <td style="padding-left: 30px;">
            <p>
              <span style="font-size:36px;">'.$student['cin'].'</span></p>
            <p>
              &nbsp;</p>
          </td>
        </tr>
      </tbody>
    </table>
  </page>';
        require_once('html2pdf.class.php');
        $html2pdf = new HTML2PDF('L','A5','fr');
        $html2pdf->WriteHTML($content);
        $html2pdf->Output($student['nom'].'.pdf', 'D');

        echo $student['nom'].'.pdf';
   }
 
?>
