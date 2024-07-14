<?php ob_start(); ?>
<?php include('partials-front/menu.php'); ?>

<?php
//dapatkan detail item yang ingin di checkout
    if(isset($_GET['item_id'])){
        $item_id = $_GET['item_id'];
    }
    else{
        header('location:'.SITEURL);
    }
?>

        
    <section class="item-search">
        <div class="container">
            
            <h2 style="color:white" align="center">Lengkapi form</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Alamat Pengantaran</legend>
                
                        <a href="<?php echo SITEURL; ?>order-registered.php?item_id=<?php echo $item_id; ?>" class="text-white"><i>Sudah pernah mengisi form ini sebelumnya? Klik disini.</i></a>
                        <div class="order-label"><br>Nama Lengkap</div>
                        <input type="text" name="full-name" placeholder="nama lengkap anda" class="input-responsive" required>

                        <div class="order-label">Nomor WhatsApp Aktif ( Informasi pesanan akan dikirim ke nomor ini )</div>
                        <input type="tel" name="contact" placeholder="0898xxxxxxx" class="input-responsive" minlength="10" maxlength="13" required>

                        <div class="order-label">Email</div>
                        <input type="email" name="email" placeholder="emailanda@xxxxx.com" class="input-responsive" required>

                        <div class="order-label">Alamat Lengkap</div>
                        <textarea name="address" rows="10" placeholder="alamat lengkap anda" class="input-responsive" required></textarea>

                        <input type="submit" name="submit" value="Lanjutkan" class="btn btn-primary">
                        

            </form>

            <?php

                if(isset($_POST['submit'])){
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO tbl_customer SET
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true){
                        header('location:'.SITEURL.'order-registered.php?item_id='.$item_id.'');
                    }
                    else{
                        $_SESSION['order'] = "<div class='failed text-center'>PENGISIAN DATA SALAH.".mysqli_error($conn)."</div>";
                        header('location:'.SITEURL);
                    }
                }
            ?>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>    

<?php ob_end_flush(); ?>
