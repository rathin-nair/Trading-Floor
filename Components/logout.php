<?php
    session_start();
    if(!isset($_SESSION['fid']) || $_SESSION['fid']==false){
        header('location: login.php');
    }else{
        session_unset();
        session_destroy();
        header('location: login.php');
    }
?>