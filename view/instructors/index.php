<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$db = new Database();

$instructors = $db->all('instructors');

?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Instructors</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Instructors</a>
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
                        <h3>All instructors</h3>
                    </div>

                    <table id="instructors-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>First name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($instructors as $instructor): ?>
                            <tr>
                                <td><?= $instructor['id'] ?></td>
                                <td><?= $instructor['first_name'] ?></td>
                                <td><?= $instructor['last_name'] ?></td>
                                <td><?= $instructor['email'] ?></td>
                                <td><?= $instructor['phone_number'] ?></td>
                                <td>
                                    <div class="tabgroup">
                                        <span class="tab-item edit"><a href="edit.php?id=<?= $instructor['id'] ?>">Edit</a></span>
                                        <span class="tab-item delete"><a href="<?= $root . 'app/delete.php?table=instructors&id=' . $instructor['id'] ?>" onclick="return confirm('Are you sure you want to delete instructor <?= $instructor['id'] ?>?')">Delete</a></span>
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
    $('#instructors-table').DataTable();
})
</script>