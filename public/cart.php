<?php
session_start();
require __DIR__ . '/include/connect.php';

if (!isset($_SESSION['aid'])) {
    header("Location: login.php");
}

if (isset($_GET['re'])) {
    $aid = $_SESSION['aid'];
    $pid = $_GET['re'];
    $query = "DELETE FROM CART WHERE aid = $aid and pid = $pid";

    $result = mysqli_query($con, $query);
    header("Location: cart.php");
    exit();
}

if (isset($_POST['check'])) {

    $aid = $_SESSION['aid'];

    $query = "SELECT * FROM cart JOIN products ON cart.pid = products.pid WHERE aid = $aid";

    $result = mysqli_query($con, $query);

    $result2 = mysqli_query($con, $query);
    $row2 = mysqli_fetch_assoc($result2);

    if (empty($row2['pid'])) {
        header("Location: shop.php");
        exit();
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $pid = $row['pid'];
        $pname = $row['pname'];
        $desc = $row['description'];
        $qty = $row['qtyavail'];
        $price = $row['price'];
        $cat = $row['category'];
        $img = $row['img'];
        $brand = $row['brand'];
        $cqty = $row['cqty'];
        $a = $price * $cqty;

        $newqty = $_POST["$pid-qt"];

        $query = "UPDATE CART SET cqty = $newqty where aid = $aid and pid = $pid";

        mysqli_query($con, $query);


    }
    header("Location: checkout.php");
    exit();
}
?>


<?php require __DIR__ . '/include/header.php'; ?>
<body onload="totala()">
     <?php require __DIR__ . '/include/navbar.php'; ?>
    <section class="cart-header">
        <h2>#GameTillTheEnd</h2>
        <p>Providing premium gaming experience</p>
    </section>
    <section>
         <h2>Your cart</h2>
    <p>1 item ships at checkout</p>
    </section>
    <section class="cart-container">
        <div class="cart-items">

        </div>
        <div class="cart-summary"></div>
    </section>



<a href="test.php">Testing</a>
<?php include __DIR__ . '/include/footer.php'; ?>