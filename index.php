<!DOCTYPE html>
<html lang="en">
<head>
<title>Code Talker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Left and right column */
.column.side {
  width: 25%;
}

/* Middle column */
.column.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
</style>
</head>
<body>

<h2>Code Talker</h2>
<p>In this example, we have created a header, three unequal columns and a footer. On smaller screens, the columns will stack on top of each other.</p>
<p>Resize the browser window to see the responsive effect.</p>

<div class="header">

<form action="/codetalker.php" method="post">


  <label for="message">Digite Sua Mensagem:</label><br>
  <input type="text" id="message" name="message" value="TesteTeste"><br>
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