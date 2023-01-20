<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$students = $db->all('students');
$courses = $db->all('courses');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Enrollments</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Enrollments</a>
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
                <div class="form-head">New Enrollment</div>
                <form action="<?= $root . 'app/create.php?table=enrollments' ?>" method="post">
                    <div class="input-field">
                        <label for="studentID">Student ID</label>
                        <select name="student_id" class="form-control">
                            <option value=""></option>
                            <?php foreach($students as $student): ?>
                                <option value="<?= $student['id'] ?>"><?= $student['id'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="studentID">Course Code</label>
                        <select name="course_id" class="form-control">
                            <option value=""></option>
                            <?php foreach($courses as $course): ?>
                                <option value="<?= $course['id'] ?>"><?= $course['code'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="grade">Grade</label>
                        <input type="number" step="0.01" name="grade" class="form-control">
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