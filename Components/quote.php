<?php
    session_start();
    if(!isset($_SESSION['fid']) || $_SESSION['fid']==false){
        header('location: login.php');
    }

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Attendance_DB";
    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    $fid = $_SESSION['fid'];
?>


<head>
    <title>Trading Floor - Quote</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/quote.css">
    <!-- Angular -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
    <!-- <script src="../share-list.js"></script -->
</head>
<body>
    <?php require_once 'navbar.php'?>
    <div class="show-quote" ng-controller="showQuote">
        <div class="alert alert-primary" role="alert">
            A share of AAF FIRST PRIORITY CLO BOND costs $100
        </div>
    </div>
    <div class="quoteContainer">
        <form  class="quoteForm" action="">
            <input type="text" value="Share Symbol"><br>
            <input type="submit" value="Lookup">
            <input onclick="location.href='https://iextrading.com/trading/eligible-symbols/'" id="view-btn" type="button" value="View Symbol List">
        </form>
    </div>
</body>


