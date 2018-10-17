<?php
  require_once "../bd/db_connection.php";

  // sql to create table
  $sql = "CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha varchar(50) NOT NULL
  )";

  if (mysqli_query($conn, $sql)) {
      echo "Table usuario created successfully";
      $senha = md5("827ccb0eea8a706c4c34a16891f84e7b");
       $user = "insert into usuarios (id,usuario,senha) values('1','adm',". $senha .")";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }
  
  require_once "../bd/db_close_connection.php";

?>