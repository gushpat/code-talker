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
    echo "<hr>";

  }

  



  class code{


    public function encodetalker($message, $criptokey){

      $extrachar = " "; //Caracter que será usado para ajustar o tamanho da mensagem
      $messagelen = strlen($message); //Pega o tamanho da mensagem

      //agora verificamos se o tamanho da mensagem é par
      //caso seja, beleza, nada acontece, feijoada
      //caso contrario, adicionamos o numero de caracteres faltantes
      //até que o tamanho da mensagem seja par
      

      if ($messagelen % 2 != 0) { //Se o tamanho da mensagem não for par
 
        

        while ($messagelen % 2 != 0) { //Enquanto o tamanho da mensagem não for par, adiciona o caractere escolhido
          $message = $message . $extrachar; //Adiciona o caractere escolhido
          $messagelen = strlen($message); //Atualiza o tamanho da mensagem
          //echo "O tamanho da mensagem não é par, por isso, adicionamos o caractere: " . $extrachar . " ";
        }

      }

      //agora vamos criar um array multidimensional com o tamanho da mensagem
      //e vamos preencher com os caracteres da mensagem
      
      $messageArray = array(); //Cria o array
      $messageArray = str_split($message); //Preenche o array com os caracteres da mensagem

      $messageAsciiCodes = array(); //Cria o array que vai receber os valores ASCII


      foreach ($messageArray as $key => $value) {
        //echo "<br>"; //Para facilitar a visualização
       // echo "Caracter: " . $value . " - " . "ASCII: " . ord($value); //Mostra o caracter e o valor ASCII (DEBUG ONLY)
        $messageAsciiCodes[] = ord($value); //Preenche o array com os valores ASCII correspondentes a cada caracter da mensagem
      }

      //agora vamos criar um array multidimensional com 5 colunas
      //e vamos preencher com os codigos ASCII da mensagem


      $messageMultiArray = array(); //Cria o array multidimensional
      $messageMultiArray = array_chunk($messageAsciiCodes, ($messagelen / 2)); //Preenche o array multidimensional com as colunas

      //print_r($messageMultiArray); //Mostra o array multidimensional (DEBUG ONLY)

      //tudo beleza em relação a mensagem, agora vamos cuidar da chave
      //como a chave é composta apenas de numeros, não precisamos de nenhum tratamento
      //apenas vamos criar um array multidimensional com 2 colunas e 2 linhas

      $criptokeyArray = array(); //Cria o array multidimensional
      $criptokeyArray = array_chunk(str_split($criptokey), 2); //Preenche o array com os caracteres da chave

      //echo "<hr>";
      //print_r($criptokeyArray); //Mostra o array multidimensional (DEBUG ONLY)

      //Antes de qualquer coisa, vamos verificar a determinante da matriz
      //caso seja 0, a mensagem não pode ser criptografada e a chave terá que ser alterada

      $det = $criptokeyArray[0][0] * $criptokeyArray[1][1] - $criptokeyArray[0][1] * $criptokeyArray[1][0]; 

      //echo "DET = " . $det;

      if ($det == 0)
      {
        
        //echo "DET = 0, a mensagem não pode ser criptografada, a chave deve ser alterada";

        //atribui esses valores temporariamente para não dar erro
        //utilizar uma outra função para obter numeros aleatorios
        $criptokeyArray[0][0] = 1;
        $criptokeyArray[0][1] = 2;
        $criptokeyArray[1][0] = 3;
        $criptokeyArray[1][1] = 4;

      }

      //tudo ok, agora vamos criar a matriz de criptografia

      $n = array(); //n => matriz do resultado
      $c = array(); //c => matriz da chave
      $m = array(); //m => matriz da mensagem

      $c = $criptokeyArray;
      $m = $messageMultiArray;

      $len_i = 0;
      $len_i = ($messagelen / 2);
       //Tamanho da matriz de mensagem / 5

      //$len_i = 5;

      //echo "<hr> Tamanho da linha ".$len_i."<hr>";

      for ($k = 0; $k < 2; $k++) //for > numero de linhas
        {
            for ($i = 0; $i < $len_i; $i++) //for > numero de colunas
            {
                //algoritmo para criptografia
                //super simples XD
                

                $n[$k][$i] = ($c[$k][0] * $m[0][$i]) + ($c[$k][1] * $m[1][$i]);

                

            }

        }


        $resultadofinal = ""; //Cria a variavel que vai receber o resultado final

        for ($k = 0; $k < 2; $k++) //for > numero de linhas
        {
            for ($i = 0; $i < $len_i; $i++) //for > numero de colunas
            {
                
                

                if ($k == 1 && $i == ($len_i - 1)) { //caso seja o ultimo valor da matriz, não adiciona o caractere de separacao
                  $resultadofinal .= $n[$k][$i]; 
                }
                else {
                  $resultadofinal .= $n[$k][$i] . "*"; //Adiciona o caractere de separacao
                }

            }

        }

        //echo $resultadofinal;
        //echo "<hr> ATENÇÃO: Sua chave é " . $criptokey;

        return $resultadofinal;
      
    }

    

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


    public function decodetalker($message, $criptokey)
    {

      

      echo "<br> <p>chamou função decodetalker</p>";

      //separar mensagem a partir do caractere de separacao


      $messageArray = array(); //cria o array
      
      $messageArray = explode("*", $message, -1); //transforma a mensagem em array
  

      print_r($messageArray);
      


      //determinante

      $criptokeyArray = array(); //Cria o array multidimensional
      $criptokeyArray = array_chunk(str_split($criptokey), 2);

      $det = $criptokeyArray[0][0] * $criptokeyArray[1][1] - $criptokeyArray[0][1] * $criptokeyArray[1][0];

      //chave adjunta

      $adjunta = array();

      $adjunta[0][0] = $criptokeyArray[1][1];
      $adjunta[0][1] = $criptokeyArray[0][1] * -1;
      $adjunta[1][0] = $criptokeyArray[1][0] * -1;
      $adjunta[1][1] = $criptokeyArray[0][0];


      //matriz inversa

      $inversa = array();

      for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
          $inversa[$i][$j] = $adjunta[$i][$j] / $det;
        }
      }

      //decode talker

      $messageArray = array(); //Cria o array multidimensional
      //$messageArray = array_chunk($messageArray, ($messageArray.siz)/ 2));

      $n = array(); //n => matriz do resultado
      $c = array(); //c => matriz da chave
      $m = array(); //m => matriz da mensagem

      $c = $criptokeyArray;
      echo "<hr> ARRAY CHAVE";
      print_r($c);
      echo "<hr> ARRAY MENSAGEM";
      $m = $messageArray;
      print_r($m);

      for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < (strlen($message)/ 2); $i++)
            {
                //algoritmo para criptografia
                //super simples XD
                

                $n[$k][$i] = ($c[$k][0] * $m[0][$i]) + ($c[$k][1] * $m[1][$i]);

               


                

            }

        }

        echo "<hr>";
        echo print_r($n);


        print_r($n);


      //int to ascii char
      //exibir resultado







      
    }



  }




  $code = new code();
  
  $mensagemcriptografada = $code->encodetalker($message, $criptokey);

  echo $mensagemcriptografada;

  $code->decodetalker($mensagemcriptografada, $criptokey);






  ?>