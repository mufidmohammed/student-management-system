<?php 

include_once('../partials/header.php');
include_once('../partials/sidebar.php');
require_once('../../app/validate.php');

$db = new Database();

$admin = $db->all('admin')[0];
$id = $admin['id'];

if (isset($_POST['general']))
{
    unset($_POST['general']);
    
    $data = array_map('sanitize', $_POST);

    $db->update('admin', $id, $data);

    header('Location: ./index.php');
}

if (isset($_POST['security']))
{
    $old_password = $_POST['old_password'];
    if (!password_verify($old_password, $admin['password']))
    {
        $password_error = "Wrong password";
    } else {
        if ($_POST['new_password'] == $_POST['confirm_password'])
        {
            $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $db->update('admin', $id, ['password' => $password]);
            $password_success = "Password changed successfully";
        } else {
            $password_error = 'Passwords do not match';
        }
    }
}

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
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="input-field">
                            <label for="name">First name</label>
                            <input type="text" name="first_name" value="<?= $admin['first_name'] ?>" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="name">Last name</label>
                            <input type="text" name="last_name" value="<?= $admin['last_name'] ?>" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="dateOfBirth">Date of birth</label>
                            <input type="date" name="date_of_birth" value="<?= $admin['date_of_birth'] ?>" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="gender">Gender:</label>
                            <input type="radio" name="gender" value="male" <?php if ($admin['gender'] == 'male') echo 'checked' ?> class="form-radio"> Male
                            <input type="radio" name="gender" value="female" <?php if ($admin['gender'] == 'female') echo 'checked' ?> class="form-radio"> Female
                        </div>
                        <div class="form-submit">
                            <input type="submit" name="general" value="save" class="submit-button">
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
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $admin['email'] ?>" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="phoneNumber">Phone number</label>
                            <input type="number" name="phone_number" value="<?= $admin['phone_number'] ?>" class="form-control" required="">
                        </div>
                        <div class="form-submit">
                        <input type="submit" name="general" value="save" class="submit-button">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- location information -->
        <div class="form-group">
            <div class="form-info">Location information</div>
            <div class="table-data">
                <div class="form-data">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="input-field">
                            <label for="address">Address</label>
                            <input type="address" name="address" value="<?= $admin['address'] ?>" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="city">City</label>
                            <input type="text" name="city" value="<?= $admin['city'] ?>" class="form-control" required="">
                        </div>
                        <div class="input-field">
                            <label for="region">Region</label>
                            <input type="text" name="region" value="<?= $admin['region'] ?>" class="form-control" required="">
                        </div>
                        <div class="form-submit">
                            <input type="submit" name="general" value="save" class="submit-button">
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
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <?php if (isset($password_error)) : ?>
                            <div style="background-color: red; color: white; padding: 10px 20px;">
                                <?= $password_error ?>
                            </div>
                        <?php elseif (isset($password_success)): ?>
                            <div style="background-color: lightgreen; color: white; padding: 10px 20px;"><?= $password_success ?></div>
                        <?php endif ?>
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
                            <input type="password" name="confirm_password" value="" class="form-control" required="">
                        </div>
                        <div class="form-submit">
                            <input type="submit" name="security" value="save" class="submit-button">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </main>
    <!-- MAIN -->

</section>

<?php include_once('../partials/footer.php') ?>