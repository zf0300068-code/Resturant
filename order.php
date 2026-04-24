<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page | Luxe Table</title>
    <style>
        /* CSS Variables for Consistency */
        :root {
            --navy: #020c1b;
            --light-navy: #0a192f;
            --gold: #c5a059;
            --text-gray: #8892b0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(2, 12, 27, 0.85), rgba(2, 12, 27, 0.85)), 
                        url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
            min-height: 100vh;
        }

        /* --- Navbar Style --- */
        .navbar {
            background: rgba(2, 12, 27, 0.95);
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--gold);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-sizing: border-box;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        /* --- Main Content Layout --- */
        .main-content {
            padding-top: 120px; /* Space for Navbar */
            display: flex;
            justify-content: center;
            padding-bottom: 50px;
        }

        .order-container {
            background: rgba(10, 25, 47, 0.95);
            width: 90%;
            max-width: 900px;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid var(--gold);
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .section { flex: 1; min-width: 300px; }

        h2 { color: var(--gold); border-bottom: 1px solid #334466; padding-bottom: 10px; margin-bottom: 20px; }

        .item-card {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.03);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #1d2d44;
        }

        .item-card img {
            width: 110px;
            height: 110px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--gold);
            margin-right: 20px;
        }

        .qty-input {
            width: 70px;
            background: transparent;
            border: 1px solid var(--gold);
            color: #fff;
            padding: 8px;
            border-radius: 5px;
            text-align: center;
            margin-top: 10px;
        }

        .input-box { width: 100%; margin-bottom: 20px; }

        .input-box input, .input-box textarea {
            width: 100%;
            padding: 14px;
            background: rgba(2, 12, 27, 0.6);
            border: 1px solid #334466;
            border-radius: 6px;
            color: white;
            box-sizing: border-box;
            outline: none;
        }

        .input-box input:focus { border-color: var(--gold); }

        .subtotal-display {
            font-size: 1.4rem;
            color: var(--gold);
            font-weight: bold;
            margin: 20px 0;
            padding: 10px;
            background: rgba(197, 160, 89, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .confirm-btn {
            background: var(--gold);
            color: var(--navy);
            border: none;
            padding: 15px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            transition: 0.4s;
            text-transform: uppercase;
        }

        .confirm-btn:hover {
            background: #e2bd78;
            box-shadow: 0 0 15px rgba(197, 160, 89, 0.4);
        }

    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.html" class="logo">Luxe Table</a>
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="menu.html">Menu</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="order.php" >Order</a></li>
    </ul>
</nav>

<div class="main-content">
    <div class="order-container">
        <form action="process_order.php" method="POST" style="display: contents;">
            
            <div class="section">
                <h2>Order Summary</h2>
      <div class="item-card">
      <img id="product-img" src="" alt="Product">
      <div>
        <h3 id="product-name" style="margin:0;"></h3>
        <p id="product-price" style="color: var(--text-gray); margin: 5px 0;">Unit Price: $0</p>
        <label style="font-size: 0.8rem;">Select Quantity:</label><br>
        <input type="number" name="quantity" id="qty" value="1" min="1" class="qty-input" oninput="updateTotal()">
       </div>
     </div>

     <input type="hidden" name="item_name" id="hidden_item_name" value="">
     <input type="hidden" name="total_price" id="total_price_hidden" value="">


            <div class="section">
                <h2>Delivery Details</h2>
                <div class="input-box">
                    <input type="text" name="customer_name" placeholder="Full Name" required>
                </div>
                <div class="input-box">
                    <input type="text" name="phone_number" placeholder="Phone Number" required>
                </div>
                <div class="input-box">
                    <textarea name="address" placeholder="Complete Delivery Address" rows="4" required></textarea>
                </div>
              <button type="submit" name="place_order" class="confirm-btn">Confirm My Order</button>
            </div>

        </form>
    </div>
</div>

<script>
    let unitPrice = 0;

window.onload = function() {
    const name = localStorage.getItem('selectedProductName');
    const p = localStorage.getItem('selectedProductPrice');
    const img = localStorage.getItem('selectedProductImage');

    if(name) {
        document.getElementById('product-name').innerText = name;
        document.getElementById('hidden_item_name').value = name; // Database ke liye
        document.getElementById('product-price').innerText = "Unit Price: $" + p;
        document.getElementById('product-img').src = img;
        unitPrice = parseInt(p);
        updateTotal(); // Initial total calculate karein
    }
}

function updateTotal() {
    const qty = document.getElementById('qty').value;
    const total = unitPrice * qty;
    
    document.getElementById('total-text').innerText = total;
    document.getElementById('total_price_hidden').value = total;
}

    
function placeOrder(){
alert("Order Placed Successfully!");
window.location.href='index.html';
}
    
</script>
