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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>NMIMS - Attendance</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'navbar.php'?>
    <div class="st-list">
        <?php
            $sql = "select student.* from teach INNER JOIN student ON student.cid = teach.cid where teach.fid = $fid";
            if($student_table = mysqli_query($conn, $sql)){
                if (mysqli_num_rows($student_table) > 0){
                    echo "List of Students: <br><br>";
                    while($row = mysqli_fetch_array($student_table)){
                        $sname = $row["s_name"];
                        echo $sname;
                        echo "&nbsp;&nbsp;&nbsp;<input type='checkbox' value='p'>Mark Present</input>";
                        echo "<br>";
                    }
                }
            }
            else{
                echo "<h3>No students</h3>";
            }
        ?>
    </div>
</body>
</html>