<?php
// require "Conexion.php";


// var_dump($mdb);
class Votacion extends Conexion
{


    public function Votacion()
    {
        parent::__construct();
    }

    public function insertarVotacion($datos, $votante)
    {

        try {
            $consulta = $this->conexion_db->query(
                'INSERT INTO `votacion`(`id`, `fecha`, `votante_id`, `candidato_id`) VALUES ("",CURDATE(),' . $votante['id'] . ',' . $datos->candidato . ')'
            );
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }



        return ($resultado);


    }

}