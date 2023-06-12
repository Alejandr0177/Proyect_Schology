<?php

if (!isset($_SESSION["validarIngreso"])) {

    echo '<script>window.location = "index.php?docentLogin=login";</script>';
    return;
} else {

    if ($_SESSION["validarIngreso"] != "ok") {

        echo '<script>window.location = "index.php?docentLogin=login";</script>';

        return;

    }
}

$docent = ControladorDocente::ctrSeleccionarDocente_id();
//echo '<pre>'; print_r($docent[0]); echo '</pre>';


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/3f24b6446a.js" crossorigin="anonymous"></script>


    <link type="text/css" rel="stylesheet" href="vistas/css/front.css" />
    <link type="text/css" rel="stylesheet" href="vistas/css/create_curs.css" />

    <title>Schology</title>
</head>

<body>

    <!--================================================================
    Logotipo
    ====================================================================-->

    <div class="container-fluid Schology">
        <h3 class="text-center text-light py-3">Docent
        <ul style="float: right" class="nav justify-content-end"><?php print_r($docent[1])?>&emsp;
                <li>
                    <a class="dropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false"> 
                        <i class="fa-solid fa-user" style="color: #fff"></i><i class="fa-solid fa-chevron-down fa-2xs" style="color: #ffffff;"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?docentView=info_profile&id=<?php print_r($_SESSION["docent_email"])?> "><i class="fa-solid fa-circle-info" style="color: #0040ff;"></i> Your profile</a></li>
                        <li><a class="dropdown-item" href="index.php?docentView=edit_profile&id=<?php print_r($_SESSION["docent_email"])?> "><i class="fa-solid fa-pencil" style="color: #0040ff;"></i> Edit</a></li>
                        <li><a class="dropdown-item" href="index.php?docentView=logout"><i class="fa-solid fa-right-from-bracket" style="color: #0040ff;"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </h3>


    </div>

    <!--================================================================
    Botonera
    ====================================================================-->

    <div class="container-fluid">

        <div class="container">

            <ul class="nav nav-justified py-2 nav-pills">

                <?php
                include "vistas/pages/contenidos/c_docent_view.php";
                ?>

            </ul>

        </div>

    </div>

    <!--================================================================
Botonera
====================================================================-->

    <div class="container-fluid">

        <div class="container py-5">

            <?php

            if (isset($_GET["docentView"])) {

                if (
                    $_GET["docentView"] == "vista" ||
                    $_GET["docentView"] == "create_course" ||
                    $_GET["docentView"] == "edit_data" ||
                    $_GET["docentView"] == "curso" ||
                    $_GET["docentView"] == "materias" ||
                    $_GET["docentView"] == "alumnos" ||
                    $_GET["docentView"] == "logout"
                ){

                    include "view/" . $_GET["docentView"] . ".php";

                }
                elseif ($_GET["docentView"] == "edit_profile" || $_GET["docentView"] == "info_profile") {

                    include "view/profile/" . $_GET["docentView"] . ".php";
                    
                }
                else {

                    include "view/vista.php";

                }
            }

            ?>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>