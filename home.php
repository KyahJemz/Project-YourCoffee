<?php 
    include_once './php/config.php';
    include_once './php/db.php';
    include_once './php/in-auth.php';


    if (isset($_POST['ContactUsButton'])){
        UploadMessage($_POST['Name'],$_POST['Email'],$_POST['Message'],$Connection);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Your Coffee</title>
</head>
<body>
    <?php include_once './components/header.php' ?>
    
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Welcome to Your Coffee</h1>
                <p>Discover the aroma of freshly brewed coffee.</p>
                <a href="#menu" class="cta-button">View Menu</a>
            </div>
        </div>
    </section>

    <section id="about" class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <p>Here at us, we have been passionately crafting exceptional coffee experiences since 2020. Our journey began with a simple love for the art of brewing and a commitment to sourcing the finest coffee beans from around the world. With every cup we serve, we aim to transport you to a world of rich aromas and bold flavors. Our skilled baristas are dedicated to creating the perfect cup of coffee, whether it's a classic espresso or a unique specialty blend. We take pride in fostering a warm and inviting atmosphere where friends and coffee enthusiasts gather to savor moments and share conversations. Join us in celebrating the love of coffee, one cup at a time.</p>
        </div>
    </section>

    <section id="menu" class="featured-menu">
        <div class="container">
            <h2>Featured Menu</h2>
            <div class="menu-categories">
            <h3>Coffee</h3>
                <div class="menu-category">
                    
                    <?php
                        $result = GetAllItems($Connection);
                        if ($result[0]) {
                            while ($row = $result[1]->fetch_assoc()) {
                                if ($row['ItemCategory'] === "Coffee") {
                                    echo '<div class="menu-item" data-itemid="' . $row['ItemId'] . '">';
                                    echo '  <img src="./images/uploads/' . $row['ItemImage'] . '" alt="' . $row['ItemImage'] . '">';
                                
                                    echo '  <h3>' . $row['ItemName'] . '</h3>';
                                    echo '  <p>' . $row['ItemDescription'] . '</p>';
                                    echo '  <span>₱' . $row['ItemPrice'] . '.00</span>';
                                    echo '  <button class="add-to-cart-btn">Add To Cart</button>';
                                    echo '</div>';
                                }
                            }
                        }
                    ?>
                </div>
                <h3>Cold Drinks</h3>
                <div class="menu-category">
                    
                    <?php
                        $result = GetAllItems($Connection);
                        if ($result[0]) {
                            while ($row = $result[1]->fetch_assoc()) {
                                if ($row['ItemCategory'] === "Cold Drinks") {
                                    echo '<div class="menu-item" data-itemid="' . $row['ItemId'] . '">';
                                    echo '  <img src="./images/uploads/' . $row['ItemImage'] . '" alt="' . $row['ItemImage'] . '">';
                                
                                    echo '  <h3>' . $row['ItemName'] . '</h3>';
                                    echo '  <p>' . $row['ItemDescription'] . '</p>';
                                    echo '  <span>₱' . $row['ItemPrice'] . '.00</span>';
                                    echo '  <button class="add-to-cart-btn">Add To Cart</button>';
                                    echo '</div>';
                                }
                            }
                        }
                    ?>
                </div>
                <h3>Pastries</h3>
                <div class="menu-category">
                    
                    <?php
                        $result = GetAllItems($Connection);
                        if ($result[0]) {
                            while ($row = $result[1]->fetch_assoc()) {
                                if ($row['ItemCategory'] === "Pastries") {
                                    echo '<div class="menu-item" data-itemid="' . $row['ItemId'] . '">';
                                    echo '  <img src="./images/uploads/' . $row['ItemImage'] . '" alt="' . $row['ItemImage'] . '">';
                                   
                                    echo '  <h3>' . $row['ItemName'] . '</h3>';
                                    echo '  <p>' . $row['ItemDescription'] . '</p>';
                                    echo '  <span>₱' . $row['ItemPrice'] . '.00</span>';
                                    echo '  <button class="add-to-cart-btn">Add To Cart</button>';
                                    echo '</div>';
                                }
                            }
                        }
                    ?>
                </div>
                <h3>Sandwiches</h3>
                <div class="menu-category">
                    
                    <?php
                        $result = GetAllItems($Connection);
                        if ($result[0]) {
                            while ($row = $result[1]->fetch_assoc()) {
                                if ($row['ItemCategory'] === "Sandwiches") {
                                    echo '<div class="menu-item" data-itemid="' . $row['ItemId'] . '">';
                                    echo '  <img src="./images/uploads/' . $row['ItemImage'] . '" alt="' . $row['ItemImage'] . '">';
                                
                                    echo '  <h3>' . $row['ItemName'] . '</h3>';
                                    echo '  <p>' . $row['ItemDescription'] . '</p>';
                                    echo '  <span>₱' . $row['ItemPrice'] . '.00</span>';
                                    echo '  <button class="add-to-cart-btn">Add To Cart</button>';
                                    echo '</div>';
                                }
                            }
                        }
                    ?>
                </div>
                <h3>Healthy Options</h3>
                <div class="menu-category">
                    
                    <?php
                        $result = GetAllItems($Connection);
                        if ($result[0]) {
                            while ($row = $result[1]->fetch_assoc()) {
                                if ($row['ItemCategory'] === "Healthy Options") {
                                    echo '<div class="menu-item" data-itemid="' . $row['ItemId'] . '">';
                                    echo '  <img src="./images/uploads/' . $row['ItemImage'] . '" alt="' . $row['ItemImage'] . '">';
                                    echo '  <h3>' . $row['ItemName'] . '</h3>';
                                    echo '  <p>' . $row['ItemDescription'] . '</p>';
                                    echo '  <span>₱' . $row['ItemPrice'] . '.00</span>';
                                    echo '  <button class="add-to-cart-btn">Add To Cart</button>';
                                    echo '</div>';
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-us">
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or feedback, feel free to contact us.</p>
            <form action="" method="post">
                <div class="input-container">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" name="Name" required>
                </div>
                <div class="input-container">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" required>
                </div>
                <div class="input-container">
                    <label for="Message">Message:</label>
                    <textarea id="Message" name="Message" required></textarea>
                </div>
                <button name="ContactUsButton" type="submit">Submit</button>
            </form>
        </div>
    </section>

    <?php include './components/footer.php'; ?>

    <script type="module" src="./scripts/main.js"></script>
</body>
</html>
