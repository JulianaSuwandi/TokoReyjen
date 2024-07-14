<?php ob_start(); ?>
<?php
    include('../config/connectdb.php'); //connect ke database


    //ambil id dari manage-admin
    $id = $_GET['id'];

    //sql query untuk delete
    $sql = "DELETE FROM tbl_detail_pembelian WHERE id=$id";
    $sql2 = "DELETE FROM tbl_pembelian WHERE id=$id";

    //Jalankan query
    $res = mysqli_query($conn, $sql);
    $res = mysqli_query($conn, $sql2);


    //cara kerjanya sama seperti di add-admin.php
    if($res=true){
        $_SESSION['delete'] = "<div class='success'>Pembelian Berhasil Dihapus</div>";
        header("location:".SITEURL.'admin/manage-pemasukan.php');
    }
    else{
        $_SESSION['delete'] = "<div class='failed'>Pembelian Gagal Dihapus</div>";
        header("location:".SITEURL.'admin/manage-pemasukan.php');
    }


?>
<?php ob_end_flush(); ?>
