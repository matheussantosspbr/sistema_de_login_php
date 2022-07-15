<?php

$endereco = 'ec2-3-223-169-166.compute-1.amazonaws.com ';
$dbName = 'd6ndpp6l17glfl';
$dbUser = 'yugerrmdrrfdve';
$senha = '031d604c6024e0a8ad765cb6fbb9e433963fb7f33ee1090111ec081993250603';

try {
  $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$dbName", $dbUser, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  //echo "conectado";
} catch (PDOException $e) {

  //echo "Disconected <br/>";
  //die($e->getMessage());
}
