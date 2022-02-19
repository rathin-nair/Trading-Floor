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
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="student.php">Manage Students</a>
        <a href="attendance.php">Take Attendance</a>

        <span>Welcome<span class='fname'><?php echo $fname?></span></span>
        <a id="logout-btn" href="logout.php">Logout</a>
    </div>
</body>
</html>