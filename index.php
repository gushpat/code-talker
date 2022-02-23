<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="screen" />
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9250561871244265"
     crossorigin="anonymous"></script>




</head>
<body>

<?php

require_once './assets/header.php';

echo $header;


?>


<div class="descheader">
<img class="imagect" src="./assets/images/logo.png" alt="Code Talker" />
</div>


<div class="header">

<p>Você pode criptografar e descriptografar mensagens utilizando as opções abaixo.</p>
<p>A chave deve ter apenas 4 caracteres numéricos.</p>



<p>Selecione a opção abaixo:</p>
<hr>


<div>
  <center>

<table>
  <tr>
    <td>
      <form method="POST" action="./encode.php">
          <input type="submit" value="Encode" id="encode" name="encode">
      </form>

</td>
    <td>


    <form method="POST" action="./decode.php">
  <input type="submit" value="Decode" id="decode" name="decode">

  
</form>

    </td>
  </tr>
</table>

</div>
</center>

  
</div>



<div>
  <?php 

  require_once "./assets/footer.php";

  echo $footer;
  
  
  ?>
</div>


<script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>

</html>



