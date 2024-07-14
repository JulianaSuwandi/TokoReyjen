<?php 
    include('../config/connectdb.php');
    session_destroy(); //stop session yang telah diset dari connectdb.php (logout user)

    header("location:".SITEURL.'admin/login.php');
?>