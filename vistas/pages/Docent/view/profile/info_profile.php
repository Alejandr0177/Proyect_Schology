<?php

if (isset($_GET["id"])) {

    $item = "doc_email";
    $valor = $_GET["id"];

    $docente = ControladorDocente::ctrSeleccionarRegistros($item, $valor);
    //echo '<pre>'; print_r($estudiante); echo '</pre>';
    $carrera = ControladorCarrera::ctrSeleccionarRegistros(null, null);

}

?>

<div>

    <form class="p-5 bg-light" method="post">
        <h5 class=" mb-4">Your Profile</h5>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $docente["doc_nombre"]; ?>"
                id="nombre" placeholder="Nombre" name="actualizarNombre" readonly>

            <label for="nombre">Name: </label>

        </div>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $docente["doc_ap_pat"]; ?>"
                id="nombre" placeholder="Nombre" name="actualizarAppat" readonly>

            <label for="nombre">Apellido Paterno: </label>

        </div>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $docente["doc_ap_mat"]; ?>"
                id="nombre" placeholder="Nombre" name="actualizarApmat" readonly>

            <label for="nombre">Apellido Materno: </label>

        </div>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $docente['doc_titulo_acad']; ?>"
                id="titulo" placeholder="Titulo" name="mostrarTitulo" readonly>
            <label class="">Titulo Academico</label>
        </div>

        <div class="form-floating mb-4">

            <input type="email" class="text-primary form-control" value="<?php echo $docente["doc_email"]; ?>"
                id="email" placeholder="name@example.com" name="actualizarEmail" readonly>
            <label for="email">Email address</label>

        </div>

        <?php

        $actualizar = ControladorDocente::ctrActualizarDocente();

        if ($actualizar == "ok") {
            echo '  <script> if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
            echo '<div class="alert alert-primary">EL Docente ha sido actualizado</div>';
            echo '  <script>
                    window.location = "index.php?docentView=vista";
                </script>';
            
        }

        ?>
        
        <button type="submit" class="btn btn-outline-primary">Update</button>


    </form>

</div>