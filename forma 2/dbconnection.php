<?php
class Conexion extends PDO{
    // Nombre Archivo <dbconnection.php>
    private $hostBd = 'localhost';
    private $usuarioBd = 'id19009478_joan';
    private $passwordBd = 'Tdb@123@tdb@';
    private $nombreBd = 'id19009478_torneobox';
    
    
    public function __construct()
    {
        try{
            parent:: __construct('mysql:host=' . $this->hostBd . ';dbname=' . $this-> nombreBd . ';charset=utf8', $this->usuarioBd, $this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(PDOException $e){
            echo 'Se encontro un Error: ' . $e.getMessage();
            exit;
        }
        
    }
}