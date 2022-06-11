<?php
    require_once "Connection.php";

    $db = new Connection();

    switch ($_GET['accion']) {
        case "CONSULTAR":
            $query = "SELECT * FROM Pais";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_pais' => $row['id_pais'],
                        'nombre' => $row['nombre'],
                        'nacionalidad' => $row['nacionalidad']
                    ];
                }
                echo json_encode($datos, JSON_NUMERIC_CHECK);
            }
            break;
        case "INSERTAR":
            echo "NO ESTA HABILITADA LA INSERCCION PARA PAIS";
            break;
        case "ACTUALIZAR":
            echo "NO ESTA HABILITA LA ACTUALIZACION PARA PAIS";
            break;
        case "ELIMINAR":
            echo "NO ESTA HABILITADA LA ELIMINACION PARA PAIS";
            break;
        
        default:
            echo "ALGO SALIO MAL, ASEGURATE DE QUE EL PARAMETRO DE 'accion' TENGA UN VALOR CORRECTO";
            break;
    }
?>