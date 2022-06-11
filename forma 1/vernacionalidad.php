<?php
require_once "Connection.php";
{
    $method= $_SERVER['REQUEST_METHOD'] == "POST";

    $id_peleador=$_REQUEST['id_peleador'];

        $db = new Connection();
        $query = "SELECT Pais.Nombre, Pais.nacionalidad
        FROM Peleador
        JOIN Pais ON (Peleador.id_pais = Pais.id_pais)
        WHERE id_peleador = $id_peleador";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    
                    'Nombre' => $row['Nombre'],
                    'nacionalidad' => $row['nacionalidad']
                ];
                //return $datos;
            }//end while
           // return $datos;
           
           echo json_encode($datos);
        }//end if
        return $datos;
    }
   


?>