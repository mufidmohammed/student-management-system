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
                <h1>Students</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Students</a>
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
                <div class="form-head">Add New Student</div>
                <form action="<?= $root . 'app/create.php?table=students' ?>" method="post">
                    <div class="input-field">
                        <label for="name">First name</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Last name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Phone number</label>
                        <input type="number" name="phone_number" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="level">Level</label>
                        <select name="level" class="form-control">
                            <option value=""></option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="dateOfBirth">Date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="male" class="form-radio"> Male
                        <input type="radio" name="gender" value="female" class="form-radio"> Female
                    </div>
                    <div class="input-field">
                        <label for="name">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="region">Region</label>
                        <input type="text" name="region" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="registrationDate">Date of registration</label>
                        <input type="date" name="registration_date" class="form-control">
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