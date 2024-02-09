<?php
require_once("config-url.php");
require_once("admin-functions/error-handlers.php");

if (isset($_SERVER["admin_username"])) {
    header("Location: " . BASE_URL . "admin.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Admin Login</title>
    <link href="css/selection.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="admin-navbar">
        <img src="images/ball.png" alt="soccer ball">
        <h1>
            Admin Login
        </h1>
    </nav>

    <div class="admin-login-form">
        <form method="post" action="admin-functions/admin-login.php">
            <h1>Login</h1>
            <center>
                <h3 class="text-start">Enter Username</h3>
                <input name="username" type="text" class="form-control" placeholder="Please Enter In A Username">
                <h3 class="text-start">Enter Password</h3>
                <input name="pwd" type="password" class="form-control" placeholder="Please Enter In A Password">
            </center>
            <button type="submit" class="btn btn-primary">
                <h4>Login</h3>
            </button>
        </form>
    </div>


    <script src="<?php echo BASE_URL ?>js/admin.js"></script>

</body>

</html>