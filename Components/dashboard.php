<!--Making Session-->
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

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>NMIMS - Attendance</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="../CSS/index.css">
    </head>
    <body>
        <header>
            <?php require_once 'navbar.php'?>
        </header>
        <main>

        </main>
    </body>
</html>

