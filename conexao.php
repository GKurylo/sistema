<?php

$username="alunosceep";
$password="Mariza2020@";

try {
  $conn = new PDO('mysql:host=localhost;dbname=alunosce_site', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>