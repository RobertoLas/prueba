<?php
// require "Conexion.php";


// var_dump($mdb);
class Region extends Conexion
{
    private $id;
    private $nombre;


    public function setId($valor)
    {
        $this->id = $valor;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setNombre($valor)
    {   
        $this->nombre = $valor;
    }
    public function getNombre()
    {
        return $this->nombre;
    }



    public function Region()
    {
        parent::__construct();
    }

    public function getRegiones()
    {
        try {
            $sql = 'SELECT * FROM regiones';
            // Preparar la declaración SQL
            $stmt = $this->conexion_db->prepare($sql);


            // Ejecutar la consulta
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $objetos = [];
            foreach ($resultados as $region) {
                $oRegion = new Region();
                $oRegion->setId($region['id']);
                $oRegion->setNombre($region['region']);
                array_push($objetos, $oRegion);

            }


        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }



        return $objetos;


    }

}