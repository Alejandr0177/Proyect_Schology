<?php

session_start();


if (isset($_GET["studentLogin"])) {

    include "pages/Student/student_login.php";

}
else if (isset($_GET["docentLogin"])) {

    include "pages/Docent/docent_login.php";

}
else if (isset($_GET["docentView"])) {

    include "pages/Docent/docentView.php";

}
else if (isset($_GET["studentView"])) {

    include "pages/Student/studentView.php";

}
else if (isset($_GET["homPage"])) {

    include "pages/homePage.php";

}

else {

    include "pages/homePage.php";
}

?>