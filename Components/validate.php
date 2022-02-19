<?php

if(isset($_POST["log-submit"]))
{
    $useremail = $_POST["email"];
    $pwd = $_POST["pass"];

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = 'Attendance_DB';

    //Creating Database connection
    $conn  = mysqli_connect($dbhost, $dbUsername, $dbpassword, $dbname);
    if (!$conn)
    {
        die('Connection Failed: '.mysqli_connect_error());
    }

    $sql = "SELECT * FROM FACULTY WHERE email = '$useremail';";
    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) == 0)
        {
            header("location:login.php?error=eruser");
        }
        else{
            $row = mysqli_fetch_array($result);
            
            $pwd_fetched = $row["pass"];
            if($pwd === $pwd_fetched)
            {
                session_start();
                $_SESSION["fid"] = $row["fid"];
                header("location:dashboard.php");
            }
            else
            {
                header("location:login.php?error=erpass");
            }
        }
    }
}
?>