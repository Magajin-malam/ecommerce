<?php
session_start();
require __DIR__ . '/include/connect.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == "admin1") {
        
        $query = "select * from accounts where username='$username' and password='$password'";
        $result = mysqli_query($con, $query);
        
        
        if (mysqli_num_rows($result) > 0) {
            echo "<script> window.open('inventory.php', '_blank') </script>";
            
            
        } else {
            echo "<script> alert('Wrong credentials') </script>";
        }
        
    } else {
        echo "<script> alert('Wrong credentials') </script>";
    }
}

require __DIR__ . '/include/header.php';
?>
<body>
   <?php require __DIR__ . '/include/navbar.php'; ?>

    <form method="post" id="form">
        <h3 style="color: darkred; margin: auto"></h3>
        <input class="input1" id="user" name="username" type="text" placeholder="Username *">
        <input class="input1" id="pass" name="password" type="password" placeholder="Password *">
        <button type="submit" class="btn" name="submit">login</button>

    </form>


   <?php require __DIR__ . '/include/footer.php'; ?>