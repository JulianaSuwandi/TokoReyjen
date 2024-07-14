<?php ob_start(); ?>
<?php include('partial/menu.php') ?>

            <div class="main-content">
                <div class="wrapper">
                    <h1>Update Admin</h1>
                    <br>

                    <?php
                    if(isset($_SESSION['update'])){ //Cek sessionnya sudah terisi atau belum (session di add-admin)
                        echo $_SESSION['update']; //Show session message
                        unset($_SESSION['update']); // Remove session message
                    }
                    ?>

                    <br><br>
                    
                    <?php //UNTUK LOAD ADMIN
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tbl_admin where id=$id";
                        $res = mysqli_query($conn, $sql);
                        
                        //mendapatkan data dari $res
                        $rows=mysqli_fetch_assoc($res);

                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                    ?>

                    <form action="" method="POST">

                        <table class="tbl-30">

                            <tr>
                                <td>Nama Lengkap</td>
                                <td class="text-right"><input type="text" name="full_name" value="<?php echo $full_name?>"></td>
                            </tr>

                            <tr>
                                <td>Username</td>
                                <td class="text-right"><input type="text" name="username" value="<?php echo $username?>"></td>
                            </tr>


                            <tr>
                                <td colspan="2" class="text-right">
                                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

<?php 
    if(isset($_POST['submit'])){
        // ambil data dari form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // query sql untuk save data ke database
        $sql2 = "UPDATE tbl_admin SET 
        full_name = '$full_name', 
        username = '$username'
        WHERE id=$id";

        // eksekusi save data ke database
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); //fungsi $conn liat di config/connectdb

        if($res2 == true){
            //query berhasil
            $_SESSION['update'] = "<div class='success'>Update berhasil !</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //query gagal
            $_SESSION['update'] = "<div class='failed'>Update gagal!</div>";
            header("location:".SITEURL.'admin/update-admin.php');
        }
    }
?>

<?php include('partial/footer.php') ?>
<?php ob_end_flush(); ?>