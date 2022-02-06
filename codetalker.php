<?php

  //A MÁGICA COMEÇA AQUI

  $mensagemfinal = "348 303 345 348 303 812 707 805 812 707";

  if (isset($_POST["message"]) && isset($_POST["crptokey"])) {
    $message = $_POST["message"];
    $criptokey = $_POST["crptokey"];

    
    echo $mensagemfinal;
    echo "<hr>";

    echo "Hello, " . $message . " " . $criptokey . "!";
    echo "<hr>";
    
    echo "Numero de carcteres da mensagem: ".strlen($message); //Tamanho da mensagem
    echo "<br>";
    echo "Numero de carcteres da chave: ".strlen($criptokey); //Tamanho da chave

  }

  



  class code{

    

    public function encodetester($message, $criptokey){

      $tamanho_mensagem = 5;

      echo "<br> <p>chamou função encodetalker</p>";

      //transformar a mensagem em array bidimensional

      $messageArray = array(); //cria o array
      $messageAscii = array(); //cria o array

      $messageArray = str_split($message); //transforma a mensagem em array

      $teste = ord($messageArray[0]);

      foreach ($messageArray as $key => $value) {
        echo "<br>";
        echo "Caracter: " . $value . " - " . "ASCII: " . ord($value);
        $messageAscii[] = ord($value);
      }

      echo "<hr>";


      print_r($messageAscii);


      echo "<hr>";

      $testeChunk = array_chunk($messageAscii, $tamanho_mensagem); // array bidimensional com 5 colunas de 2 elementos (10 caracteres)

      print_r($testeChunk);

      echo "<hr>";

      //$testeChunk[0][0] = "x";

      echo "teste".$testeChunk[0][0];

      $criptokeyArray = array(); //cria o array

      $criptokeyArray = str_split($criptokey); //transforma a mensagem em array

      $testeChunk2 = array_chunk($criptokeyArray, 2); // array bidimensional com 5 colunas de 2 elementos (10 caracteres)

      print_r($testeChunk2);

      //Testar determinante da matriz

      $determinante = $testeChunk2[0][0] + $testeChunk2[1][1] - $testeChunk2[0][1] + $testeChunk2[1][0];

      

      if ($determinante == 0)
      {
          echo "DET = 0";
         

      }
      else {
          echo "DET = " .$determinante;
      }


      echo "<hr>";

      $n = array();
      $c = array();
      $m = array();

      $c = $testeChunk2;
      $m = $testeChunk;

      for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < 5; $i++)
            {
                //algoritmo para criptografia
                //super simples XD
                

                $n[$k][$i] = ($c[$k][0] * $m[0][$i]) + ($c[$k][1] * $m[1][$i]);

                

            }

        }

        echo "<hr>";
        echo print_r($n);



        //print array bidimensional

        echo "<hr>";

        $resultadofinal = "";

        for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < 5; $i++)
            {
                //algoritmo para criptografia
                //super simples XD
                

                if ($k == 1 && $i == 4) {
                  $resultadofinal .= $n[$k][$i];
                }
                else {
                  $resultadofinal .= $n[$k][$i] . "+";
                }

                

                
                

            }

        }

        echo $resultadofinal;

      

      
    





    }
  }

  $code = new code();
  $code->encodetester($message, $criptokey);





  ?>