<?php

$materias = ControladorMateria::ctrSeleccionarRegistros(null, null);
//echo '<pre style="color: #fff;">'; print_r($materias); echo '</pre>';

?>

<h3 class="text-center text-light py-3">Seleccionar Materia</h3>

<table class="table table-dark table-bordered border-primary">

  <thead>
    <tr>
      <th scope="col">CLAVE</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach ($materias as $key => $value) : ?>

      <tr>
        <td><?php echo $value["mat_clave"]; ?></td>
        <td><?php echo $value["mat_nombre"]; ?></td>

        <td>

            <form method="post">

              <input type="hidden" value="<?php echo $value["mat_clave"]; ?>" name="registroMatclave">
              <input type="hidden" value="<?php echo $value["mat_nombre"]; ?>" name="registroMatname">
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus" style="color: #fffff;"></i></button>

              <?php

                    $registro = ControladorMateria::ctrSeleccionarMateria();    

                    if($registro == "ok"){

                    $_SESSION["mat_clave"] = $_POST["registroMatclave"];
                                                
                    echo '  <script>
                                    window.location = "index.php?docentView=curso";
                                </script>';
                    #==============================================================================
                    }
                
                    ?>

            </form>

          </div>

        </td>

      </tr>

      

    <?php endforeach ?>

  </tbody>

</table>