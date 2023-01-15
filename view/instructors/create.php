<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

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
                <div class="form-head">Add Instructor</div>
                <form action="" method="post">
                    <div class="input-field">
                        <label for="name">First name</label>
                        <input type="text" name="first_name" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="name">Last name</label>
                        <input type="text" name="last_name" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" required="">
                    </div>
                    <div class="input-field">
                        <label for="phoneNumber">Phone number</label>
                        <input type="number" name="phone_number" class="form-control" required="">
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