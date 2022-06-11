<?php
include('dbconnection.php');

$pdo = new Conexion();



if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['id_pais'])){
        $sql = $pdo->prepare("SELECT * FROM Pais WHERE id_pais = :id_pais");
        $sql->bindValue(':id_pais', $_GET['id_pais']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }else{
        $sql = $pdo->prepare("SELECT * FROM Pais");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $pdo->prepare("INSERT INTO Pais (id_pais, nombre, nacionalidad) VALUES (:id, :nombre, :nacionalidad)");
    $stmt->bindValue(':id', $_POST['id_pais']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->bindValue(':nacionalidad', $_POST['nacionalidad']);
    $stmt->execute();
    $id_post = $pdo -> lastInsertId();
    if ($id_post){
        header("HTTP/1.1 200 OK");
        echo json_encode($id_post);
        exit;
    }
}


if($_SERVER['REQUEST_METHOD'] == 'PUT'){
	$sql = "UPDATE Pais SET nombre=:nombre, nacionalidad=:nacionalidad WHERE id_pais=:id_pais";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':nombre', $_GET['nombre']);
	$stmt->bindValue(':nacionalidad', $_GET['nacionalidad']);
	$stmt->bindValue(':id_pais', $_GET['id_pais']);
	$stmt->execute();
	header("HTTP/1.1 200 Ok");
	exit;
}
    
    
    
    
if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $stmt = $pdo->prepare("DELETE FROM Pais WHERE id_pais=:id");
    $stmt -> bindValue(':id', $_GET['id_pais']);
    $stmt -> execute();
    header("HTTP/1.1 200 OK");
    exit;
}    
    
header("HTTP/1.1 400 Bad Request");
?>