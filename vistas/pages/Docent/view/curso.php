<?php

$docent = ControladorDocente::ctrSeleccionarDocente_id();
//$materia = ControladorMateria::ctrSeleccionarMatclave();
//echo '<pre>'; print_r($docent); echo '</pre>';

?>


<div class="container-fluid">

    <div class="container py-5">

        <div class="posicion">

            <div class="login-box">

                <h2>Curso</h2>
                <form method="post">

                    <div class="user-box">

                        <input type="hidden" id="matclave" name="registroMatclave"
                            value="<?php echo $_SESSION["mat_clave"] ?>" placeholder="" required="">

                    </div>

                    <div class="user-box">

                        <input type="hidden" id="curiddoc" name="registroCuriddoc"
                            value="<?php echo $docent['doc_id']; ?>" placeholder="" required="">

                    </div>

                    <div class="input-group mb-3 ">
                        
                        <label class="bg-dark text-light input-group-text" >School Days</label>
                        <select class="bg-dark text-info form-select" name="registroSchooldays" required>
                            <option ></option>
                            <option value="Lunes-Jueves">Lunes y Jueves</option>
                            <option value="Martes-Viernes">Martes y Viernes</option>
                            <option value="Miercoles">Miercoles</option>
                        </select>
                        
                    </div>

                    <div class="input-group mb-3 ">
                        
                        <label class="bg-dark text-light input-group-text" >Class Hours</label>
                        <select class="bg-dark text-info form-select" name="registroClasshours" required>
                            <option ></option>
                            <option value="08-10am">08:00 - 10:00 am</option>
                            <option value="10-12am">10:00 - 12:00 am</option>
                            <option value="12-14pm">12:00 - 14:00 pm</option>
                            <option value="14-16pm">14:00 - 16:00 pm</option>
                            <option value="16-18pm">16:00 - 18:00 pm</option>
                        </select>

                    </div>

                    <?php

                    $registro = ControladorCurso::ctrRegistro();    

                    if($registro == "ok"){

                    //$_SESSION["materia"] = $_POST["registroMatclave"];

                    echo  '
                            <script>
                                if (window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href)
                                }
                            </script> ';
                            
                    echo '<div class="alert alert-success">Materia Registrada</div>';
                    
                    echo '  <script>
                                    setTimeout(() => {
                                    window.location = "index.php?docentView=vista";
                                    }, "1000");
                                </script>';
                    #==============================================================================
                    }
                
                    ?>

                    <button class="btn" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Create
                    </button>


                </form>

            </div>

        </div>

    </div>

</div>