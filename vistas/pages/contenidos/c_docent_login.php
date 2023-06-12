<?php if (isset($_GET["docentLogin"])): ?>

<?php if ($_GET["docentLogin"] == 'docentLogin_login'): ?>

    <li class="nav-item">

            <a href="index.php?docentLogin=sign_up" class="btn btn-outline-primary">Sign Up</a>

    </li>

    <li class="nav-item">

        <a href="index.php?docentLogin=login" class="nav-link active">Log In</a>

    </li>

    <li class="nav-item">

            <a href="index.php?homePage" class="btn btn-outline-primary">Go back</a>

    </li>

<?php else: ?>

    <?php if ($_GET["docentLogin"] == 'sign_up'): ?>

        <li class="nav-item">

            <a href="index.php?docentLogin=sign_up" class="nav-link active">Sign Up</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?docentLogin=sign_up" class="btn btn-outline-primary">Sign Up</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["docentLogin"] == 'login'): ?>

        <li class="nav-item">

            <a href="index.php?docentLogin=login" class="nav-link active">Log In</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?docentLogin=login" class="btn btn-outline-primary">Log In</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["docentLogin"] == 'salir'): ?>

        <li class="nav-item">

            <a href="index.php?homePage" class="nav-link active">Go back</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?homePage" class="btn btn-outline-primary">Go back</a>

        </li>

    <?php endif ?>

<?php endif ?>

<?php endif ?>