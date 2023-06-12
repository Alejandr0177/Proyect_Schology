<?php

$student = ControladorEstudiante::ctrSeleccionarStudent_id();
//echo '<pre>'; print_r($docent[0]); echo '</pre>';
$_SESSION["student_id"] = $student[0];

$cursos = ControladorCurso::ctrSeleccionarCursosEstudiante();
//echo '<pre style="color: #fff;">'; print_r($docentes); echo '</pre>';

?>

<div class="row">

    <?php foreach ($cursos as $key => $value): ?>

        <div class="col-sm mb-5">

            <div class="card bg-dark" style="width: 22rem; color: #fff;">
            
                <img src="https://static.mercadonegro.pe/wp-content/uploads/2020/10/15171525/cursos-virtuales.jpg"
                    class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title text-center">
                        <?php echo $value["mat_nombre"]; ?>
                    </h5>

                    <p class="card-text text-center">Docente: <br>
                        <?php echo $value["nombre_docente"]; ?>
                    </p>

                    <p class="card-text text-center">Horario: <br>
                        <?php echo $value["cur_dias_clase"] ?> de
                        <?php echo $value["cur_horas_clase"]; ?>
                    </p>

                    <form method="post">

                        <input type="hidden" value="<?php print_r($student[0]); ?>" name="registroIdstudent">
                        <input type="hidden" value="<?php echo $value["cur_id"]; ?>" name="registroIdcourse">

                        <?php

                        $registro = ControladorInscripcion::ctrRegistro();

                        if ($registro == "ok") {

                            echo '  <script>
                                            window.location = "index.php?studentView=vista";
                                        </script>';
                        }

                        ?>

                        <button type="submit" class="btn btn-danger" style="float: right;"> Unsubscribe   
                            <i class="fa-solid fa-user-xmark" style="color: #fffff;"></i>
                        </button>

                    </form>

                </div>

            </div>
        </div>

    <?php endforeach ?>

</div>

<!-- <table class="table table-dark table-bordered border-primary">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Class Name</th>
      <th scope="col">School days</th>
      <th scope="col">Class time</th>
      <th scope="col" >Acceder</th>
    </tr>
  </thead>

  <tbody>

  <?php foreach ($cursos as $key => $value) : ?>

<tr>
  <td><?php echo ($key + 1); ?></td>
  <td><?php echo $value["mat_nombre"]; ?></td>
  <td><?php echo $value["cur_dias_clase"]; ?></td>
  <td><?php echo $value["cur_horas_clase"]; ?></td>
  <td>

    <div class="btn-group">

      <div class="px-1">

        <a href="" class="btn btn-primary"><i class="fa-solid fa-eye" style="color: #fffff;"></i></a>

      </div>

    </div>

  </td>
</tr>

<?php endforeach ?>

</tbody>

</table> -->