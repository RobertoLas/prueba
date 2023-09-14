<?php
// require "Conexion.php";


// var_dump($mdb);
class Candidato extends Conexion
{
    private $id;
    private $nombreCompleto;
    public function setId($valor)
    {
        $this->id = $valor;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setNombreCompleto($valor)
    {
        $this->nombreCompleto = $valor;
    }
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    public function Candidato()
    {
        parent::__construct();
    }

    public function getCandidatos()
    {

        try {
            $sql = 'SELECT * FROM candidato';
            $stmt = $this->conexion_db->prepare($sql);
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $objetos = [];
            foreach ($resultados as $candidato) {
                $oCandidato = new Candidato();
                $oCandidato->setId($candidato['id']);
                $oCandidato->setNombreCompleto($candidato['nombre_completo']);
                array_push($objetos, $oCandidato);

            }
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }





        return ($objetos);


    }

    public function getCandidatosUnico($datos)
    {

        try {
            $consulta = $this->conexion_db->query('SELECT * FROM candidato WHERE id=' . $datos->id);
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }



        return ($resultado);


    }

}