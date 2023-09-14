<?php
// require "Conexion.php";


// var_dump($mdb);
class Medio_comunica extends Conexion
{
    private $id;
    private $descripcion;
    public function setId($valor)
    {
        $this->id = $valor;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setDescripcion($valor)
    {   
        $this->descripcion = $valor;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function Medio_comunica()
    {
        parent::__construct();
    }

    public function getMedio_comunica()
    {
        

        try {
            $sql = 'SELECT * FROM medio_contacto';
            $stmt = $this->conexion_db->prepare($sql);
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $objetos = [];
            foreach ($resultados as $medio_comunica) {
                $oCandidato = new Medio_comunica();
                $oCandidato->setId($medio_comunica['id']);
                $oCandidato->setDescripcion($medio_comunica['descripcion']);
                array_push($objetos, $oCandidato);

            }
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }





        return ($objetos);


    }

}