<?php
require_once "check\sanitize.php";
  require_once "bd\db_connection.php";

  session_start();


  $form_titulo = $form_texto = "";
  $msg = "";
   $comment ="";
    

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_titulo =  $_POST['form_titulo'];
    $form_texto = $_POST['form_texto'];

    if (empty($form_titulo) || empty($form_texto)) {
      $error = true;
    }
    else{
      $name = mysqli_real_escape_string($conn, sanitize($form_titulo));
      $comment = mysqli_real_escape_string($conn, sanitize($form_texto));

      $sql = "INSERT INTO textos (titulo, texto)
      VALUES ('$name', '$comment')";
        header ("Location:http://localhost/ds120-trabalho-web/adm.php"); /* Insere comentario na tabela e redireciona para index, impedindo repetição da inserçao do mesmo comentario na pagina*/

      if (!mysqli_query($conn, $sql)) {
          die("Error: " . $sql . "<br>" . mysqli_error($conn));
      }
      else {
        $form_titulo = $form_texto = "";
        $msg = "texto salvo com sucesso!";
      }
    }
  }



    if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["acao"]) && isset($_GET["id"])) {
    $sql = "";

    $id = sanitize($_GET['id']);
    $id = mysqli_real_escape_string($conn, $id);

        if($_GET["acao"] == "remover"){
          $sql = "DELETE FROM textos  
                 WHERE id=" . $id;
        }

    if ($sql != "") {
      if(!mysqli_query($conn,$sql)){
        die("Problemas para executar ação no BD!<br>".
             mysqli_error($conn));
      }
    }
  }
} 
  $sql = "SELECT id, titulo, texto FROM textos";
  $textos = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<!DOCTYPE php>

<php lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog Colo De Deus</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <!--header-->
  <header class="" id="header">
      <div class="container">

    <div class="bg-color">
      <!--nav-->
      <nav class="nav navbar-default navbar-fixed-top" width="100%">
        <div class="container"  width="100%">
          <div class="col-md-12">
            <div class="navbar-header"  width="100%">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                            <span class="fa fa-bars"></span>
                        </button>
              <a href="index.php" class="navbar-brand">VOCE ESTA NO BLOG DA COLO DE DEUS</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="mynavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="http://localhost/ds120-trabalho-web/index.php">Home</a></li>
                <li><a href="form.php#cta-1">Contato</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!--/ nav-->
      <div class="container text-center">
        <div class="wrapper wow fadeInUp delay-05s">
          <h2 class="top-title">WELCOME TO BLOG</h2>
          <h3 class="title">COLO DE DEUS </h3>
            
            <a href="https://colodedeus.com.br"  target=“_blank” >  <button type="submit" class="btn btn-submit" >ACESSE NOSSO SITE</button></a>
        </div>
      </div>
    </div>
      </div>
  </header>
  <!--/ header-->
  <!---->
  <section id="cta-1">
    <div class="container">
      <div class="row">
        
          <style>
              .login {
                  text-align: center;
                  color: beige;
                  margin-left: 400px;
                  margin-right: 400px;
                  background-color: dimgrey;
                  
              }
              
              input{
                  color: black;
              }
              
              .texto{
                   text-align: justify;
                    margin-left: 300px;
                  display: none;
              }
               
              
          </style>
          
         <?php
          
         if(isset($_SESSION['usuario']) && isset($_SESSION['senha'])){
          
          ?>
                    <h1>  logado : <strong><?php echo $_SESSION['usuario']?></strong>  <br><a class="h1" href="login/logout.php"> Sair</a></h1>

          <style> 
              
            div.login  {
                  display: none;
              }
              .texto{
                   text-align: justify;
                    margin-left: 30px;
                  display: block;
                  color:black;
              }
              strong{
                color:black;
              }
              h1{
                  text-align: center;
                  color:black;
              }
             
          </style>          
          <?php } ?>
          <div class="login">
          <form method="post" action="login/login.php" name="entrar" enctype="multipart/form-data">
              <br>
            <label>usuário</label>
            <input type="text" name="usuario">
           <br><br> <label>senha</label>
            <input type="password" name="senha">
            <br>
            <button type="submit">Entrar</button>
        </form>

          </div>
        
        
        <br />
   
              <div class="texto">


        <?php if (!empty($msg)): ?>
        <? $msg ?>
      <?php endif; ?>

      <?php if (mysqli_num_rows($textos) > 0): ?>
        <?php while($texto = mysqli_fetch_assoc($textos)): ?>
                  
          <div class="textos" id="<?= $texto['id'] ?>">
            <h1><?= $texto['titulo'] ?></h1>
            <p class="texto"><?= $texto['texto'] ?></p>
              <a class="btn-remove-tarefa" href="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $texto['id'] . "&" . "acao=remover" ?>">
                    <button aria-label="Remover" class="btn btn-sm btn-danger" type="button">
                      <span class="glyphicon glyphicon-trash"></span>
                    </button>
                  </a>
          
                  </div>
        <?php endWhile; ?>
      <?php else: ?>
      <?php endIF; ?>
              
      <hr>
                  
                  
                  
        
      
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" name="texto">
        TITULO:<br>
        <input type="text" name="form_titulo" value="<?php echo $form_titulo ?>" placeholder="coloque um titulo aqui"><br>
        TEXTO:<br>
        <textarea name="form_texto" rows="8" cols="80" placeholder="Seu texto"><?php echo $form_texto?></textarea><br>
        <input type="submit" name="submit" value="Enviar">
      </form>
                  
    </div>
      </div>
    </div>
  </section>
  
  <footer class="" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 footer-copyright">
            All rights reserved
          <div class="credits">
            
            Designed by <a target="_blank" href="https://www.tads.ufpr.br"> Tads</a>
              
          </div>
            
        </div>
        <div class="col-sm-9 footer-social">
          <div class="pull-right hidden-xs hidden-sm">
            <br><br>
             <a target="_blank" href="https://www.facebook.com/colodedeus/"><i class="fa fa-facebook"></i></a>
            <a target="_blank" href="https://twitter.com/colodedeus"><i class="fa fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!---->
  <!--contact ends-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>

</body> 
</php>
