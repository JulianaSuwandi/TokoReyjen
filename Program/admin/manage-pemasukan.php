<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
                <div class="wrapper">
                    <h1>Catatan Pembelian</h1><br>

                    <?php 
                        if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di add-admin)
                            echo $_SESSION['add']; //Show session message
                            unset($_SESSION['add']); // Remove session message
                        }

                        if(isset($_SESSION['delete'])){ //Cek sessionnya sudah terisi atau belum (session di delete-admin)
                            echo $_SESSION['delete']; //Show session message
                            unset($_SESSION['delete']); // Remove session message
                        }
                    
                    ?>
                    <br><br>

                    <a href="<?php echo SITEURL; ?>admin/add-pemasukan.php" class="btn-primary">Tambah Pembelian</a>
                    <a href="<?php echo SITEURL; ?>admin/print-pemasukan.php" class="btn-secondary">PRINT PDF</a>
                    
                    <br><br><br>
                    <table class="tbl-full">
                        <tr>
                            <th>No</th>
                            <th>Supplier</th>
                            <th>Kontak Supplier</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>

                        <?php  
                            //tampilkan semua order di database
                            $sql = "SELECT * FROM tbl_detail_pembelian order by id desc"; //order agar pesanan baru terletak paling atas
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $number=1;
                            
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $supplier = $row['supplier'];
                                    $supplier_contact = $row['supplier_contact'];
                                    $title = $row['title'];
                                    $qty = $row['qty'];
                                    $price = $row['price'];
                                    $total = $row['total'];

                                    ?>
                                        <tr>
                                            <td><?php echo $number++; ?></td>
                                            <td><?php echo $supplier; ?></td>
                                            <td><?php echo $supplier_contact; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/delete-pemasukan.php?id=<?php echo $id; ?>" class="btn-danger">Delete Pembelian</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else{
                                echo "<tr><td colspan='12' class='failed'>Pembelian tidak ada.</td></tr>";
                            }
                        ?>
                    
                    </table>
                </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partial/footer.php') ?>