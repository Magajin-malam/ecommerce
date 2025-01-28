<?php
session_start();
require __DIR__ . '/include/connect.php';

// Get the user ID
$aid = $_SESSION['aid'] ?? -1;

// Redirect if not logged in
if ($aid < 0) {
    header("Location: login.php");
    exit();
}

// Handle adding to cart
if (isset($_POST['submit'])) {
    $pid = $_GET['pid'];
    $qty = $_POST['qty'];

    // Check if the item is already in the cart
    $query = "SELECT * FROM cart WHERE aid = $aid AND pid = $pid";
    $result = mysqli_query($con, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Item already added to cart');</script>";
        header("Location: cart.php");
        exit();
    }

    // Add new item to cart
    $query = "INSERT INTO cart (aid, pid, cqty) VALUES ($aid, $pid, $qty)";
    mysqli_query($con, $query);
    header("Location: shop.php");
    exit();
}

require __DIR__ . '/include/header.php';
?>

<body>
  <?php require __DIR__ . '/include/navbar.php'; ?>

  <?php if (isset($_GET['pid'])): ?>
      <?php
      $pid = $_GET['pid'];
      $query = "SELECT * FROM products WHERE pid = $pid";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
      ?>

      <?php if ($row): ?>
          <?php
          $pname = $row['pname'];
          $desc = $row['description'];
          $qty = $row['qtyavail'];
          $price = $row['price'];
          $cat = $row['category'];
          $img = $row['img'];
          $brand = $row['brand'];
          ?>

          <section id="prodetails" class="section-p1">
              <div class="single-pro-image">
                  <img src="assets/<?= $img ?>" width="100%" id="MainImg" alt="<?= htmlspecialchars($pname) ?>" />
              </div>
              <div class="single-pro-details">
                  <h2><?= htmlspecialchars($pname) ?></h2>
                  <h4><?= htmlspecialchars("$cat - $brand") ?></h4>
                  <h4>$<?= number_format($price, 2) ?></h4>
                  <form method="post">
                      <input type="number" name="qty" value="1" min="1" max="<?= $qty ?>" />
                      <button class="normal" name="submit">Add to Cart</button>
                  </form>
                  <h4>Product Details</h4>
                  <span><?= htmlspecialchars($desc) ?></span>
              </div>
          </section>
      <?php else: ?>
          <p>Product not found.</p>
      <?php endif; ?>
  <?php endif; ?>
  <?php include __DIR__ . '/include/footer.php'; ?>
