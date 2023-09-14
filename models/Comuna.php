<?php
// require "Conexion.php";

// var_dump($mdb);
class Comuna extends Conexion implements JsonSerializable
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

    public function Comuna()
    {
        parent::__construct();
    }

    public function jsonSerialize()
    {
        return ['id' => $this->getId(), 'nombre' => $this->getNombre()];
    }



    public function getComunas($codigoRegion)
    {

        try {
            $sql = 'SELECT comunas.id, comunas.comuna 
            FROM comunas
            INNER JOIN provincias ON (provincias.id = comunas.provincia_id)
            INNER JOIN regiones ON (provincias.region_id = regiones.id)
            WHERE regiones.id = :codigoRegion';
            $stmt = $this->conexion_db->prepare($sql);
            $stmt->bindParam(':codigoRegion', $codigoRegion, PDO::PARAM_INT);
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $objetos = [];
            foreach ($resultados as $comuna) {
                $oComuna = new Comuna();
                $oComuna->setId($comuna['id']);
                $oComuna->setNombre($comuna['comuna']);
                array_push($objetos, $oComuna);

            }



        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }



        return ($objetos);


    }

}