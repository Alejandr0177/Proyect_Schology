<?php if (isset($_GET["pagina"])): ?>

<?php else: ?>

    <li class="nav-item">

        <a href="index.php?studentLogin=student_login" class="btn btn-outline-primary">student</a>

    </li>

    <li class="nav-item">

        <a href="index.php?docentLogin=docent_login" class="btn btn-outline-primary">Docent</a>

    </li>

    </li>

<?php endif ?>