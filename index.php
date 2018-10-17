<?php
  require_once "check\sanitize.php";
  require_once "bd\db_connection.php";

  $form_name = $form_comment = "";
  $msg = "";
   $comment ="";
    
    $sql1 = "SELECT id, titulo, texto,reg_date FROM textos ";
    $date = 'reg_date';
  $textos = mysqli_query($conn, $sql1);


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_name =  $_POST['form_name'];
    $form_comment = $_POST['form_comment'];

    if (empty($form_name) || empty($form_comment)) {
      $error = true;
    }
    else{
      $name = mysqli_real_escape_string($conn, sanitize($form_name));
      $comment = mysqli_real_escape_string($conn, sanitize($form_comment));

      $sql = "INSERT INTO Comments (name, comment)
      VALUES ('$name', '$comment')";
        header ("Location:http://localhost/ds120-trabalho-web/index.php"); /* Insere comentario na tabela e redireciona para index, impedindo repetição da inserçao do mesmo comentario na pagina*/

      if (!mysqli_query($conn, $sql)) {
          die("Error: " . $sql . "<br>" . mysqli_error($conn));
      }
      else {
        $form_name = $form_comment = "";
        $msg = "Comentário salvo com sucesso!";
      }
    }
  }



    if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["acao"]) && isset($_GET["id"])) {
    $sql = "";

    $id = sanitize($_GET['id']);
    $id = mysqli_real_escape_string($conn, $id);

   
    
        if($_GET["acao"] == "remover"){
          $sql = "DELETE FROM Comments  
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

 


  $sql = "SELECT id, name, comment FROM Comments";
  $comments = mysqli_query($conn, $sql);

 

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
      <nav class="nav navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                            <span class="fa fa-bars"></span>
                        </button>
              <a href="index.php" class="navbar-brand">VOCE ESTA NO BLOG DA COLO DE DEUS</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="mynavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#header">Home</a></li>
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
        <div class="cta-info text-center">
          <h3><span class="dec-tec">“</span>E ai! Bem vindo ao nosso blog!

Esse blog é uma troca de experiencias de vida real, diferente daquilo que nós estamos acostumados a ver na internet. Aqui partilhamos a vida, damos risadas e choramos juntos. Então fica a vontade, pegue um café e curta! O blog foi criado pela necessidade de expandir o nosso carisma devido à grande procura de amigos e interessados na comunidade em relação aquilo que vivemos e pregamos. #Vemcomagente!.<span class="dec-tec">”</span> -Brian Reed</h3>
        </div>
         
          <BR>
        <div class="texto">

          <?php if (!empty($msg)): ?>
        <? $msg ?>
      <?php endif; ?>

      <?php if (mysqli_num_rows($textos) > 0): ?>

        <?php while($texto = mysqli_fetch_assoc($textos)): ?>
     <div class="cta-info1">
        <div class="texto">

          <div class="textos" id="<?= $texto['id'] ?>">
            <h1> <?= $texto['titulo'] ?></h1>
            <p><?= $texto['texto'] ?></p>
            <h2><?= $texto['reg_date'] ?></h2>
            </div>

          
                  </div>
          </div><br>
        <?php endWhile; ?>
      <?php else: ?>
      <?php endIF; ?>
              
      <hr>
          
         
         
              </div>
           <div class="comments">
          <div class="caixa">
      <h3>Comentários</h3>

      <?php if (!empty($msg)): ?>
        <? $msg ?>
      <?php endif; ?>

      <?php if (mysqli_num_rows($comments) > 0): ?>
        <?php while($comment = mysqli_fetch_assoc($comments)): ?>
          <div class="comment" id="<?= $comment['id'] ?>">
            <h4 class="nome">De: <?= $comment['name'] ?></h4>
            <p class="com"><?= $comment['comment'] ?></p>
              <a class="btn-remove-tarefa" href="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $comment['id'] . "&" . "acao=remover" ?>">
                    <button aria-label="Remover" class="btn btn-sm btn-danger" type="button">
                      <span class="glyphicon glyphicon-trash"></span>
                    </button>
                  </a>
          </div>
        <?php endWhile; ?>
      <?php else: ?>
        Nenhum comentário enviado.
      <?php endIF; ?>
         </div>     
      <hr>

      <h3>Novo comentário</h3>
      <form class="postcoment" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        Nome:<br>
        <input type="text" name="form_name" value="<?php echo $form_name ?>" placeholder="Seu nome"><br>
        Comentário:<br>
        <textarea name="form_comment" rows="8" cols="80" placeholder="Seu comentário"><?php echo $form_comment?></textarea><br>
        <input type="submit" name="submit" value="Enviar">
      </form>
              </div></BR>   
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
