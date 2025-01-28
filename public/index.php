<?php
session_start();
require __DIR__ . '/include/connect.php';

if (empty($_SESSION['aid']))
    $_SESSION['aid'] = -1;
?>

<?php require __DIR__ . '/include/header.php'; ?>
<body>
    <?php require __DIR__ . '/include/navbar.php'; ?>
     <section id="page-header">
        <h2>Premium Gaming</h2>

        <p>Save more with coupons & up to 70% off!</p>
    </section>


    <section id="banner" class="section-m1">
        <a href="shop.php">
            <button class="normal">Explore More</button>
        </a>
    </section>

<?php include __DIR__ . '/include/footer.php' ?>
