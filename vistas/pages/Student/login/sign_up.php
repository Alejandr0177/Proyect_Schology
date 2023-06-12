<?php


$carrera = ControladorCarrera::ctrSeleccionarRegistros(null, null);
//echo '<pre>'; print_r($carrera); echo '</pre>';
?>

<div class="container-fluid">

    <div class="container py-2">

        <div class="posicion">

            <div class="login-box">

                <h2>Sign In</h2>
                <form method="post">

                    <div class="user-box">

                        <input type="text" id="nombre" name="registroNombre" required>
                        <label>Name</label>

                    </div>

                    <div class="user-box">

                        <input type="text" id="appat" name="registroAppat" required>
                        <label>Apellido Paterno</label>

                    </div>

                    <div class="user-box">

                        <input type="text" id="apmat" name="registroApmat" required>
                        <label>Apellido Materno</label>

                    </div>

                    <div class="input-group mb-3 ">
                        <label class="bg-dark text-light input-group-text" >Carrera</label>
                        <select class="bg-dark text-info form-select" name="registroCarrera" required>
                            <option ></option>
                            <option value="<?php echo $carrera[4]['car_iniciales']; ?>"><?php echo $carrera[4]['car_nombre_completo']; ?></option>
                            <option value="<?php echo $carrera[3]['car_iniciales']; ?>"><?php echo $carrera[3]['car_nombre_completo']; ?></option>
                            <option value="<?php echo $carrera[2]['car_iniciales']; ?>"><?php echo $carrera[2]['car_nombre_completo']; ?></option>
                            <option value="<?php echo $carrera[1]['car_iniciales']; ?>"><?php echo $carrera[1]['car_nombre_completo']; ?></option>
                            <option value="<?php echo $carrera[0]['car_iniciales']; ?>"><?php echo $carrera[0]['car_nombre_completo']; ?></option>
                        </select>
                    </div>

                    <div class="user-box">

                        <input type="text" id="nua" name="registroNua" required>
                        <label>Nua</label>

                    </div>


                    <div class="user-box">

                        <input type="text" id="email" name="registroEmail" placeholder="            email@ugto.mx"
                            required>
                        <label>Email</label>

                    </div>

                    <div class="user-box">

                        <input type="password" id="password" name="registroPassword" required>
                        <label>Password</label>

                    </div>

                    <?php

                    $registro = ControladorEstudiante::ctrRegistro();

                    if ($registro == "ok") {

                        echo '
                            <script>
                                if (window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href)
                                }
                            </script> ';

                        echo '<div class="alert alert-success">EL usuario ha sido registrado</div>';

                        echo '  <script>
                                    setTimeout(() => {
                                    window.location = "index.php?studentLogin=login";
                                    }, "1100");
                                </script>';
                        #==============================================================================
                    }

                    ?>

                    <button class="btn" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Submit
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>