<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$courses = $db->all('courses');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

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
                        <h3>All courses</h3>
                    </div>

                    <table id="courses-table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Credit hours</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($courses as $course): ?>
                            <tr>
                                <td><?= $course['code'] ?></td>
                                <td><?= $course['name'] ?></td>
                                <td><?= $course['credit_hours'] ?></td>
                                <td>
                                    <div class="tabgroup">
                                        <span class="tab-item edit"><a
                                                href="edit.php?id=<?= $course['id'] ?>">Edit</a></span>
                                        <span class="tab-item delete">
                                            <a href="<?= $root . 'app/delete.php?table=courses&id=' . $course['id'] ?>" onclick="return confirm('Are you sure you want to delete <?= $course['code'] ?>?')">Delete</a>
                                        </span>

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
    $('#courses-table').DataTable();
})
</script>