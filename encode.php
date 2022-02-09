<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Code Talker">
<meta name="keywords" content="Code Talker">
<meta name="author" content="Gustavo Patricio">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="google" content="index, follow">
<meta name="rating" content="general">
<meta name="distribution" content="global">
<meta name="revisit-after" content="1 days">
<meta name="language" content="pt-br">
<meta name="copyright" content="Code Talker">
<meta name="expires" content="never">

<link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="screen" />
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
<h2>ENCODE TALKER</h2>
<p>Digite a mensagem e a chave nos campos abaixo e pressione ENCODE</p>
<hr>
<form method="POST" action="/encode.php">
  <label for="message">Digite Sua Mensagem:</label><br>
  <textarea name="message" id="message" cols="30" rows="10" style="width: 90%;"></textarea><br>
  <label for="criptokey">Digite sua chave:</label><br>
  <input type="text" maxlength="4" step="1" id="criptokey" name="criptokey" ><br><br>
  <input type="submit" value="Encode" id="encode" name="encode">


  

</form>




  </form>
</div>


  
  

<?php 

require_once "./src/codetalker.php"; // Importa o arquivo de código

if (isset($_POST["message"]) && isset($_POST["criptokey"])) { 
  
  if ($_POST["message"] != null && $_POST["criptokey"] != null) { // Se o botão de Decode for clicado
    // Se o botão de Encode for clicado
  $codetalker = new code(); // Instancia a classe Codetalker
   echo 
 
   "
   <div class='middle' id='result'>
   <h2>Mensagem Criptografada:</h2>

   <p>".$codetalker->encodetalker($_POST["message"], $_POST["criptokey"])."</p>
   </div>
   
   
   "; // Chama o método encode
  }
  else
  {

    echo "

  <div class='middle'>
   <h2>ERRO:</h2>

   <p>POR FAVOR PREENCHA TODOS OS CAMPOS!!!</p>
   </div>

   ";

  }

}


   








?>

  
  
  
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



