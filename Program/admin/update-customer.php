<?php ob_start(); ?>
<?php include('partial/menu.php') ?>

            <div class="main-content">
                <div class="wrapper">
                    <h1>Update Customer</h1>
                    <br>

                    <?php
                    if(isset($_SESSION['update'])){ //Cek sessionnya sudah terisi atau belum (session di add-admin)
                        echo $_SESSION['update']; //Show session message
                        unset($_SESSION['update']); // Remove session message
                    }
                    ?>

                    <br><br>
                    
                    <?php //UNTUK LOAD CUSTOMER
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tbl_customer where id=$id";
                        $res = mysqli_query($conn, $sql);
                        
                        //mendapatkan data dari $res
                        $rows=mysqli_fetch_assoc($res);

                        $customer_name=$rows['customer_name'];
                        $customer_contact=$rows['customer_contact'];
                        $customer_email=$rows['customer_email'];
                        $customer_address=$rows['customer_address'];
                    ?>

                    <form action="" method="POST">

                        <table class="tbl-30">

                            <tr>
                                <td>Nama Customer</td>
                                <td class="text-right"><input type="text" name="customer_name" value="<?php echo $customer_name?>"></td>
                            </tr>

                            <tr>
                                <td>Kontak</td>
                                <td class="text-right"><input type="tel" name="customer_contact" value="<?php echo $customer_contact?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Email</td>
                                <td class="text-right"><input type="text" name="customer_email" value="<?php echo $customer_email?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Alamat</td>
                                <td class="text-right"><input type="text" name="customer_address" value="<?php echo $customer_address?>"></td>
                            </tr>


                            <tr>
                                <td colspan="2" class="text-right">
                                    <input type="submit" name="submit" value="Update Customer" class="btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

<?php 
    if(isset($_POST['submit'])){
        // ambil data dari form
        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        // query sql untuk save data ke database
        $sql2 = "UPDATE tbl_customer SET 
        customer_name = '$customer_name', 
        customer_contact = '$customer_contact', 
        customer_email = '$customer_email', 
        customer_address = '$customer_address'
        WHERE id=$id";

        // eksekusi save data ke database
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); //fungsi $conn liat di config/connectdb

        if($res2 == true){
            //query berhasil
            $_SESSION['update'] = "<div class='success'>Update berhasil !</div>";
            header("location:".SITEURL.'admin/manage-customer.php');
        }
        else{
            //query gagal
            $_SESSION['update'] = "<div class='failed'>Update gagal!</div>";
            header("location:".SITEURL.'admin/update-customer.php');
        }
    }
?>

<?php include('partial/footer.php') ?>
<?php ob_end_flush(); ?>