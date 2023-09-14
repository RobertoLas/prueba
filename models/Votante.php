<?php
// require "Conexion.php";


// var_dump($mdb);
class Votante extends Conexion
{


    public function Votante()
    {
        parent::__construct();
    }

    public function crearVotante($datos)
    {
        try {
            
            $consulta = $this->conexion_db->query(
                'INSERT INTO 
                `votante`(`id`, `rut`, `nombre_completo`, `alias`, `email`, `region`, `comuna`) 
                
                VALUES ("",'."'".$datos->rut."'".','."'".$datos->nombre."'".','."'".$datos->alias."'".','."'".$datos->email."'".','.$datos->id_region.','.$datos->id_comuna.')'
            );
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }



        return ($resultado);


    }

    public function getVotante($datos)
    {
        try {
          
            $consulta = $this->conexion_db->query(
                'SELECT `id`, `rut`, `nombre_completo`, `alias`, `email`, `region`, `comuna` FROM `votante` WHERE rut = '."'".$datos->rut."'"
            );
            
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }


        // var_dump($resultado);
        return ($resultado);


    }

}