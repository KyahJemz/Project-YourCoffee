<?php 
    include './php/config.php';
    include './php/db.php';
    include './php/in-auth.php';

    $result = GetAllItems($Connection);
    if ($result[0]) {
        $items = json_encode($result[1]->fetch_all(MYSQLI_ASSOC));
        echo '<script>';
        echo 'var items = ' . $items . ';';
        echo '</script>';
    }
    if (isset($_POST['order-now-btn'])) {
        $result = UploadTransaction($_POST['username'], $_POST['name'], $_POST['address'], $_POST['contact'], $_POST['amount'], $_POST['order'], $Connection);
        if ($result[0]) {
            echo '<script>';
            echo 'alert("Transaction Complete");';
            echo 'localStorage.clear();';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Transaction Failed");';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/mycart.css">
    <title>Your Coffee</title>
</head>
<body>
    <?php include_once './components/header.php' ?>

    <section class="cart-info">
        <h2>Customer Information</h2>
        <form id="customer-form" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required>

            <input type="text" id="amount" value="" name="amount" hidden required>

            <input type="text" id="order" value=""  name="order" hidden required>

            <input type="text" id="username" value="<?php echo $_SESSION['Username'] ?>"  name="username" hidden required>
            
            <button name="order-now-btn" type="submit">Update Cart</button>
        </form>

        <div class="cart-summary">
            <h3>Cart Summary</h3>
            <p>Total Amount: <span id="total-amount">0</span> PHP</p>
        </div>
    </section>

    <section class="cart-items">
        <h2>Cart Items</h2>
        <ul id="cart-list">

        </ul>
    </section>


    <script type="module" src="./scripts/main.js"></script>
</body>
</html>