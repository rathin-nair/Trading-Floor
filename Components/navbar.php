<!-- Navbar.php -->
<?php

    if(!isset($_SESSION['fid']) || $_SESSION['fid']==false){
        header('location: login.php');
    }

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Attendance_DB";
    
    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    $fid = $_SESSION['fid'];
    $sql = "SELECT * FROM FACULTY WHERE fid = '$fid'";
    $faculty_table = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($faculty_table);
    $fname = $row['f_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- Angular -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
    <!-- <script src="../share-list.js"></script> -->

</head>



<body ng-app="trad">
    <div class="navbar">
        <a href="#/dashboard">Home</a>
        <a href="#/quote">Quote Price</a>
        <a href="#/buy">Buy Shares</a>
        <a href="#/sell">Sell Shares</a>

        <span>&nbsp;&nbsp;Welcome<span class='fname'><?php echo $fname?></span></span>
        <a id="logout-btn" href="logout.php">Logout</a>
    </div>
</body>
</html>