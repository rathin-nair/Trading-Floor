<!-- SESSIONS -->

<?php
    session_start();
    if(!isset($_SESSION['userid']) || $_SESSION['userid']==false){
        header('location:login.php');
    }

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Trading_floor";
    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    $userid = $_SESSION['userid'];
?>

<!-- PAGE CONTENT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trading Floor - Quote</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/quote.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Link JavaScript file -->
	<script src="./fetchapi.js"></script>
</head>
<body>

    <!-- ADDING NAVBAR -->
    <?php require_once 'navbar.php'?>

    <!-- MAIN CONTENT -->
    <form class="quoteContainer quoteForm">
        <input type="text" placeholder="Share Symbol" name="sym" id="sym"><br>
        <input type="submit" value="Lookup" onclick="get_price()">
        <input onclick="location.href='https://iextrading.com/trading/eligible-symbols/'" id="view-btn" type="button" value="View Symbol List">
    </form>
    <div>
        <table id="users">
            
        </table>
    </div>
</body>
</html>


