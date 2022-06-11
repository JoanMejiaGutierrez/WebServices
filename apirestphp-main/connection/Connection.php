<?php

    class Connection extends Mysqli {
        function __construct() {
            //parent::__construct('localhost', 'root', '', 'api_rest');
            parent::__construct('localhost', 'id19009478_joan', 'Tdb@123@tdb@', 'id19009478_torneobox');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Conexión exítosa a la DB' : die('Error al conectarse a la BD');
        }//end __construct
    }//end class Connection