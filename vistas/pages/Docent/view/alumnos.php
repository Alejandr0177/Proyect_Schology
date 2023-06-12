<?php

    if(isset($_GET["cur_id"])){

        $item = "ins_cur_id";
        $valor = $_GET["cur_id"];

        $usuario = ControladorCurso::ctrSeleccionarAlumnosDocente($item, $valor);
        //echo '<pre>'; print_r($usuario); echo '</pre>';

    }

?>

<h3 class="text-center text-light py-3">Alumnos Registrados</h3>

<a style="float: right" href="index.php?docentView=vista" class="btn btn-primary"><i class="fa-solid fa-arrow-left" style="color: #fffff;"></i> Regresar</a>

<table class="table table-dark table-bordered border-primary">

  <thead>
    <tr>
      <th scope="col">Nua</th>
      <th scope="col">Student Name</th>
      <th scope="col">Carrera</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach ($usuario as $key => $value) : ?>

      <tr>
        <td><?php echo $value["est_id"]; ?></td>
        <td><?php echo $value["nombre_estudiante"]; ?></td>
        <td><?php echo $value["car_nombre_completo"]; ?></td>
      </tr>

    <?php endforeach ?>

  </tbody>

</table>