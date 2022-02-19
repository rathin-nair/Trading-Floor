<?php

$dbhost = 'localhost';
$dbUsername = 'root';
$dbpassword = '';

//Creating Database connection
$conn  = mysqli_connect($dbhost,$dbUsername,$dbpassword);
if (!$conn){
    die('Connection Failed: '.mysqli_connect_error());
}
//echo "Connected Successfully";


//Create database
$sql = "CREATE DATABASE if not exists Attendance_DB";
// mysqli_query($conn, $sql);

// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }


//Connecting to created database
mysqli_select_db($conn,"Attendance_DB");

//Create Tables


//Faculty table
$sql = "CREATE TABLE if not exists FACULTY(
    fid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    f_name VARCHAR(20) NOT NULL ,
    email VARCHAR(40) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    dept VARCHAR(40) 
)";

// mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)) {
//     echo "Table FACULTY created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }


//CLASS table
$sql = "CREATE TABLE if not exists CLASS(
    cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    c_name VARCHAR(20) UNIQUE NOT NULL
)";

// mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)) {
//     echo "Table CLASS created successfully";
//   } else {
//     echo "Error creating table: ".mysqli_error($conn);
//   }

//Student table
$sql = "CREATE TABLE if not exists STUDENT(
    stid INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    cid INT(6) UNSIGNED, 
    s_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (cid) REFERENCES CLASS(cid)
)";

// mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)) {
//     echo "Table STUDENT created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }


//Teach table, Class (Division) and Faculty (one to many) Relation 
$sql = "CREATE TABLE if not exists TEACH(
    fid INT(6) UNSIGNED,
    cid INT(6) UNSIGNED,
    FOREIGN KEY (cid) REFERENCES CLASS(cid),
    FOREIGN KEY (fid) REFERENCES FACULTY(fid)
)";

// mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)) {
//     echo "Table TEACH created successfully";
//   } else {
//     echo "Error creating table: ".mysqli_error($conn);
//   }


//Attendance table
$sql = "CREATE TABLE if not exists ATTENDANCE(
    stid INT(6) UNSIGNED NOT NULL,
    cid INT(6) UNSIGNED NOT NULL, 
    a_date date, 
    FOREIGN KEY (cid) REFERENCES CLASS(cid),
    FOREIGN KEY (stid) REFERENCES STUDENT(stid)
)";

// mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)) {
//     echo "Table ATTENDANCE created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }

// INSERTING VALUES IN FACULTY
$sql = "INSERT into FACULTY values
        (1001, 'Rakesh Sharma', 'rakesh.sharma@nmims.edu', 'nm123', 'physics'),
        (1002, 'Neil Armstrong', 'neil.armstrong@nmims.edu', 'nm123', 'physics');
        ";

// if (mysqli_query($conn, $sql)) {
//     echo "Table  filled successfully";
//   } else {
//     echo "Error filling table: " . mysqli_error($conn);
//   }

//INSERTING VALUES IN CLASS
$sql = "INSERT into CLASS values
        (2001, 'Physics DIV 1'),
        (2002, 'Physics DIV 2');
        ";
// if (mysqli_query($conn, $sql)) {
//     echo "Table CLASS filled successfully";
//     } else {
//     echo "Error filling table: " . mysqli_error($conn);
//     }

//INSERTING VALUES IN STUDENT
$sql = "INSERT into STUDENT values
    (3001, 2001, 'Vedant Misra'),
    (3002, 2001, 'Hansin Patwa'),
    (3003, 2001, 'Harshee Pitroda'),
    (3004, 2001, 'Ishita Gupta'),
    (3005, 2002, 'Pushpit Jain'),
    (3006, 2002, 'Mohit Jain'),
    (3007, 2002, 'Aryan Sinha'),
    (3008, 2002, 'Abhinav Mathur'),
    (3009, 2001, 'Mansi Bhandari');
    ";

// if (mysqli_query($conn, $sql)) {
//     echo "Table STUDENT filled successfully";
//     } else {
//     echo "Error filling table: " . mysqli_error($conn);
//     }

//INSERTING VALUES IN TEACHES
$sql = "INSERT into TEACH values
    (1001, 2001),
    (1002, 2002);
    ";

// if (mysqli_query($conn, $sql)) {
//     echo "Table TEACH filled successfully";
//     } else {
//     echo "Error filling table: " . mysqli_error($conn);
//     }

mysqli_close($conn);
?>