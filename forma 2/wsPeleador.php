<?php
include('dbconnection.php');

$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql = $pdo->prepare("SELECT * FROM Peleador");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll());
    exit;
}
?>