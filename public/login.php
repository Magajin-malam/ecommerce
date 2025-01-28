<?php
session_start();
require __DIR__ . '/include/connect.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);



        $_SESSION['aid'] = $row['aid'];



        header("Location: profile.php");
        exit();

    }
    else
    {
         echo "<script> alert('Wrong credentials') </script>";
    }
}

require __DIR__ . '/include/header.php';
?>
<body>
    <?php require __DIR__ . '/include/header.php'; ?>
    <form method="post" id="form">
        <h3 style="color: darkred; margin: auto"></h3>
        <input class="input1" id="user" name="username" type="text" placeholder="Username *">
        <input class="input1" id="pass" name="password" type="password" placeholder="Password *">
        <button type="submit" class="btn" name="submit">login</button>

    </form>

    <div class="sign">
        <a href="signup.php" class="signn">Do not have an account?</a>
    </div>
  <?php include __DIR__ . '/include/footer.php' ?>
