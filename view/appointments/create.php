<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$courses = $db->all('courses');
$instructors = $db->all('instructors');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Appointments</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Appointments</a>
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
                <div class="form-head">Add Appointment</div>
                <form action="<?= $root . 'app/create.php?table=appointments' ?>" method="post">
                    <div class="input-field">
                        <label for="courseCode">Course code</label>
                        <select name="course_id" class="form-control" required="">
                            <option value=""></option>
                            <?php foreach($courses as $course): ?>
                                <option value="<?= $course['id'] ?>"><?= $course['code'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="semester">Semester</label>
                        <select name="semester" class="form-control" required="">
                            <option value=""></option>
                            <option value="first">first</option>
                            <option value="second">second</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="name">Level</label>
                        <select name="level" class="form-control" required="">
                            <option value=""></option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="instructorID">Instructor ID</label>
                        <select name="instructor_id" class="form-control" required="">
                            <option value=""></option>
                            <?php foreach($instructors as $instructor): ?>
                                <option value="<?= $instructor['id'] ?>"><?= $instructor['id'] ?></option>
                            <?php endforeach ?>
                        </select>
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