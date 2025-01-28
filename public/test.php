<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #1a1a1a;
    padding: 20px;
    display: flex;
    justify-content: center;
    gap: 40px;
}

.cart-container {
    background: #fff;
    padding: 20px;
    width: 50%;
    border-radius: 10px;
}

h2 {
    font-size: 24px;
    font-weight: bold;
}

.progress-bar {
    background: #e0e0e0;
    height: 6px;
    border-radius: 3px;
    margin: 8px 0;
}

.progress {
    background: #d33a2c;
    width: 40%;
    height: 100%;
    border-radius: 3px;
}

.keep-shopping {
    display: block;
    margin-top: 5px;
    color: #1a1a1a;
    text-decoration: none;
}

.cart-item {
    display: flex;
    align-items: center;
    gap: 15px;
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
}

.cart-item-img {
    width: 80px;
    border-radius: 5px;
}

.cart-item-details h3 {
    font-size: 18px;
    margin: 0;
}

.cart-item-details p {
    font-size: 14px;
    color: #666;
}

.quantity-control {
    display: flex;
    align-items: center;
    gap: 5px;
}

.quantity-control button {
    border: none;
    background: #ddd;
    padding: 5px 10px;
    cursor: pointer;
}

.quantity-control input {
    width: 30px;
    text-align: center;
    border: 1px solid #ccc;
    padding: 5px;
}

.cart-price {
    font-size: 18px;
    font-weight: bold;
}

.remove-item {
    border: none;
    background: none;
    font-size: 24px;
    cursor: pointer;
    color: #d33a2c;
}

.summary {
    background: #f8f2e8;
    padding: 20px;
    border-radius: 10px;
    width: 30%;
}

.summary h3 {
    font-size: 22px;
    font-weight: bold;
}

.summary-details p {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    margin: 5px 0;
}

.discount {
    color: #d33a2c;
}

.total {
    font-size: 18px;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
}

.checkout-btn {
    width: 100%;
    background: #001f3f;
    color: white;
    padding: 12px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin-top: 10px;
    border-radius: 5px;
}

.checkout-btn:hover {
    background: #002855;
}

    </style>
</head>
<body>

<div class="cart-container">
    <h2>Your cart</h2>
    <p>1 item ships at checkout</p>

   
</div>

<div class="summary">
    <h3>Summary</h3>
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

</body>
</html>
