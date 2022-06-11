<?php
    require_once "Connection.php";

    $db = new Connection();

    switch ($_GET['accion']) {
        case "CONSULTAR":
            $query = "SELECT * FROM Pelea";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_pelea' => $row['id_pelea'],
                        'fecha' => $row['fecha'],
                        'id_peleador1' => $row['id_peleador1'],
                        'id_peleador2' => $row['id_peleador2']
                    ];
                }
                echo json_encode($datos, JSON_NUMERIC_CHECK);
            }
            break;
        case "INSERTAR":
            $fecha = $_REQUEST['fecha'];
            $id_peleador1 = $_REQUEST['id_peleador1'];
            $id_peleador2 = $_REQUEST['id_peleador2'];

            $query = "INSERT INTO Pelea (fecha, id_peleador1, id_peleador2) VALUES ('$fecha', $id_peleador1, $id_peleador2)";
            $db->query($query);
            if($db->affected_rows) {
                echo'Pelea Guardada!';
                return;
            }
            echo "Error!";
            break;
        case "ACTUALIZAR":
            $id_pelea = $_REQUEST['id_pelea'];
            $fecha = $_REQUEST['fecha'];
            $id_peleador1 = $_REQUEST['id_peleador1'];
            $id_peleador2 = $_REQUEST['id_peleador2'];

            $query = "UPDATE Pelea SET fecha='$fecha', id_peleador1=$id_peleador1, id_peleador2=$id_peleador2 WHERE id_pelea=$id_pelea";
            $db->query($query);
            if($db->affected_rows) {
                echo "Se actualizó la pelea";
                return;
            }
            echo "Error!";
            break;
        case "ELIMINAR":
            $id_pelea = $_REQUEST['id_pelea'];

            $query = "DELETE FROM Pelea WHERE id_pelea=$id_pelea";
            $db->query($query);
            if($db->affected_rows) {
                echo 'Pelea Eliminada!';
                return;
            }
            echo "Error!";
            break;
        
        default:
            echo "ALGO SALIO MAL, ASEGURATE DE QUE EL PARAMETRO DE 'accion' TENGA UN VALOR CORRECTO";
            break;
    }
?>