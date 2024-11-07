<?php
$host = 'localhost';
$task = 'root';
$senha = '';
$banco = 'todo';

$conn = mysqli_connect($host, $task, $senha, $banco) or die('Não foi possível conectar');

?>