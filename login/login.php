<?php 
require 'conn.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$result = $conn->query('SELECT * FROM usuarios WHERE usuario = "' . $usuario . '" AND senha = "' . md5($senha) . '" limit 1');


if($result->num_rows > 0){
    session_start();
        
} else {
    header('Location: ../adm.php');
    exit();
}

while($row = $result->fetch_assoc()){
    $_SESSION = [
        'usuario' => $row['usuario'],
        'senha' => $row['senha']
    ];
}

header('Location: post.php');
header('Location: ../adm.php');

exit();