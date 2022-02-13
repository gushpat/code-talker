<?php


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


      //reescrever esta parte do código caso a chave seja composta de mais caracteres
      if($criptokeyArray[0][0] == null || $criptokeyArray[0][1] == null || $criptokeyArray[1][0] == null || $criptokeyArray[1][1] == null){ //Se algum dos valores da chave for nulo, não é possível fazer a operação
        
        $error = "<h2>ERRO!</h2>
  
        <p>CHAVE INVÁLIDA: POR FAVOR INSIRA 4 CARACTERES NUMÉRICOS NO CAMPO ACIMA.</p>";

        return $error; //Retorna o erro
        
      }

      //echo "<hr>";
      //print_r($criptokeyArray); //Mostra o array multidimensional (DEBUG ONLY)

      //Antes de qualquer coisa, vamos verificar a determinante da matriz
      //caso seja 0, a mensagem não pode ser criptografada e a chave terá que ser alterada

      $det = $criptokeyArray[0][0] * $criptokeyArray[1][1] - $criptokeyArray[0][1] * $criptokeyArray[1][0]; 

      //echo "DET = " . $det;

      if ($det == 0)
      {
        
        //echo "DET = 0, a mensagem não pode ser criptografada, a chave deve ser alterada";

        $error = "<h2>ERRO!</h2> 
        <p>CHAVE INVÁLIDA! DETERMINANTE NÃO PODE SER IGUAL A ZERO.</p>";

        return $error; //Retorna o erro

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
              $resultadofinal .= $n[$k][$i] . "%#%"; //Adiciona o caractere de separacao
                


              /*
                if ($k == 1 && $i == ($len_i - 1)) { //caso seja o ultimo valor da matriz, não adiciona o caractere de separacao
                  $resultadofinal .= $n[$k][$i]; 
                }
                else {
                  $resultadofinal .= $n[$k][$i] . "*"; //Adiciona o caractere de separacao
                }

                */

            }

        }

        //echo $resultadofinal;
        //echo "<hr> ATENÇÃO: Sua chave é " . $criptokey;

        return $resultadofinal;  //Retorna o resultado final
      
    }

  

    public function decodetalker($message, $criptokey)
    {

      

      //echo "<br> <p>chamou função decodetalker</p>";

      //separar mensagem a partir do caractere de separacao


      $messageArray = array(); //cria o array
      
      $messageArray = explode("%#%", $message, -1); //transforma a mensagem em array separando por *
  

      $messagelen = count($messageArray);;
      //print_r($messageArray);
      


      //determinante

      $criptokeyArray = array(); //Cria o array 
      $criptokeyArray = array_chunk(str_split($criptokey), 2); //transforma a chave em array bidimensional

      $det = $criptokeyArray[0][0] * $criptokeyArray[1][1] - $criptokeyArray[0][1] * $criptokeyArray[1][0]; //calcula o determinante

      //chave adjunta

      $adjunta = array(); //Cria o array 

      $adjunta[0][0] = $criptokeyArray[1][1];  //Cria a matriz adjunta
      $adjunta[0][1] = $criptokeyArray[0][1] * -1; //Cria a matriz adjunta
      $adjunta[1][0] = $criptokeyArray[1][0] * -1; //Cria a matriz adjunta
      $adjunta[1][1] = $criptokeyArray[0][0]; //Cria a matriz adjunta


      //matriz inversa

      $inversa = array(); // Cria o array 

      for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
          $inversa[$i][$j] = $adjunta[$i][$j] / $det;
        }
      }

      //decode talker

    

      $n = array(); //n => matriz do resultado
      $c = array(); //c => matriz da chave
      $m = array(); //m => matriz da mensagem

      $c = $inversa; // matriz c = chave inversa

      

      $messageChunk = array(); //cria o array
      $messageChunk = array_chunk($messageArray, ($messagelen/2)); //MUDAR O TAMANHO DEPOIS


      // converte string para inteiro

      for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < ($messagelen/2); $i++) //MUDAR O TAMANHO DEPOIS
            {
                $m[$k][$i] = intval($messageChunk[$k][$i]);

                

            }

        }




      
       //echo "<hr> ARRAY CHAVE ";
       //print_r($c);
       //echo "<hr> ARRAY MENSAGEM ";
       //$m = $messageArray;
       //print_r($m);



      
      for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < ($messagelen/2); $i++)
            {
                //algoritmo para criptografia
                //super simples XD
                

                $n[$k][$i] = ($c[$k][0] * $m[0][$i]) + ($c[$k][1] * $m[1][$i]);


            }

        }

        //echo "<hr>";
        


        //print_r($n);

        $teste = array();

        for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < ($messagelen/2); $i++) 
            {
                //algoritmo para criptografia
                //super simples XD
                

                $teste[$k][$i] = chr($n[$k][$i]);

            }
          
          }

      //int to ascii char
      //exibir resultado
      //echo "<hr>";
      //print_r($teste);

      $resultado = "";


      for ($k = 0; $k < 2; $k++)
        {
            for ($i = 0; $i < ($messagelen/2); $i++) 
            {
                //algoritmo para criptografia
                //super simples XD
                

                $resultado .= $teste[$k][$i];

            }
          
          }


          return $resultado;
 
    }

   
  }




  ?>