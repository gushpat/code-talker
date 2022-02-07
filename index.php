<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="screen" />
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php 

$_SESSION["message"] = null; // Inicializa a variável de sessão
$_SESSION["key"] = null; // Inicializa a variável de sessão

?>



</head>
<body>


<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Inicio</a>
  <a href="#news">Sobre</a>
  <a href="#contact">Código Fonte</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="descheader">
<img class="imagect" src="./assets/images/logo.png" alt="Code Talker" />
</div>


<div class="header">

<p>Digite a mensagem e a chave nos campos abaixo. Caso deseje criptografar, pressione ENCODE. Caso deseje descriptografar, pressione DECODE</p>
<hr>
<form>
  <label for="message">Digite Sua Mensagem:</label><br>
  <textarea name="message" id="message" cols="30" rows="10" style="width: 90%;"></textarea><br>
  <label for="crptokey">Digite sua chave:</label><br>
  <input type="number" min="0" max="9999" maxlength="4" step="1" id="crptokey" name="crptokey" ><br><br>
  <input type="button" onclick="alert('Hello World!')" value="Encode Talker">
  <input type="button" onclick="alert('Hello World!')" value="Decode Talker">
  <input type="reset" value="Limpar">

  

</form>


  </form>
</div>

<div class="header">
  
  <?php

  if (isset($_SESSION["message"])) {
    echo $_SESSION["message"];
  }




?>
  
  
  
  </div>
  
</div>

<div class="footer">
  <?php 

  require_once "./src/footer.php";

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



