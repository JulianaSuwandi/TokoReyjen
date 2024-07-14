<?php ob_start(); ?>
<?php
    include('../config/connectdb.php'); //connect ke database


    //ambil id dari manage-admin
    $id = $_GET['id'];

    //sql query untuk delete
    $sql = "DELETE FROM tbl_customer WHERE id=$id";

    //Jalankan query
    $res = mysqli_query($conn, $sql);

    //cara kerjanya sama seperti di add-admin.php
    if($res=true){
        $_SESSION['delete'] = "<div class='success'>Customer Berhasil Dihapus</div>";
        header("location:".SITEURL.'admin/manage-customer.php');
    }
    else{
        $_SESSION['delete'] = "<div class='failed'>Customer Gagal Dihapus, Coba Lagi Nanti</div>";
        header("location:".SITEURL.'admin/manage-customer.php');
    }


?>
<?php ob_end_flush(); ?>
