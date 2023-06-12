<?php

if (isset($_GET["id"])) {

    $item = "est_email";
    $valor = $_GET["id"];

    $estudiante = ControladorEstudiante::ctrSeleccionarRegistros($item, $valor);
    //echo '<pre>'; print_r($estudiante); echo '</pre>';
    $carrera = ControladorCarrera::ctrSeleccionarRegistros(null, null);

}

?>

<div>

    <form class="p-5 bg-light" method="post">
        <h5 class=" mb-4">Update your data</h5>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $estudiante["est_nombre"]; ?>" id="nombre"
                placeholder="Nombre" name="actualizarNombre">

            <label for="nombre">Name: </label>

        </div>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $estudiante["est_ap_pat"]; ?>" id="nombre"
                placeholder="Nombre" name="actualizarAppat">

            <label for="nombre">Apellido Paterno: </label>

        </div>

        <div class="form-floating mb-4">

            <input type="text" class="text-primary form-control" value="<?php echo $estudiante["est_ap_mat"]; ?>" id="nombre"
                placeholder="Nombre" name="actualizarApmat">

            <label for="nombre">Apellido Materno: </label>

        </div>

        <div class="form-floating mb-4">

            <select class="text-primary form-select" name="actualizarCarrera" required>
                <option value="<?php echo $estudiante['est_car_id'] ?>"><?php echo $estudiante['est_car_id']; ?></option>
                <option value="<?php echo $carrera[4]['car_iniciales']; ?>"><?php echo $carrera[4]['car_nombre_completo']; ?></option>
                <option value="<?php echo $carrera[3]['car_iniciales']; ?>"><?php echo $carrera[3]['car_nombre_completo']; ?></option>
                <option value="<?php echo $carrera[2]['car_iniciales']; ?>"><?php echo $carrera[2]['car_nombre_completo']; ?></option>
                <option value="<?php echo $carrera[1]['car_iniciales']; ?>"><?php echo $carrera[1]['car_nombre_completo']; ?></option>
                <option value="<?php echo $carrera[0]['car_iniciales']; ?>"><?php echo $carrera[0]['car_nombre_completo']; ?></option>
            </select>
            <label class="">Titulo Academico</label>
        </div>

        <div class="form-floating mb-4">

            <input type="email" class="text-primary form-control" value="<?php echo $estudiante["est_email"]; ?>" id="email"
                placeholder="name@example.com" name="actualizarEmail">
            <label for="email">Email address</label>

        </div>

        <div class="form-floating mb-4">

            <input type="password" class="text-primary form-control" id="password" placeholder="Password" name="actualizarPassword">
            <label for="password">Password</label>

            <input type="hidden" name="passwordActual" value="<?php echo $estudiante["est_password"]; ?>">
            <input type="hidden" name="estudianteId" value="<?php echo $estudiante["est_id"]; ?>">

        </div>

        <?php

        $actualizar = ControladorEstudiante::ctrActualizarEstudiante();

        if ($actualizar == "ok") {
            echo '  <script> if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
            echo '<div class="alert alert-primary">EL Docente ha sido actualizado</div>';
            echo '  <script>
                    window.location = "index.php?studentView=vista";
                </script>';
            
        }

        ?>


        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>

    </form>

</div>