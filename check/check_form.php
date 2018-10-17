<?php
function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

$nome = "";
$email ="";
$text = "";

$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["nome"])){
    $erro_nome = "Nome é obrigatório.";
    $erro = true;
  }
  else{
    $nome = verifica_campo($_POST["nome"]);
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["email"])){
    $erro_email = "email é obrigatório.";
    $erro = true;
  }
  else{
    $email = verifica_campo($_POST["email"]);
  }
    
// Saída E-mail válido  
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["texto"])){
    $erro_text = "mensagem é obrigatório.";
    $erro = true;
  }
  else{
    $text = verifica_campo($_POST["texto"]);
  }
}


    
?>
