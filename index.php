<!DOCTYPE html>
<html lang="en">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="screen" />
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<img src="./assets/images/logo.png" alt="Code Talker" width="auto" height="200px"/>
<p>In this example, we have created a header, three unequal columns and a footer. On smaller screens, the columns will stack on top of each other.</p>
<p>Resize the browser window to see the responsive effect.</p>
</div>


<div class="header">

<form action="./src/codetalker.php" method="post">


  <label for="message">Digite Sua Mensagem:</label><br>
  <textarea name="message" id="message" cols="30" rows="10"></textarea><br>
  <label for="crptokey">Digite sua chave:</label><br>
  <input type="text" id="crptokey" name="crptokey" value="1234" maxlength="4"><br><br>
  <input type="submit" value="Encode Talker">
  <input type="reset" value="Clear">

  

</form>


  </form>
</div>

<div class="row">
  <div class="column side" style="background-color:#aaa;">Column</div>

  <div class="column middle" style="background-color:#bbb;">
  
  
  
  </div>
  <div class="column side" style="background-color:#ccc;">Column</div>
</div>

<div class="footer">
  <?php 

  require_once "./src/footer.php";

  echo $footer;
  
  
  ?>
</div>

<audio autoplay loop>
  <source src="horse.ogg" type="audio/ogg">
  <source src="./assets/music/Boss_Time_-_www.FesliyanStudios.com.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>


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



