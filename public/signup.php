<?php
session_start();
require __DIR__ . '/include/connect.php';

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassowrd = $_POST['confirmPassword'];
    $dob = $_POST['dob'];
    $contact = $_POST['phone'];
    $gen = $_POST['gender'];
    $email = $_POST['email'];

    $query = "select * from accounts where username = '$username' or phone='$contact' or email='$email'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if (!empty($row['aid'])) {
        echo "<script> alert('Credentials already exists'); setTimeout(function(){ window.location.href = 'signup.php'; }, 100); </script>";
        exit();
    }
    if ($password != $confirmpassowrd) {
        echo "<script> alert('Passwords do not match'); setTimeout(function(){ window.location.href = 'signup.php'; }, 100); </script>";
        exit();
    }
    if (strtotime($dob) > time()) {
        echo "<script> alert('invalid date'); setTimeout(function(){ window.location.href = 'signup.php'; }, 100); </script>";
        exit();
    }
    if ($gen == "S") {
        echo "<script> alert('select gender'); setTimeout(function(){ window.location.href = 'signup.php'; }, 100); </script>";
        exit();
    }

    $query = "insert into `accounts` (afname, alname, phone, email, dob, username, gender,password) values ('$firstname', '$lastname', '$contact','$email', '$dob', '$username', '$gen','$password')";

    $result = mysqli_query($con, $query);



    if ($result) {
        echo "<script> alert('Successfully entered account'); setTimeout(function(){ window.location.href = 'login.php'; }, 100); </script>"; // exit();
    }

}

require __DIR__ . '/include/header.php';
?>
<body>
    <?php require __DIR__ . '/include/navbar.php'; ?>


    <form method="post" id="form">
        <h3 style="color: darkred; margin: auto"></h3>
        <input class="input" id="fn" name="firstName" type="text" placeholder="First Name *" required="required">
        <input class="input" id="ln" name="lastName" type="text" placeholder="Last Name *" required="required">
        <input class="input" id="user" name="username" type="text" placeholder="Username *" required="required">
        <input class="input" id="email" name="email" type="text" placeholder="Email *" required="required">
        <input class="input" id="pass" name="password" type="password" placeholder="Password *" required="required">
        <input class="input" id="cpass" name="confirmPassword" type="password" placeholder="Confirm Password *"
            required="required">
        <input class="input" id="dob" name="dob" type="date" placeholder="Date Of Birth " required="required">
        <input class="input" id="contact" name="phone" type="number" placeholder="Contact *" required="required">
        <select class="input" id="gen" name="gender" required="required">
            <option value="S">Select Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <button name="submit" type="submit" class="btn">Submit</button>

    </form>

    <div class="sign">
        <a href="login.php" class="signin">Already have an account?</a>
    </div>
  <?php include __DIR__ . '/include/footer.php' ?>