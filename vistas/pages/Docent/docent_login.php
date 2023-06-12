<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="vistas/css/front.css" />
    <link type="text/css" rel="stylesheet" href="vistas/css/ingreso.css" />

    <title>Schology</title>
</head>

<body>

    <!--================================================================
    Logotipo
    ====================================================================-->

    <div class="container-fluid Schology">

        <h3 class="text-center text-light py-3">Docent</h3>

    </div>

    <!--================================================================
    Botonera
    ====================================================================-->

<div class="container-fluid">

<div class="container">

    <ul class="nav nav-justified py-2 nav-pills">

        <?php
        include "vistas/pages/contenidos/c_docent_login.php";
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

    if (isset($_GET["docentLogin"])) {

        if ($_GET["docentLogin"] == "sign_up" || $_GET["docentLogin"] == "login"){

            include "login/" . $_GET["docentLogin"] . ".php";

        } else {
            include "login/login.php";
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