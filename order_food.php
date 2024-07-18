
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
    <link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
    <link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='js/jquery.color-RGBa-patch.js'></script>
    <script src='js/example.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .menu-container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333333;
        }
        .menu-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
            padding: 20px 0;
        }
        .menu-item:last-child {
            border-bottom: none;
        }
        .menu-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .menu-details {
            flex: 1;
            margin-left: 20px;
        }
        .menu-name {
            font-size: 1.5em;
            color: #333333;
        }
        .menu-description {
            margin: 10px 0;
            color: #666666;
        }
        .menu-price {
            color: #28a745;
            font-weight: bold;
        }
        .quantity-container {
            display: flex;
            align-items: center;
        }
        .quantity-container input[type="number"] {
            width: 50px;
            text-align: center;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin: 0 10px;
        }
        .quantity-container button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .quantity-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
include('header.php');
?>
    <div class="menu-container">
        <h1>Food Order</h1>
        
        <div class="menu-item">
            <img src="SnackImage\1.jpg" alt="Popcorn">
            <div class="menu-details">
                <div class="menu-name">Popcorn</div>
                <div class="menu-description">Delicious buttery popcorn.</div>
                <div class="menu-price">$5.00</div>
            </div>
            <div class="quantity-container">
                <button onclick="decreaseQuantity(this)">-</button>
                <input type="number" value="0" min="0">
                <button onclick="increaseQuantity(this)">+</button>
            </div>
        </div>
        
        <div class="menu-item">
            <img src="SnackImage\2.jpg" alt="Soda">
            <div class="menu-details">
                <div class="menu-name">Soda</div>
                <div class="menu-description">Refreshing carbonated drink.</div>
                <div class="menu-price">$2.50</div>
            </div>
            <div class="quantity-container">
                <button onclick="decreaseQuantity(this)">-</button>
                <input type="number" value="0" min="0">
                <button onclick="increaseQuantity(this)">+</button>
            </div>
        </div>
    
        <div class="menu-item">
            <img src="SnackImage\3.jfif" alt="Nachos">
            <div class="menu-details">
                <div class="menu-name">Nachos</div>
                <div class="menu-description">Crispy nachos with cheese.</div>
                <div class="menu-price">$4.00</div>
            </div>
            <div class="quantity-container">
                <button onclick="decreaseQuantity(this)">-</button>
                <input type="number" value="0" min="0">
                <button onclick="increaseQuantity(this)">+</button>
            </div>
        </div>
    
        <div class="menu-item">
            <img src="SnackImage\4.jpg" alt="Hot Dog">
            <div class="menu-details">
                <div class="menu-name">Hot Dog</div>
                <div class="menu-description">Grilled hot dog with toppings.</div>
                <div class="menu-price">$3.00</div>
            </div>
            <div class="quantity-container">
                <button onclick="decreaseQuantity(this)">-</button>
                <input type="number" value="0" min="0">
                <button onclick="increaseQuantity(this)">+</button>
            </div>
        </div>
    
        <div class="menu-item">
            <img src="SnackImage\5.png" alt="Pretzel">
            <div class="menu-details">
                <div class="menu-name">Pretzel</div>
                <div class="menu-description">Soft baked pretzel with salt.</div>
                <div class="menu-price">$2.00</div>
            </div>
            <div class="quantity-container">
                <button onclick="decreaseQuantity(this)">-</button>
                <input type="number" value="0" min="0">
                <button onclick="increaseQuantity(this)">+</button>
            </div>
        </div>
    
        <div class="menu-item">
            <img src="SnackImage\6.jfif" alt="Ice Cream">
            <div class="menu-details">
                <div class="menu-name">Ice Cream</div>
                <div class="menu-description">Creamy vanilla ice cream.</div>
                <div class="menu-price">$3.50</div>
            </div>
            <div class="quantity-container">
                <button onclick="decreaseQuantity(this)">-</button>
                <input type="number" value="0" min="0">
                <button onclick="increaseQuantity(this)">+</button>
            </div>
        </div>

        <div id="total-section">
            <hr>
            <div>Total Amount: <span id="total-amount">$0.00</span></div>
        </div>
    

        <a href="process_booking.php" id="checkout" class="btn btn-primary mt-3" style="width:100%; display: inline-block; text-align: center;">Booking</a>
    </div>
    <script>
        function increaseQuantity(button) {
            var input = button.previousElementSibling;
            input.value = parseInt(input.value) + 1;
        }
        function decreaseQuantity(button) {
            var input = button.nextElementSibling;
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>

<script>
    // Function to increase quantity and calculate total
    function increaseQuantity(button) {
        var input = button.previousElementSibling;
        input.value = parseInt(input.value) + 1;
        calculateTotal();
    }

    // Function to decrease quantity and calculate total
    function decreaseQuantity(button) {
        var input = button.nextElementSibling;
        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value) - 1;
            calculateTotal();
        }
    }

    // Function to calculate total amount
    function calculateTotal() {
        var items = document.querySelectorAll('.menu-item');
        var total = 0;

        items.forEach(function(item) {
            var priceElement = item.querySelector('.menu-price');
            var price = parseFloat(priceElement.textContent.replace('$', ''));
            var quantity = parseInt(item.querySelector('input[type="number"]').value);
            total += price * quantity;
        });

        // Update the total amount in the HTML
        document.getElementById('total-amount').textContent = '$' + total.toFixed(2);
    }
    </script>



    
    
    <?php include('footer.php');?>
</body>
</html>
