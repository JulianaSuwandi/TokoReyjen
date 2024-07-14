<?php ob_start(); ?>
<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php
            //cek apakah id order sudah dilempar dari manage-order
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_detail_order where id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1){
                    $row=mysqli_fetch_assoc($res);
                    $item = $row['item'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $delivery = $row['delivery'];
                    $id_customer = $row['id_customer'];

                }
                else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else{
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-order" style="width:60%">
                <tr>
                    <td width="150px">Nama Barang</td>
                    <td><b><?php echo $item ?></b></td>
                </tr>

                <tr>
                    <td>Harga</td>
                    <td><b>Rp. <?php echo $price ?></b></td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="Sedang Diantar"){echo "selected";} ?> value="Sedang Diantar">Sedang Diantar</option>
                            <option <?php if($status=="Selesai"){echo "selected";} ?> value="Selesai">Selesai</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Delivery</td>
                    <td>
                        <select name="delivery">
                            <option <?php if($delivery=="Toko"){echo "selected";} ?> value="Toko">Ambil di Toko</option>
                            <option <?php if($delivery=="COD"){echo "selected";} ?> value="COD">COD</option>
                            <option <?php if($delivery=="Transfer"){echo "selected";} ?> value="Transfer">Transfer</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
            //cek apakah button submit sudah ditekan
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price*$qty;
                $status = $_POST['status'];
                $delivery = $_POST['delivery'];

                $sql3 = "UPDATE tbl_detail_order SET
                qty=$qty,
                total = $total,
                status = '$status',
                delivery = '$delivery'
                where id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                $sql4 = "UPDATE tbl_order SET
                total = $total,
                status = '$status'
                where id=$id
                ";

                $res4 = mysqli_query($conn, $sql4);
                
                $sql5 = "UPDATE tbl_customer SET
                total = $total,
                status = '$status'
                where id=$id
                ";

                $res4 = mysqli_query($conn, $sql4);

                if($res3==true){
                    $_SESSION['update'] = "<div class='success'>Order berhasil diupdate.</div>";
                    header("location:".SITEURL.'admin/manage-order.php');
                }
                else{
                    $_SESSION['update'] = "<div class='failed'>Order gagal diupdate.</div>";
                    header("location:".SITEURL.'admin/manage-order.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partial/footer.php') ?>
<?php ob_end_flush(); ?>