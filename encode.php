<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

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

<p>Digite a mensagem e a chave nos campos abaixo. Caso deseje criptografar, pressione ENCODE. Caso deseje descriptografar, pressione DECODE</p>
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

if (isset($_POST["message"]) && isset($_POST["criptokey"])) { // Se o botão de Encode for clicado
    $codetalker = new code(); // Instancia a classe Codetalker
   echo 
 
   "
   <div class='middle'>
   <h2>Mensagem Criptografada:</h2>

   <p>".$codetalker->encodetalker($_POST["message"], $_POST["criptokey"])."</p>
   </div>
   
   
   "; // Chama o método encode
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



