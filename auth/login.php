<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    require_once('db_connect/connect.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT `password` FROM `admin` WHERE `email`='$email'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        $result = $query->fetch_assoc();
        $hash = $result['password'];
        if (password_verify($password, $hash))
        {
            $_SESSION['auth'] = true;
            $path = '../view/index.php';
            header("Location: $path");
        }
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
                <div class="input-field">
                <i class='bx bxs-envelope'></i>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="input-field">
                    <i class="bx bxs-key"></i>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="input-submit">
                    <input type="submit" value="Login" class="btn btn-primary btn-submit">
                </div>
            </form>
        </div>
    </div>

</body>

</html>