<?php 
    include './php/config.php';
    include './php/db.php';
    include './php/in-auth.php';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/transaction.css">
    <title>Your Coffee</title>
</head>
<body>
    <?php include_once './components/header.php' ?>

    <main>
        <section class="transactions">
            <h2>Your Transactions</h2>
            <div class="transaction-list">

                <?php
                    $result = GetMyTransactions($_SESSION['Username'], $Connection);

                    if ($result[0]) {
                        foreach ($result[1] as $transaction) {
                            echo '<div class="transaction">';
                            echo '<h4>Transaction ID: ' . $transaction['TransactionId'] . '</h4>';
                            echo '<p>Amount: ₱' . $transaction['TransactionAmount'] . '</p>';
                            echo '<p>Items: ' . $transaction['TransactionItems'] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="transaction">';
                        echo '<h4>No transactions found.</h4>';
                        echo '</div>';
                    }
                ?>
                
                <!-- Add more transactions here -->
            </div>
        </section>
    </main>

    <script type="module" src="./scripts/main.js"></script>
</body>
</html>
