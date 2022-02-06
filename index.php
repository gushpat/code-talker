<!DOCTYPE html>
<html lang="en">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<h2>Code Talker</h2>
<p>In this example, we have created a header, three unequal columns and a footer. On smaller screens, the columns will stack on top of each other.</p>
<p>Resize the browser window to see the responsive effect.</p>

<div class="header">

<form action="./src/codetalker.php" method="post">


  <label for="message">Digite Sua Mensagem:</label><br>
  <input type="text" id="message" name="message" value="testeteste"><br>
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
  <p>Footer</p>
</div>

</body>
</html>