<?php ob_start(); ?>

<?php include('partial/menu.php') ?>

            <div class="main-content">
                <div class="wrapper">
                    <h1>Tambah Pembelian</h1>
                    <br>
                
                    <?php
                        if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                            echo $_SESSION['add']; //Show session message
                            unset($_SESSION['add']); // Remove session message
                        }
                    ?>

                    <br><br>

                    <form action="" method="POST">

                        <table class="tbl-30" style="width:35%">

                            <tr>
                                <td>Nama Supplier</td>
                                <td class="text-right"><input type="text" name="supplier" placeholder="Masukkan Nama Supplier"></td>
                            </tr>

                            <tr>
                                <td>Kontak Supplier</td>
                                <td class="text-right"><input type="text" name="supplier_contact" placeholder="Masukkan Nomor Supplier"></td>
                            </tr>

                            <tr>
                                <td>Nama Barang</td>
                                <td class="text-right">
                                    <select name="id_item">

                                    <?php
                                        $sql = "SELECT * FROM tbl_item";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if($count>0){
                                            while($row=mysqli_fetch_assoc($res)){
                                                $id_item = $row['id'];
                                                $title = $row['title'];
                                                ?>
                                                    <option value="<?php echo $id_item; ?>"><?php echo $title; ?></option>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <option value="0">Tidak ada kategori yang tersedia.</option>
                                            <?php
                                        }

                                    ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Qty</td>
                                <td class="text-right"><input type="number" name="qty" placeholder="0"></td>
                            </tr>
                            
                            <tr>
                                <td>Harga</td>
                                <td class="text-right"><input type="number" name="price" placeholder="0"></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-right">
                                    <input type="submit" name="submit" value="Tambah Pembelian" class="btn-secondary">
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
        $supplier = $_POST['supplier'];
        $supplier_contact = $_POST['supplier_contact'];
        $id_item = $_POST['id_item'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $total = $qty*$price;

        $sql4 = "SELECT * FROM tbl_item where id=$id_item";
        $res4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));

        //mendapatkan data dari $res
        $rows=mysqli_fetch_assoc($res4);
        $title = $rows['title'];

        // query sql untuk save data ke database
        $sql2 = "INSERT INTO tbl_detail_pembelian SET
        supplier = '$supplier',
        supplier_contact = '$supplier_contact',
        id_item = $id_item,
        title = '$title',
        qty = $qty,
        price = $price,
        total = $total
        ";

        // eksekusi save data ke database
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); //fungsi $conn liat di config/connectdb
        
        $sql3 = "INSERT INTO tbl_pembelian SET
        id_item = $id_item,
        qty = $qty,
        total = $total
        ";

        $res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

        if($res2 == true){
            //query berhasil
            $_SESSION['add'] = "<div class='success'>Pembelian telah ditambahkan !</div>";
            header("location:".SITEURL.'admin/manage-pemasukan.php');
        }
        else{
            //query gagal
            $_SESSION['add'] = "<div class='failed'>Penambahan pembelian Gagal!</div>";
            header("location:".SITEURL.'admin/add-pemasukan.php');
        }
    }
?>

<?php ob_end_flush(); ?>