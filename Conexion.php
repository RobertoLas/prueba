<?php

require("config.php");


class Conexion
{
// clase conexion la cual llama a config que tiene los valores de la base de datos 

    protected $conexion_db;



    public function __construct()
    {

        $this->conectar();



    }
    private function conectar() {
        try {
            $this->conexion_db = new PDO(LINK, USUARIO, PASS);
            // Configura opciones adicionales si es necesario
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion_db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
    }


}