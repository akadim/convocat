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
      <input type="submit" value="Générer" class="checkout-btn">
    </p>
  </form>
  <script type="text/javascript">
      function getPdf(inline,url){
            if(!url) url=document.location.href;
               var param={
                'url'   : url,
                'plain'   : '1',
                'filename'  : (!inline)?url.replace(/[^a-z|0-9|-|_]/ig,'_').replace(/_{2,}/g,'_')+'.pdf':''
              };
              var temp=[];
             for(var key in param)
                 temp.push(encodeURIComponent(key)+'='+encodeURIComponent(param[key]));
                 document.location.href='http://online.htmltopdf.de/?'+temp.join('&');
      }
      $(function() {

         $( "#txtNom" ).autocomplete({
           source: "search.php",
           minlength: 2,
           select: function( event, ui ) {
                  $.get("getCIN.php?nom='"+ui.item.value+"'",function(response){
                              $("#txtCIN").val(response.trim());
                  });
            }
         });
         /*
         $("#form_convocat").on("submit", function(ev){
              ev.preventDefault();
              $.post("validation.php",{ txtNom: $("#txtNom").val(), txtCIN: $("#txtCIN").val() },function(response){
                window.location.href = response;
              });
         });
        */
      });
  </script>
</body>
</html>
