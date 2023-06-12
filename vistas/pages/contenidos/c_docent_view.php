<?php if (isset($_GET["docentView"])): ?>

<?php if ($_GET["docentView"] == 'docent_view'): ?>

    <li class="nav-item">

        <a href="index.php?docentView=vista" class="nav-link active">Courses</a>

    </li>

    <li class="nav-item">

            <a href="index.php?docentView=create_course" class="btn btn-outline-primary">Create Course</a>

    </li>

    <li class="nav-item">

        <a href="index.php?docentView=edit_data" class="btn btn-outline-primary">Edit Data</a>

    </li>

    <li class="nav-item">

            <a href="index.php?docentView=logout" class="btn btn-outline-primary">Logout</a>

    </li>

<?php else: ?>

    <?php if ($_GET["docentView"] == 'vista'): ?>

        <li class="nav-item">

            <a href="index.php?docentView=vista" class="nav-link active">Courses</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?docentView=vista" class="btn btn-outline-primary">Courses</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["docentView"] == 'create_course'): ?>

        <li class="nav-item">

            <a href="index.php?docentView=create_course" class="nav-link active">Create Course</a>

        </li>
    
    <?php elseif ($_GET["docentView"] == 'curso'): ?>

        <li class="nav-item">

            <a href="index.php?docentView=create_course" class="nav-link active">Create Course</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?docentView=create_course" class="btn btn-outline-primary">Create Course</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["docentView"] == 'edit_data'): ?>

        <li class="nav-item">

            <a href="index.php?docentView=edit_data" class="nav-link active">Edit data</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?docentView=edit_data" class="btn btn-outline-primary">Edit data</a>

        </li>

    <?php endif ?>

    <?php if ($_GET["docentView"] == 'logout'): ?>

        <li class="nav-item">

            <a href="index.php?docentView=logout" class="nav-link active">Logout</a>

        </li>

    <?php else: ?>

        <li class="nav-item">

            <a href="index.php?docentView=logout" class="btn btn-outline-primary">Logout</a>

        </li>

    <?php endif ?>

<?php endif ?>

<?php endif ?>