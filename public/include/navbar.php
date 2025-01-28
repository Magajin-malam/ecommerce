<nav id="header">
    <div>
        <ul id="navbar">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>

            <?php if (isset($_SESSION['aid']) && $_SESSION['aid'] >= 0): ?>
                <li><a href="profile.php">Profile</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">SignUp</a></li>
            <?php endif; ?>

            <li><a href="admin.php">Admin</a></li>
            <li id="lg-bag">
                <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            </li>
            <li><a href="login.php"><i class="fa fa-user"></i></a></li>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</nav>
