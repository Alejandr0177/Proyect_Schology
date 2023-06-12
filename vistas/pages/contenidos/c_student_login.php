<?php if (isset($_GET["studentLogin"])): ?>

    <?php if ($_GET["studentLogin"] == 'student_login'): ?>

        <li class="nav-item">

                <a href="index.php?studentLogin=sign_up" class="btn btn-outline-primary">Sign Up</a>

        </li>

        <li class="nav-item">

            <a href="index.php?studentLogin=login" class="nav-link active">Log In</a>

        </li>

        <li class="nav-item">

                <a href="index.php?homePage" class="btn btn-outline-primary">Go back</a>

        </li>

    <?php else: ?>

        <?php if ($_GET["studentLogin"] == 'sign_up'): ?>

            <li class="nav-item">

                <a href="index.php?studentLogin=sign_up" class="nav-link active">Sign Up</a>

            </li>

        <?php else: ?>

            <li class="nav-item">

                <a href="index.php?studentLogin=sign_up" class="btn btn-outline-primary">Sign Up</a>

            </li>

        <?php endif ?>

        <?php if ($_GET["studentLogin"] == 'login'): ?>

            <li class="nav-item">

                <a href="index.php?studentLogin=login" class="nav-link active">Log In</a>

            </li>

        <?php else: ?>

            <li class="nav-item">

                <a href="index.php?studentLogin=login" class="btn btn-outline-primary">Log In</a>

            </li>

        <?php endif ?>

        <?php if ($_GET["studentLogin"] == 'salir'): ?>

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