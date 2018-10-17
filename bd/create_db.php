<?php
  $servername = "localhost";
  $username = "root";
  $password = "123456";
  $dbname = "web";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password );
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Create database
  $sql = "CREATE DATABASE $dbname";
  if (mysqli_query($conn, $sql)) {
      echo "Database created successfully";
  } else {
      echo "Error creating database: " . mysqli_error($conn);
  }

  require_once "db_close_connection.php";
?>
