<!--Making Session dashboard.php-->
<?php
    session_start();
    
    if(!isset($_SESSION['fid']) || $_SESSION['fid']==false){
        header('location: login.php');
    }
    
    
    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Attendance_DB";

    $conn = mysqli_connect($dbhost, $dbUsername, $dbpassword, $dbname);
    $fid = $_SESSION['fid'];

    $fac = "SELECT * FROM FACULTY WHERE fid = '$fid'";
                                    
    $facultyTable = mysqli_query($conn, $fac);
    $row = mysqli_fetch_array($facultyTable);
    $fname = $row['f_name'];
    $DP_name = $row['dept'];

?>

<!--Page-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Trading Floor - Dashboard</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/index.css">
        <link rel="stylesheet" href="../CSS/dashboard.css">

        <!-- Angular -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
        <script src="../share-list.js"></script>
    </head>
    <body>

    <div ng-view></div>

            <div ng-controller="shareCtrl">
            <?php require_once 'navbar.php'?>
            <br><br><br>
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
                <tr id="irow1">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Your Wallet: </td>
                    <td class="total-label">${{ getWallet() }}</td>
                </tr>
                <tr id="irow2">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Grand Total: </td>
                    <td class="total-label">${{ getGrandTotal() }}</td>
                </tr>
            </table>
            </div>
    </body>


