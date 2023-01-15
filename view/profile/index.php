<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');

?>
<style>
#content main .form-group {
    display: flex;
    justify-content: space-between;
    align-items: top;
}

.form-group .form-info {
    margin-top: 50px;
    margin-left: 25px;
    color: var(--dark);
}
</style>
<section id="content">
    <?php include_once('../partials/navbar.php') ?>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Profile</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Profile</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="../index.php" class="btn-download">
                <i class='bx bxs-chevron-left'></i>
                <span class="text">Back</span>
            </a>
        </div>

        <!-- Personal Information -->
        <div class="form-group">
            <div class="form-info">Personal Information</div>
            <div class="table-data">
                <div class="form-data">
                    <form action="" method="post">
                        <div class="input-field">
                            <label for="name">First name</label>
                            <input type="text" name="first_name" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="name">Last name</label>
                            <input type="text" name="last_name" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="dateOfBirth">Date of birth</label>
                            <input type="date" name="date_of_birth" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="gender">Gender:</label>
                            <input type="radio" name="gender" value="male" class="form-radio"> Male
                            <input type="radio" name="gender" value="female" class="form-radio"> Female
                        </div>
                        <div class="form-submit">
                            <button class="submit-button" role="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- contact information -->
        <div class="form-group">
            <div class="form-info">Contact Information</div>
            <div class="table-data">
                <div class="form-data">
                    <form action="" method="post">
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="phoneNumber">Phone number</label>
                            <input type="number" name="phone_number" value="" class="form-control" required="">
                        </div>
                        <div class="form-submit">
                            <button class="submit-button" role="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- location information -->
        <div class="form-group">
            <div class="form-info">Contact Information</div>
            <div class="table-data">
                <div class="form-data">
                    <form action="" method="post">
                        <div class="input-field">
                            <label for="address">Address</label>
                            <input type="address" name="address" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="city">City</label>
                            <input type="text" name="city" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="region">Region</label>
                            <input type="text" name="region" value="" class="form-control" required="">
                        </div>
                        <div class="form-submit">
                            <button class="submit-button" role="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <div class="form-info">Change password</div>
            <div class="table-data">
                <div class="form-data">
                    <form action="" method="post">
                        <div class="input-field">
                            <label for="oldPassword">Old password</label>
                            <input type="text" name="old_password" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="newPassword">New password</label>
                            <input type="password" name="new_password" value="" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="confirmPassword">Confirm password</label>
                            <input type="text" name="confirm_password" value="" class="form-control" required="">
                        </div>
                        <div class="form-submit">
                            <button class="submit-button" role="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </main>
    <!-- MAIN -->

</section>

<?php include_once('../partials/footer.php') ?>