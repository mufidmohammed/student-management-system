<?php include_once('partials/header.php') ?>

<?php include_once('partials/sidebar.php') ?>

<?php

$db = new Database();

$enrollments = $db->all('enrollments');

uasort($enrollments, function($a, $b) {
    return $b['grade'] <=> $a['grade'];
});

?>

<!-- CONTENT -->
<section id="content">

    <?php include_once('partials/navbar.php') ?>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-id-card'></i>
                <span class="text">
                    <h3><?= $db->count('students') ?></h3>
                    <p>Students</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?= $db->count('instructors') ?></h3>
                    <p>Instructors</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-data'></i>
                <span class="text">
                    <h3><?= $db->count('courses') ?></h3>
                    <p>Courses</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-folder-open'></i>
                <span class="text">
                    <h3><?= $db->count('enrollments') ?></h3>
                    <p>Enrollments</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-id-card'></i>
                <span class="text">
                    <h3><?= $db->count('appointments') ?></h3>
                    <p>Appointments</p>
                </span>
            </li>
            
        </ul>

        <div class="table-data">
            <div class="ls-tables">
                <div class="head">
                    <h3>All Students</h3>
                </div>
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Course Code</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($enrollments as $enrollment): ?>
                        <?php
                            $course_code = $db->find('courses', $enrollment['course_id'])['code'];
                        ?>
                        <tr>
                            <td><?= $enrollment['id'] ?></td>
                            <td><?= $course_code ?></td>
                            <td><?= $enrollment['grade'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<?php include_once('partials/footer.php') ?>

<script>
$(document).ready(function() {
    $('#students-table').DataTable();
})
</script>