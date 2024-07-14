<?php ob_start(); ?>
<?php include('partials-front/menu.php'); ?>

<?php
//dapatkan detail item yang ingin di checkout
    if(isset($_GET['item_id'])){
        $item_id = $_GET['item_id'];
        $sql = "SELECT * FROM tbl_item WHERE id=$item_id";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count>0){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else{
            header('location:'.SITEURL);
        }
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
                    <legend>Barang yang terpilih</legend>

                    <div class="item-menu-img">
                        <?php 
                            //cek apakah ada gambar di item
                            if($image_name== ""){
                                echo "<div class='failed'>Gambar tidak ada.</div>";
                            }
                            else{
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                    </div>

                    <div class="item-menu-desc">
                        <h3><?php echo $title ?></h3>
                        <input type="hidden" name="item" value="<?php echo $title; ?>">

                        <p class="item-price">Rp. <?php echo $price ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                    </fieldset>
                
                    <fieldset>
                        <legend>Alamat Pengantaran</legend>
                        <div class="order-label">Detail Customer</div>
                            <select name="id_customer" class="input-responsive">
                                <?php
                                    $sql2 = "SELECT * FROM tbl_customer order by customer_name";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $count = mysqli_num_rows($res2);
    
                                    if($count>0){
                                        while($row=mysqli_fetch_assoc($res2)){
                                            $id_customer = $row['id'];
                                            $customer_name = $row['customer_name'];
                                            $customer_address = $row['customer_address'];
                                            ?>
                                                <option value="<?php echo $id_customer; ?>"><?php echo $customer_name; ?> ( <?php echo $customer_address; ?> )</option>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <option value="0">Tidak ada customer yang tersedia.</option>
                                        <?php
                                    }
    
                                ?>
                            </select>
                                </td>
                            </tr>
                            <a href="<?php echo SITEURL; ?>order.php?item_id=<?php echo $item_id; ?>" class="text-white-small"><i>Daftar baru? Klik disini.</i></a>

                        <div class="order-label">Delivery</div>
                            <select name="delivery" class="input-responsive">
                                <option value="Toko">Ambil di Toko</option>
                                <option value="COD">COD</option>
                                <option value="Transfer">Transfer</option>
                            </select><br>
                            
                        <div class="order-label">Konfirmasi Ulang Nomor HP</div>
                        <input type="tel" name="contact" placeholder="0898xxxxxxx" class="input-responsive" minlength="10" maxlength="13" required>

                        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    </fieldset>

            </form>

            <?php

                if(isset($_POST['submit'])){
                    $customer_contact = $_POST['contact'];
                    $id_customer = $_POST['id_customer'];
                    $item = $_POST['item'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;
                    $delivery = $_POST['delivery'];
                    $order_date = date("Y-m-d h:i:s");

                    $status = "Ordered";
                    
                    $sql5 = "SELECT * FROM tbl_customer where id=$id_customer";
                    $res5 = mysqli_query($conn,$sql5);
                    $row5 = mysqli_fetch_assoc($res5);
                    $customer_contact2 = $row5['customer_contact'];
                    
                    if($customer_contact==$customer_contact2){
                        $sql3 = "INSERT INTO tbl_detail_order SET
                        item = '$item',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        delivery = '$delivery',
                        order_date = '$order_date',
                        status = '$status',
                        id_customer = '$id_customer'
                        ";
    
                        $res3 = mysqli_query($conn, $sql3);
    
                        $sql4 = "INSERT INTO tbl_order SET
                        order_date = '$order_date',
                        total = $total,
                        status = '$status',
                        id_customer = '$id_customer'
                        ";
    
                        $res4 = mysqli_query($conn, $sql4);
    
                        if($res2==true){
                            $_SESSION['order'] = "<div class='success text-center'>ORDER BERHASIL.<br>Silahkan cek WhatsApp anda.</div>";
                            header('location:'.SITEURL.'alert.php?id_customer='.$id_customer.'');
                        }
                        else{
                            $_SESSION['order'] = "<div class='failed text-center'>ORDER GAGAL.".mysqli_error($conn)."</div>";
                            header('location:'.SITEURL);
                        }
                    }
                    else{
                        ?> <div class='failed text-center'><b>NOMOR HP TIDAK COCOK !</b></div> <?php
                    }
                    
                    
                    
                }
            ?>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>    

<?php ob_end_flush(); ?>
