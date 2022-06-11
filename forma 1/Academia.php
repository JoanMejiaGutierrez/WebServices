<?php
    require_once "Connection.php";

    $db = new Connection();

    switch ($_GET['accion']) {
        case "CONSULTAR":
            $query = "SELECT * FROM Academia";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                    'id_academia' => $row['id_academia'],
                    'nombre' => $row['nombre'],
                    'telefono' => (string) $row['telefono'],
                    'id_pais' => $row['id_pais']];
                }
                    echo json_encode($datos, JSON_NUMERIC_CHECK);
            }
            break;
        case "INSERTAR":
            $nombre = $_REQUEST['nombre']; 
            $telefono = $_REQUEST['telefono'];
            $id_pais = $_REQUEST['id_pais'];

            $query = "INSERT INTO Academia (nombre, telefono, id_pais) VALUES('$nombre','$telefono', $id_pais)";
            $db->query($query);
            if($db->affected_rows) {
                echo 'DATOS GUARDADOS CORRECTAMENTE!.';
                return;
            }
            echo 'Error!';
            break;
        case "ACTUALIZAR":
            $id_academia = $_REQUEST['id_academia']; 
            $nombre = $_REQUEST['nombre']; 
            $telefono = $_REQUEST['telefono'];
            $id_pais = $_REQUEST['id_pais'];
        
            $query = "UPDATE Academia SET nombre='$nombre', telefono='$telefono', id_pais=$id_pais WHERE id_academia=$id_academia";
            $db->query($query);
            if($db->affected_rows) {
                echo 'DATOS ACTUALIZADOS CORRECTAMENTE!.';
                return;
            }
            echo 'Error!';
            break;
        case "ELIMINAR":
            $id_academia = $_REQUEST['id_academia'];

            $query = "DELETE FROM Academia WHERE id_academia=$id_academia";
            $db->query($query);
            if($db->affected_rows) {
               echo 'Se elimino correctamente!.';
               return;
            }
             echo 'Error al Eliminar!.';
            break;
        
        default:
            echo "ALGO SALIO MAL, ASEGURATE DE QUE EL PARAMETRO DE 'accion' TENGA UN VALOR CORRECTO";
            break;
    }
?>