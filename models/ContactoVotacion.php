<?php
// require "Conexion.php";


// var_dump($mdb);
class ContactoVotacion extends Conexion
{


    public function ContactoVotacion()
    {
        parent::__construct();
    }

    public function inertarContactoVotacion($datos, $votante)
    {
        // var_dump($datos->checkBoxEnviar);
        // var_dump($datos['checkBoxEnviar']);
        // echo "<br></br>";
        // var_dump( $votante);
        $listaContactos = '';
        foreach ($datos->checkBoxEnviar as $medioComunica) {

            $listaContactos .= "('',".(int)$medioComunica."," .(int)$votante['id']  . "),";
        }
        $listaContactos = rtrim($listaContactos, ',');

      
                
        try {
            $consulta = $this->conexion_db->query(
                'INSERT INTO `contacto_votacion`(`id`, `id_medio_contacto`, `id_votante`) '."VALUES" .$listaContactos
            );
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
        return ($resultado);
    }

}