<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$id = htmlspecialchars($_GET['id']);

$db = new Database();

$course = $db->find('courses', $id);

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
                        <a class="active" href="#">edit</a>
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
                <div class="form-head">Update Course</div>
                <form action="<?= $root . 'app/edit.php?table=courses&id=' . $id ?>" method="post">
                    <div class="input-field">
                        <label for="name">Course name</label>
                        <input type="text" name="name" value="<?= $course['name'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Course code</label>
                        <input type="text" name="code" value="<?= $course['code'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="creditHours">Credit hours</label>
                        <input type="number" name="credit_hours" value="<?= $course['credit_hours'] ?>" class="form-control">
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