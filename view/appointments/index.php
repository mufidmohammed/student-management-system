<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$appointments = $db->all('appointments');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

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
                        <h3>All appointments</h3>
                    </div>

                    <table id="appointments-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course code</th>
                                <th>Semester</th>
                                <th>Level</th>
                                <th>Instructor ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($appointments as $appointment): ?>
                                <?php
                                    $course_code = $db->find('courses', $appointment['course_id'])['code'];
                                ?>
                            <tr>
                                <td><?= $appointment['id'] ?></td>
                                <td><?= $course_code ?></td>
                                <td><?= $appointment['semester'] ?></td>
                                <td><?= $appointment['level'] ?></td>
                                <td><?= $appointment['instructor_id'] ?></td>
                                <td>
                                    <div class="tabgroup">
                                        <span class="tab-item edit"><a href="edit.php?id=<?= $appointment['id'] ?>">Edit</a></span>
                                        <span class="tab-item delete"><a href="<?= $root . 'app/delete.php?table=appointments&id=' . $appointment['id'] ?>" onclick="return confirm('Are you sure you want to delete <?= $appointment['id'] ?>?')">Delete</a></span>
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
    $('#appointments-table').DataTable();
})
</script>