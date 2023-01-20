<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$enrollments = $db->all('enrollments');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

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
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="create.php" class="btn-download">
                <i class='bx bxs-folder-plus'></i>
                <span class="text">Add</span>
            </a>
        </div>
        <div class="table-data">
            <div class="ls-tables">
                <div class="order">
                    <div class="head">
                        <h3>All enrollments</h3>
                    </div>

                    <table id="enrollments-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Course Code</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($enrollments as $enrollment): ?>
                            <?php
                                $course_code = $db->find('courses', $enrollment['course_id'])['code'];
                            ?>
                            <tr>
                                <td><?= $enrollment['id'] ?></td>
                                <td><?= $enrollment['student_id'] ?></td>
                                <td><?= $course_code ?></td>
                                <td><?= $enrollment['grade'] ?></td>
                                <td>
                                    <div class="tabgroup">
                                        <span class="tab-item edit"><a href="edit.php?id=<?= $enrollment['id'] ?>">Edit</a></span>
                                        <span class="tab-item delete"><a href="<?= $root . 'app/delete.php?table=enrollments&id=' . $enrollment['id'] ?>" onclick="return confirm('Are you sure you want to delete <?= $enrollment['id'] ?>?')">Delete</a></span>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

</section>

<?php include_once('../partials/footer.php') ?>

<script>
$(document).ready(function() {
    $('#enrollments-table').DataTable();
})
</script>