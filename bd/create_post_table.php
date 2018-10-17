<?php
  require_once "db_connection.php";

  // sql to create table
  $sql = "CREATE TABLE textos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    texto TEXT NOT NULL,
    reg_date TIMESTAMP

  )";

  if (mysqli_query($conn, $sql)) {
      echo "Table textos created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }

  require_once "db_close_connection.php";
?>