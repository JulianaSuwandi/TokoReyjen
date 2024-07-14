<?php ob_start(); ?>

<?php include('partial/menu.php') ?>

            <div class="main-content">
                <div class="wrapper">
                    <h1>Add Admin</h1>
                    <br>
                
                    <?php
                        if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                            echo $_SESSION['add']; //Show session message
                            unset($_SESSION['add']); // Remove session message
                        }
                    ?>

                    <br><br>

                    <form action="" method="POST">

                        <table class="tbl-30">

                            <tr>
                                <td>Nama Lengkap</td>
                                <td class="text-right"><input type="text" name="full_name" placeholder="Masukkan Nama Lengkap"></td>
                            </tr>

                            <tr>
                                <td>Username</td>
                                <td class="text-right"><input type="text" name="username" placeholder="Masukkan Username"></td>
                            </tr>

                            <tr>
                                <td>Password</td>
                                <td class="text-right"><input type="password" name="password" placeholder="Masukkan Password"></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-right">
                                    <input type="submit" name="submit" value="Tambah Admin" class="btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

<?php include('partial/footer.php') ?>


<?php
    // BUAT NGECEK BUTTONNYA DITEKAN ATAU ENGGAK

    if(isset($_POST['submit']))
    {
        // ambil data dari form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //MD5 UNTUK ENCRYPT PASSWORD

        // query sql untuk save data ke database
        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
        ";

        // eksekusi save data ke database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //fungsi $conn liat di config/connectdb
        

        if($res == true){
            //query berhasil
            $_SESSION['add'] = "<div class='success'>Admin telah ditambahkan !</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //query gagal
            $_SESSION['add'] = "<div class='failed'>Penambahan Admin Gagal!</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>

<?php ob_end_flush(); ?>