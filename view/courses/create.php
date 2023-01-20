<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

if ($_SERVER['REQUEST_METHOD' == 'POST'])
{
    $db = new Database();
    $db->insert('courses', $_POST);
}

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Courses</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Courses</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">add</a>
                    </li>
                </ul>
            </div>
            <a href="index.php" class="btn-download">
                <i class='bx bxs-chevron-left'></i>
                <span class="text">Back</span>
            </a>
        </div>


        <div class="table-data">
            <div class="form-data">
                <div class="form-head">Add New Course</div>
                <form action="<?= $root . 'app/create.php?table=courses' ?>" method="post">
                    <div class="input-field">
                        <label for="name">Course name</label>
                        <input type="text" name="name" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="name">Course code</label>
                        <input type="text" name="code" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="creditHours">Credit hours</label>
                        <input type="number" name="credit_hours" class="form-control" required="">
                    </div>
                    <div class="form-submit">
                        <button class="submit-button" role="submit">Add</button>
                    </div>
                </form>
            </div>

        </div>

    </main>
    <!-- MAIN -->

</section>

<?php include_once('../partials/footer.php') ?>