<?php 
    if(!isset($_SESSION['username'])){
        $_SESSION['no-login'] = "<div class='failed'>Silahkan login terlebih dahulu.</div>";
        header("location:".SITEURL.'admin/login.php');
    }
?>
