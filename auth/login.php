<?php

session_start();

require_once('../app/database.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $database = new Database();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($database->verify_admin($email, $password))
    {
        $_SESSION['auth'] = true;
        header("Location: ../view/index.php");
    } else {
        $errors['login'] = "Incorrect email or password";
    }
    
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>

<body>

    <div class="container">
        <div class="form-box">
            <h1>Login</h1>
            <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="error">
                    <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="input-field">
                <i class='bx bxs-envelope'></i>
                    <input type="email" name="email" placeholder="Email" class="form-control" required="">
                </div>
                <div class="input-field">
                    <i class="bx bxs-key"></i>
                    <input type="password" name="password" placeholder="Password" class="form-control" required="">
                </div>
                <div class="input-submit">
                    <input type="submit" value="Login" class="btn btn-primary btn-submit">
                </div>
            </form>
        </div>
    </div>

</body>

</html>