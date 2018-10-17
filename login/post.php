<?php require 'verifica.php';?>

<html>
    <head>
        <title>Post</title>
    </head>
    
    <body>
        Estou logado como <strong><?php echo $_SESSION['usuario']?></strong>
        
        
        <br />
        
      
        <a href="logout.php">Sair</a>
    </body>
</html>