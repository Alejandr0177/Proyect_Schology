<?php if (isset($_GET["studentView"])): ?>

<?php if ($_GET["studentView"] == 'student_view'): ?>

    <li class="nav-item">

        <a href="index.php?studentView=vista" class="nav-link active">Courses</a>

    </li>

    <li class="nav-item">

            <a href="index.php?studentView=signup_course" class="btn btn-outline-primary">SignUp Course</a>

    </li>

    <li class="nav-item">

        <a href="index.php?studentView=edit_data" class="btn btn-outline-primary">Edit Data</a>

    </li>

    <li class="nav-item">

            <a href="index.php?studentView=logout" class="btn btn-outline-primary">Logout</a>

    </li>

<?php else: ?>

    <?php if ($_GET["studentView"] == 'vista'): ?>

        <li class="nav-item">

            <a href="index.php?studentView=vista" class="nav-link active">Courses</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?studentView=vista" class="btn btn-outline-primary">Courses</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["studentView"] == 'signup_course'): ?>

        <li class="nav-item">

            <a href="index.php?studentView=signup_course" class="nav-link active">SignUp Course</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?studentView=signup_course" class="btn btn-outline-primary">SignUp Course</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["studentView"] == 'edit_data'): ?>

        <li class="nav-item">

            <a href="index.php?studentView=edit_data" class="nav-link active">Edit data</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?studentView=edit_data" class="btn btn-outline-primary">Edit data</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["studentView"] == 'logout'): ?>

        <li class="nav-item">

            <a href="index.php?studentView=logout" class="nav-link active">Logout</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?studentView=logout" class="btn btn-outline-primary">Logout</a>

        </li>

    <?php endif ?>

<?php endif ?>

<?php endif ?>