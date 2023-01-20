<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

$id = htmlspecialchars($_GET['id']);

$db = new Database();

$student = $db->find('students', (int) $id);

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
                        <a class="active" href="#">edit</a>
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
                <div class="form-head">Update Student</div>
                <form action="<?= $root . 'app/edit.php?table=students&id=' . $id ?>" method="post">
                    <div class="input-field">
                        <label for="name">First name</label>
                        <input type="text" name="first_name" value="<?= $student['first_name'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Last name</label>
                        <input type="text" name="last_name" value="<?= $student['last_name'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Email</label>
                        <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="name">Phone number</label>
                        <input type="number" name="phone_number" value="<?= $student['phone_number'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="level">Level</label>
                        <select name="level" class="form-control">
                            <option <?php if ($student['level'] == '100') echo "selected" ?> value="100">100</option>
                            <option <?php if ($student['level'] == '200') echo "selected" ?> value="200">200</option>
                            <option <?php if ($student['level'] == '300') echo "selected" ?> value="300">300</option>
                            <option <?php if ($student['level'] == '400') echo "selected" ?> value="400">400</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="dateOfBirth">Date of birth</label>
                        <input type="date" name="date_of_birth" value="<?= $student['date_of_birth'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="male" class="form-radio" <?php if ($student['gender'] == 'male') echo "checked" ?>> Male
                        <input type="radio" name="gender" value="female" class="form-radio" <?php if ($student['gender'] == 'female') echo "checked" ?>> Female
                    </div>
                    <div class="input-field">
                        <label for="name">Address</label>
                        <input type="text" name="address" value="<?= $student['address'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="city">City</label>
                        <input type="text" name="city" value="<?= $student['city'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="region">Region</label>
                        <input type="text" name="region" value="<?= $student['region'] ?>" class="form-control">
                    </div>
                    <div class="input-field">
                        <label for="registrationDate">Date of registration</label>
                        <input type="date" name="registration_date" value="<?= $student['registration_date'] ?>" class="form-control">
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