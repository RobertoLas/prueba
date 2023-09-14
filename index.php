<?php

// include_once 'conexion.php';
// llamada al controlador que contiene la logica

include_once 'controlador.php';

 


// $sql_leer = 'SELECT * from candidato';

// // $gsent = $mdb->prepare($sql_leer);

// $gsent->execute();

// $resultado = $gsent->fetchAll();

// var_dump($resultado);

// echo ("<br></br>");
// echo ("<br></br>");
// echo ("<br></br>");



include_once 'styles/formulario.php';
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>


    <div class="container">

        <h2>FORMULARIO DE VOTACIÓN:</h2>

        <form class="formulario" id="form" action="index.php" method="POST" onsubmit="procesarFormulario(event)">

            <div class="form-group">
                <label for="nombre_apellido">Nombre y Apellido:</label>
                <input type="text" id="nombre_apellido" name="nombre_apellido">
            </div>
            <div class="form-group">
                <label for="alias">Alias:</label>
                <input type="text" id="alias" name="alias">
            </div>

            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" id="rut" name="rut">
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="id_region">Region:</label>
                <input type="hidden" name="id_region_change" id="id_region_change">
                <select id="id_region" name="id_region" onchange="enviarSeleccionado(this.value)">

                    <?php

                    foreach ($regiones as $region) {
                        ?>
                        <option <?php

                        if (isset($_POST['id_region'])) {
                            echo $_POST['id_region'] == $region->getId() ? "selected" : "";
                        } else {
                            echo "Entro";
                            // echo $region->getId() ==1  ? "selected" : "";
                        }
                        ;
                        ?>
                            value="<?php echo $region->getId() ?>"><?php echo $region->getNombre() ?></option>
                        <?php
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="comuna">Comuna:</label>
                <select id="id_comuna" name="id_comuna">
                    <?php
                    if (isset($comunas)) {

                        foreach ($comunas as $comuna) {
                            ?>
                            <option value="<?php echo $comuna->getId() ?>"><?php echo $comuna->getNombre() ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="candidato">Candidato:</label>
                <select id="candidato" name="candidato">

                    <?php
                    // var_dump($candidatos);
                    if (isset($candidatos)) {


                        foreach ($candidatos as $candidato) {
                            ?>
                            <option value="<?php echo $candidato->getId() ?>"><?php echo $candidato->getNombreCompleto() ?></option>
                            <?php
                        }
                    }
                    ?>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div id="cheboxs">
                <label for="medio_comunica">Como se entero de Nosotros:</label>
                <?php

                // var_dump($medio_comunicas);
                
                if (isset($medio_comunica)) {


                    foreach ($medio_comunica as $medio) {
                        ?>

                        <?php echo $medio->getDescripcion() ?>
                        <input type="checkbox" value="<?php echo $medio->getId() ?> " name="<?php echo $medio->getId() ?> ">


                        <?php
                    }
                }
                ?>

            </div>


            <div class="form-group">
                <br></br>
                <button type="submit">votar</button>
            </div>


        </form>

    </div>
    <?php
    include 'tools/funciones.php';

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</body>

</html>






<?php


?>