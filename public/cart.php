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
        <h2>Your cart</h2>
        <p><?php $total_item = 0; echo $total_item; ?> item ships at checkout</p>
    </section>
    <section>
    </section>
    <section class="cart-container">
         <div class="cart-item">
            <img src="assets/favicon.png" alt="6 Blade Starter Kit" class="cart-item-img">
            <div class="cart-item-details">
                <h3>6 Blade Starter Kit</h3>
                <p>2 items</p>
                <div class="quantity-control">
                    <button>-</button>
                    <input type="text" value="1">
                    <button>+</button>
                </div>
            </div>
            <p class="cart-price">$10</p>
            <button class="remove-item">×</button>
        </div>
        <div class="summary">
            <h4>Cart Summary</h4>
            <div class="summary-details">
                <p>Subtotal (1 Item) <span>$10.00</span></p>
                <p>Shipping Discount <span class="discount">- $2.00</span></p>
                <p>Shipping & Handling <span>$4.00</span></p>
                <p>Tax (Calculated at checkout) <span>$0.00</span></p>
            </div>
            <div class="total">
                <p>Balance <span>$12.00</span></p>
            </div>
            <button class="checkout-btn">Checkout</button>
        </div>
    </section>



<a href="test.php">Testing</a>
<?php include __DIR__ . '/include/footer.php'; ?>