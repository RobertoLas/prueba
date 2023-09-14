<?php

require "Conexion.php";
include_once 'models/Region.php';
include_once 'models/Comuna.php';
include_once 'models/Candidato.php';
include_once 'models/Medio_comunica.php';
include_once 'models/Votante.php';
include_once 'models/ContactoVotacion.php';
include_once 'models/Votacion.php';



$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData);
if(isset($data)){
    // var_dump($data);
    $oVotante = new Votante();
    $oContactoVotacion = new ContactoVotacion();
    $votante = $oVotante->getVotante($data);
 
    if(count($votante)>0){
        echo "el votante  ya existe";

    }else{

        $oVotante->crearVotante($data);
        $votanteCreado = $oVotante->getVotante($data)[0];
        $oContactoVotacion->inertarContactoVotacion($data,$votanteCreado);
        $oVotacion = new Votacion();
        $oVotacion->insertarVotacion($data,$votanteCreado);
     
      
        
        echo "Votacion completa";
    }
    
}


$Oregiones = new Region();
$regiones = $Oregiones->getRegiones();

$Ocomunas = new Comuna();
$comunas = $Ocomunas->getComunas($regiones[0]->getId());


$Ocandidato = new Candidato();
$candidatos = $Ocandidato->getCandidatos();



$OmedioComunica = new Medio_comunica();
$medio_comunica = $OmedioComunica->getMedio_comunica();


if (isset($_POST["id_region_change"])) {
    // var_dump($_POST);
    $returnvar = $Ocomunas->getComunas($_POST["id_region_change"]);
    
    $listaReturn = [];
    // foreach($returnvar as $comunas){
            
    //     $datos = {

    //     }
    // }

    $jsonData = json_encode( $returnvar);
    
    return print_r($jsonData) ;
}

if (isset($_POST["id_region_change"])) {
    // var_dump($_POST);
    $returnvar = $Ocomunas->getComunas($_POST["id_region_change"]);

    $jsonData = json_encode($returnvar);

    return print_r($jsonData) ;
}














?>