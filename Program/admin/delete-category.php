<?php ob_start(); ?>
<?php 
    include ('../config/connectdb.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //kalau ada gambar, hapus dari folder gambar
        if($image_name != ""){
            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            //kalau gagal
            if($remove==false){
                $_SESSION['remove']="<div class='error'>Gagal menghapus gambar.</div>";
                header('location'.SITEURL.'admin/manage-category.php');
                die(); //untuk stop proses
            }
        }

        $sql="DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn,$sql);

        //berhasil hapus
        if($res==true){
            $_SESSION['delete'] = "<div class='success'>Kategori berhasil dihapus.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            $_SESSION['delete'] = "<div class='failed'>Kategori gagal dihapus.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        
    }else{
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
<?php ob_end_flush(); ?>