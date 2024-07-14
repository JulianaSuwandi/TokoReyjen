<?php
    // Mulai session
    session_start();
    


    //biar kalau ganti database gak perlu ganti ulang semua, tinggal ganti ini
    define('SITEURL', 'http://localhost:8080/Newfolder/Program/'); //site index utama
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '123456789');
    define('DB_NAME', 'bisnis');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD)  or die(mysqli_error($conn));; //Connect ke database
    $db_select = mysqli_select_db($conn, DB_NAME)  or die(mysqli_error($conn));;//Milih Database

?>