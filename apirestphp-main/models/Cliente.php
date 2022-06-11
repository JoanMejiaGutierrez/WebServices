<?php
    require_once "connection/Connection.php";

    class Pais {

        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM Pais";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_pais' => $row['id_pais'],
                        'nombre' => $row['nombre'],
                        'nacionalidad' => $row['nacionalidad']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function getWhere($id_pais) {
            $db = new Connection();
            $query = "SELECT *FROM Pais WHERE id_pais=$id_pais";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_pais' => $row['id_pais'],
                        'nombre' => $row['nombre'],
                        'nacionalidad' => $row['nacionalidad']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($id_pais, $nombre, $nacionalidad) {
            $db = new Connection();
            $query = "INSERT INTO Pais (id_pais, nombre, nacionalidad)
            VALUES($id_pais, '".$nombre."', '".$nacionalidad."')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_pais, $nombre, $nacionalidad) {
            $db = new Connection();
            $query = "UPDATE Pais SET nombre='".$nombre."', nacionalidad='".$nacionalidad."' WHERE id_pais=$id_pais";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_pais) {
            $db = new Connection();
            $query = "DELETE FROM Pais WHERE id_pais=$id_pais";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Cliente
