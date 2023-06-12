<?php

$docent = ControladorDocente::ctrSeleccionarDocente_id();
//echo '<pre>'; print_r($docent[0]); echo '</pre>';
$_SESSION["docent_id"] = $docent[0];

//$docentes = ControladorCurso::ctrSeleccionarRegistros('cur_doc_id', $docent[0]);
//echo '<pre style="color: #fff;">'; print_r($docentes); echo '</pre>';

$docentes = ControladorCurso::ctrSeleccionarCursosDocente();
//echo '<pre style="color: #fff;">'; print_r($docentes); echo '</pre>';

//index.php?pagina=editar&id=<?php echo $value["id"]; ? >

?>

<table class="table table-dark table-bordered border-primary">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Class Name</th>
      <th scope="col">School days</th>
      <th scope="col">Class time</th>
      <th scope="col" >Alumnos</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach ($docentes as $key => $value) : ?>

      <tr>
        <td><?php echo ($key + 1); ?></td>
        <td><?php echo $value["mat_nombre"]; ?></td>
        <td><?php echo $value["cur_dias_clase"]; ?></td>
        <td><?php echo $value["cur_horas_clase"]; ?></td>
        <td>

          <div class="btn-group">

            <div class="px-1">

              <a href="index.php?docentView=alumnos&cur_id=<?php echo $value["cur_id"]; ?>" class="btn btn-primary"><i class="fa-solid fa-eye" style="color: #fffff;"></i></a>

            </div>

          </div>

        </td>
      </tr>

    <?php endforeach ?>

  </tbody>

</table>