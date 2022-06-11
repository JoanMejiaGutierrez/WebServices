<?php
    require_once "models/Cliente.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id_pais'])) {
                echo json_encode(Pais::getWhere($_GET['id_pais']));
            }//end if
            else {
                echo json_encode(Pais::getAll());
            }//end else
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Pais::insert($datos->id_pais, $datos->nombre, $datos->nacionalidad)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Pais::update($datos->id_pais, $datos->nombre, $datos->nacionalidad)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;
        case 'DELETE':
            if(isset($_GET['id_pais'])){
                if(Pais::delete($_GET['id_pais'])) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if 
            else {
                http_response_code(405);
            }//end else
            break;
        
        default:
            http_response_code(405);
            break;
    }//end while