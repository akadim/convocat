<?php
include('validation.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>FSJES Ain Sebaa - Convocation</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <form class="checkout" action="" method="post" id="form_convocat">
    <div class="checkout-header">
      <h1 class="checkout-title">
        Convocation
      </h1>
    </div>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="Nom" id="txtNom" name="txtNom" autofocus>
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="CIN" id="txtCIN" name="txtCIN">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="CNE" id="txtCNE" name="txtCNE">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="SEXE" id="txtSEXE" name="txtSEXE">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="DATE NAISSANCE" id="txtDateNais" name="txtDateNais">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="LIEU NAISSANCE" id="txtLieuNais" name="txtLieuNais">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="NATIONALITE" id="txtNation" name="txtNation">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="ADRESSE" id="txtAdresse" name="txtAdresse">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="EMAIL" id="txtEmail" name="txtEmail">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="TEL" id="txtTel" name="txtTel">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="DIPLOME" id="txtDiplome" name="txtDiplome">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="ETABLISSEMENT" id="txtEtab" name="txtEtab">
    </p>
    <p>
      <input type="text" class="checkout-input checkout-card" placeholder="SPECIALITE" id="txtSpe" name="txtSpe">
    </p>
    <p>
      <select class="checkout-input checkout-card" id="txtFil" name="txtFil" size="3" multiple="multiple" style="height: 130px;width: 100%;">
        <optgroup label="choisissez le(s) filière(s)">
          <option value="Commerce et Distribution">Commerce et Distribution</option>
          <option value="Management des établissement sanitaires et sociaux">Management des établissement sanitaires et sociaux</option>
          <option value="Gestion des ressources humaines">Gestion des ressources humaines</option>
          <option value="Management des unités touristiques">Management des unités touristiques</option>
          <option value="Finance et comptabilité">Finance et comptabilité</option>
          <option value="Banque et assurance">Banque et assurance</option>
          <option value="Méthodes informatiques appliquées à la gestion">Méthodes informatiques appliquées à la gestion</option>
        </optgroup>
      </select>
    </p>
    <p id="submit_zone">
      <input type="submit" value="Générer" class="checkout-btn">
    </p>
  </form>
  <script type="text/javascript">
    $(function() {
     $("#txtDateNais").datepicker();
     $( "#txtNom" ).autocomplete({
       source: "search.php",
       minlength: 2,
       select: function( event, ui ) {
        $.get("getCIN.php?nom='"+ui.item.value+"'",function(response){
          responses = response.split("#");
          var cin = responses[0].trim();
          var cne = responses[1].trim();
          var sexe = responses[2].trim();
          var dateNaiss = responses[3].trim();
          var lieuNaiss = responses[4].trim();
          var adresse = responses[5].trim();
          var email = responses[6].trim();
          var tel = responses[7].trim();
          var diplome = responses[8].trim();
          var etablissement = responses[9].trim();
          var specialite = responses[10].trim();
          var filiere = responses[11].trim();
          var filieresChoisi = filiere.split("\n");
          var filieres = document.getElementById("txtFil").options;
          for(filieres in filier)
          {
             for(filieresChoisi in filie)
             {
                 if( filier =)
             }
          }
          var convoque = parseInt(responses[12]);
          $("#txtCIN").val(cin);
          $("#txtCNE").val(cne);
          $("#txtSEXE").val(sexe);
          $("#txtDateNais").val(dateNaiss);
          $("#txtLieuNais").val(lieuNaiss);
          $("#txtAdresse").val(adresse);
          $("#txtEmail").val(email);
          $("#txtTel").val(tel);
          $("#txtDiplome").val(diplome);
          $("#txtEtab").val(etablissement);
          $("#txtSpe").val(specialite);
          $("#txtFil").val(filiere);  
          if(convoque != 0)
          {
            if(!document.getElementById('fiche')){
             $("#submit_zone").append($('<input type="submit" value="Fiche" class="checkout-btn" id="fiche">'));
           }
         }
         else
         {
          $("#fiche").remove();
        }
      });
      }
    });
     $(document).on("#fiche","click",function(ev){
      ev.preventDefault();
      $("#form_convocat").attr("action","fiche.php");
      $("#form_convocat").submit();  
    });

});
</script>
</body>
</html>
