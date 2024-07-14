<?php ob_start(); ?>
<?php include('partial/menu.php') ?>

            <div class="main-content">
                <div class="wrapper">
                    <h1>Ganti Password</h1>
                    <br>

                    <?php 
                        if(isset($_GET['id'])){
                            $id = $_GET['id']; 
                        }
                        //dari yg sebelumnya dilempar di manage-admin.php 
                    ?>

                    <br><br>
                    <form action="" method="POST">

                        <table class="tbl-30">

                            <tr>
                                <td>Password Lama</td>
                                <td class="text-right"><input type="password" name="current_password" placeholder="Masukkan Password Lama"></td>
                            </tr>

                            <tr>
                                <td>Password Baru</td>
                                <td class="text-right"><input type="password" name="new_password" placeholder="Masukkan Password Baru"></td>
                            </tr>

                            <tr>
                                <td>Konfirmasi Password</td>
                                <td class="text-right"><input type="password" name="confirm_password" placeholder="Masukkan Password Baru"></td>
                            </tr>


                            <tr>
                                <td colspan="2" class="text-right">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="Ganti Password" class="btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

<?php

            if(isset($_POST['submit'])){
                //AMBL DATA DARI FORM
                $id = $_POST['id'];     
                $current_password = md5($_POST['current_password']);    
                $new_password = md5($_POST['new_password']);  
                $confirm_password = md5($_POST['confirm_password']);   

                //query
                $sql = "SELECT * FROM tbl_admin where id=$id and password='$current_password'";
                $res = mysqli_query($conn, $sql);

                if($res==true){

                    //cek datanya ada apa engga
                    $count=mysqli_num_rows($res);

                    if($count==1){
                        if($new_password==$confirm_password){

                            //query untuk update password
                            $sql2 = "UPDATE tbl_admin SET
                            password='$new_password'
                            where id=$id";

                            $res2 = mysqli_query($conn, $sql2);

                            //password udh keganti
                            $_SESSION['no-user'] = "<div class='success'>Password berhasil diganti. </div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else{
                            //passwordnya ga cocok
                            $_SESSION['no-user'] = "<div class='failed'>Password tidak cocok. </div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else{
                        //usernya gak ada/password lama salah
                        $_SESSION['no-user'] = "<div class='failed'>Password lama salah. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                
            }


?>


<?php include('partial/footer.php') ?>
<?php ob_end_flush(); ?>