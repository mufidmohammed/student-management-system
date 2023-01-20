<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$students = $db->all('students');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Students</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Students</a>
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
                        <h3>All Students</h3>
                    </div>

                    <table id="students-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($students as $student): ?>
                            <tr>
                                <td><?= $student['id'] ?></td>
                                <td><?= $student['first_name'] ?></td>
                                <td><?= $student['last_name'] ?></td>
                                <td><?= $student['email'] ?></td>
                                <td><?= $student['gender'] ?></td>
                                <td><?= $student['level'] ?></td>
                                <td>
                                    <div class="tabgroup">
                                        <span class="tab-item edit"><a href="edit.php?id=<?= $student['id'] ?>">Edit</a></span>
                                        <span class="tab-item delete"><a href="<?= $root . 'app/delete.php?table=students&id=' . $student['id'] ?>" onclick="return confirm('Are you sure you want to delete <?= $student['id'] ?>?')">Delete</a></span>
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
    $('#students-table').DataTable();
})
</script>