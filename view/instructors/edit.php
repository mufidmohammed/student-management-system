<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$id = htmlspecialchars($_GET['id']);

$db = new Database();

$instructor = $db->find('instructors', (int) $id);
?>

<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <!-- MAIN -->
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
                <div class="form-head">Update Instructor</div>
                <form action="<?= $root . 'app/edit.php?table=instructors&id=' . $id ?>" method="post">
                    <div class="input-field">
                        <label for="name">First name</label>
                        <input type="text" name="first_name" value="<?= $instructor['first_name'] ?>" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="name">Last name</label>
                        <input type="text" name="last_name" value="<?= $instructor['last_name'] ?>" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="name">Email</label>
                        <input type="email" name="email" value="<?= $instructor['email'] ?>" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="phoneNumber">Phone number</label>
                        <input type="number" name="phone_number" value="<?= $instructor['phone_number'] ?>" class="form-control" required="">
                    </div>
                    <div class="form-submit">
                        <button class="submit-button" role="submit">Update</button>
                    </div>
                </form>
            </div>

        </div>

    </main>
    <!-- MAIN -->

</section>

<?php include_once('../partials/footer.php') ?>