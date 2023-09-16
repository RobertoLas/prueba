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
                `votante`(`id`, `rut`, `nombre_completo`, `alias`, `email`, `comuna_id`) 
                
                VALUES ("",'."'".$datos->rut."'".','."'".$datos->nombre."'".','."'".$datos->alias."'".','."'".$datos->email."'".','.$datos->id_comuna.')'
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
            $sql = 'SELECT `id`, `rut`, `nombre_completo`, `alias`, `email` FROM `votante` WHERE rut = :rutIngresado';
            $stmt = $this->conexion_db->prepare($sql);
            $stmt->bindParam(':rutIngresado', $datos->rut, PDO::PARAM_INT);
            $stmt->execute();   

            // Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($resultados);
            



        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }


        return ($resultados);


    }

}