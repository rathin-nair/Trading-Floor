<!-- SESSIONS -->
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



<!-- PAGE CONTENT -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trading Floor - Buy</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/quote.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">

</head>

<body>
    <!-- Adding Navbar -->
    <?php require_once 'navbar.php'?>

    <!-- Main content -->
    <div class="quoteContainer">
        <form  class="quoteForm" action="">
            <input type="text" value="Share Symbol"><br>
            <input type="text" value="Shares to Buy"><br>
            <input type="submit" value="Lookup">
            <input id="view-btn" type="button" value="View Symbol List">
        </form>
    </div>

    <div ng-controller="shareCtrl">
        <h5 id="buytabletitle">Your Shares</h5>
        <table class="stock_table">
            <tr>
                <th>Stock Symbol</th>
                <th>Stock Name</th>
                <th>Shares</th>
                <th>Price</th>
                <th class="total-label">Total</th>
            </tr>
            <tr ng-repeat="sh in boughtShares">
                <td>{{ sh.symbol }}</td>
                <td>{{ sh.sname }}</td>
                <td>{{ sh.shares }}</td>
                <td>${{ sh.price }}</td>
                <td class="total-label">${{ sh.total }}</td>
            </tr>
        </table>
    </div>
</body>
</html>