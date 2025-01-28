<?php
session_start();
require __DIR__ . '/include/connect.php';
require __DIR__ . '/include/header.php';
?>
<body>
    <?php require __DIR__ . '/include/navbar.php';

// Query to fetch available products randomly
$query = "SELECT * FROM products WHERE qtyavail > 0 ORDER BY RAND()";
$result = mysqli_query($con, $query);

// Start the product section
?>
<section id="product1" class="section-p1">
    <div class="pro-container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <?php
            $pid = $row['pid'];
            $pname = strlen($row['pname']) > 35 ? substr($row['pname'], 0, 35) . '...' : $row['pname'];
            $price = $row['price'];
            $img = $row['img'];
            $brand = $row['brand'];
            ?>
            <div class="pro" onclick="topage(<?php echo $pid; ?>)">
                <img src="assets/<?php echo $img; ?>" height="235px" width="235px" alt="">
                <div class="des">
                    <span><?php echo $brand; ?></span>
                    <h5><?php echo $pname; ?></h5>
                    <h4>$<?php echo $price; ?></h4>
                </div>
                <a onclick="topage(<?php echo $pid; ?>)"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php include __DIR__ . '/include/footer.php' ?>
