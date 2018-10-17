<?php
  require("check\check_form.php");
  require("check\sanitize.php");
?>
    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Blog Colo De Deus</title>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="valida_form.js"></script>
 <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- =======================================================
    Theme Name: Bethany
    Theme URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#cta-1">Contato</a></li>
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
      
          
    <div class="form" >
            <h3 class="cont-title">Contacte-nos:</h3>
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <div class="contact-info">
                
                 <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$erro): ?>
          <div class="alert alert-success">
            Obrigado seu dados foram recebidos.
            <ul>
              <?php // limpa o formulário.
                  $nome = "";
                  $email ="";
                  $text = "";
                  
              ?>
            </ul>
          </div>
        <?php else: ?>
          <div class="alert alert-danger">
            Erros no formulário.
          </div>
        <?php endif; ?>
      <?php endif; ?>

               <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="form-group <?php if(!empty($erro_nome)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input  type="text" class="form-control" name="nome" placeholder="Nome" value="<?php $nome; ?>">
            <div id="erro-nome">
              
              </div>
              
            <?php if (!empty($erro_nome)): ?>
              <span class="help-block"><?php echo $erro_nome ?></span>
            <?php endIf; ?>
          </div>
        </div>
          
          <div class="form-group <?php if(!empty($erro_email)){echo "has-error";}?>">
          <label for="inputsenha" class="col-sm-2 control-label">email</label>
          <div class="col-sm-10">
            <input  type="email" class="form-control" name="email" placeholder="email@ufpr.com" value="<?php $email; ?>">
            <div id="erro-email">

            </div>
            <?php if (!empty($erro_email)): ?>
              <span class="help-block"><?php echo $erro_email ?></span>
            <?php endIf; ?>
          </div>
        </div>
          
          <div class="form-group <?php if(!empty($erro_text)){echo "has-error";}?>">
          <label for="inputdata" class="col-sm-2 control-label">mensagem</label>
          <div class="col-sm-10">
              <textarea  type="text" class="form-control" name="texto" placeholder="digite sua mensagem" value="<?php $text; ?>"></textarea>
            <div id="erro-text">

            </div>
             <?php if (!empty($erro_text)): ?>
              <span class="help-block"><?php echo $erro_text ?></span>
            <?php endIf; ?>
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
          </div>
        </div>
      </form>
            </div>

          </div>

        </div>
      </div>
    
  </section>
  <!---->

  <!---->
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
</html>
