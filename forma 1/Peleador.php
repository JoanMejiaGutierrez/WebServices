<?php
    require_once "Connection.php";

    $db = new Connection();

    switch ($_GET['accion']) {
        case "CONSULTAR":
            $query = "SELECT * FROM Peleador";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_peleador' => $row['id_peleador'],
                        'nombre' => $row['nombre'],
                        'altura' => $row['altura'],
                        'edad' => $row['edad'],
                        'victorias' => $row['victorias'],
                        'derrotas' => $row['derrotas'],
                        'kos' => $row['kos'],
                        'id_pais' => $row['id_pais'],
                        'id_academia' => $row['id_academia'],
                        
                    ];
                }
               echo json_encode($datos, JSON_NUMERIC_CHECK);
            }
            break;
        case "INSERTAR":
            $nombre = $_REQUEST['nombre']; 
            $altura = $_REQUEST['altura'];
            $edad = $_REQUEST['edad'];
            $victorias = $_REQUEST['victorias'];
            $derrotas = $_REQUEST['derrotas'];
            $kos = $_REQUEST['kos'];
            $id_pais= $_REQUEST['id_pais'];
            $id_academia = $_REQUEST['id_academia'];
        
            $query = "INSERT INTO Peleador (nombre, altura, edad, victorias, derrotas, kos, id_pais, id_academia) 
            VALUES('$nombre', $altura, $edad, $victorias, $derrotas, $kos, $id_pais, $id_academia)";
            $db->query($query);
            if($db->affected_rows) {
                echo 'DATOS GUARDADOS CORRECTAMENTE!.';
                return;
            }
            echo 'Error!';
            break;
        case "ACTUALIZAR":
            $id_peleador = $_REQUEST['id_peleador']; 
            $nombre = $_REQUEST['nombre']; 
            $altura = $_REQUEST['altura'];
            $edad = $_REQUEST['edad'];
            $victorias = $_REQUEST['victorias'];
            $derrotas = $_REQUEST['derrotas'];
            $kos = $_REQUEST['kos'];
            $id_pais= $_REQUEST['id_pais'];
            $id_academia = $_REQUEST['id_academia'];
        
            $query = "UPDATE Peleador SET nombre='$nombre', altura=$altura, edad=$edad, victorias=$victorias, 
            derrotas=$derrotas, kos=$kos, id_pais=$id_pais, id_academia=$id_academia WHERE id_peleador=$id_peleador";
            $db->query($query);
            if($db->affected_rows) {
                echo 'DATOS ACTUALIZADOS CORRECTAMENTE!.';
                return;
            }
            echo 'Error!';
            break;
        case "ELIMINAR":
            $id_peleador = $_REQUEST['id_peleador'];

            $query = "DELETE FROM Peleador WHERE id_peleador=$id_peleador";
            $db->query($query);
            if($db->affected_rows) {
               echo 'Se eliminó correctamente!.';
               return;
            }
            else{
                echo 'Error al Eliminar!.';
            }
            break;
        
        default:
            echo "ALGO SALIO MAL, ASEGURATE DE QUE EL PARAMETRO DE 'accion' TENGA UN VALOR CORRECTO";
            break;
    }
?>