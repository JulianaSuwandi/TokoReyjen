<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
                <div class="wrapper-order">
                    <h1>Manage Order</h1><br><br>

                    
                    <a href="<?php echo SITEURL; ?>admin/print-order.php" class="btn-secondary">PRINT PDF</a>

                    <br><br><br>

                    <?php
                    if(isset($_SESSION['update'])){ //Cek sessionnya sudah terisi atau belum (session di update-admin)
                        echo $_SESSION['update']; //Show session message
                        unset($_SESSION['update']); // Remove session message
                    }
                    ?>
                
                    <br><br>
                    <table class="tbl-full">
                        <tr>
                            <th width="10px">No</th>
                            <th width="70px">Barang</th>
                            <th width="40px">Qty</th>
                            <th width="70px">Total</th>
                            <th width="110px">Tanggal Order</th>
                            <th width="70px">Status</th>
                            <th width="100px">Nama Customer</th>
                            <th width="100px">No HP</th>
                            <th width="150px">Sistem</th>
                            <th width="400px">Alamat</th>
                            <th width="100px">Actions</th>
                        </tr>

                        <?php  
                            //tampilkan semua order di database
                            $sql = "SELECT * FROM tbl_detail_order order by id desc"; //order agar pesanan baru terletak paling atas
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $number=1;
                            
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $item = $row['item'];
                                    $price = $row['price'];
                                    $qty = $row['qty'];
                                    $total = $row['total'];
                                    $order_date = $row['order_date'];
                                    $delivery = $row['delivery'];
                                    $status = $row['status'];
                                    $id_customer = $row['id_customer'];
                                    
                                    $sql2 = "SELECT * FROM tbl_customer where id=$id_customer";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $row2=mysqli_fetch_assoc($res2);
                                    $customer_name = $row2['customer_name'];
                                    $customer_contact = $row2['customer_contact'];
                                    $customer_email = $row2['customer_email'];
                                    $customer_address = $row2['customer_address'];

                                    ?>
                                        <tr>
                                            <td><?php echo $number++; ?></td>
                                            <td><?php echo $item; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                            <td>
                                                <?php 
                                                // Ordered, Sedang Diantar, Telah Diantar, Cancelled
                                                    if($status=="Ordered"){
                                                        echo "<label>$status</label>";
                                                    }
                                                    elseif($status=="Sedang Diantar"){
                                                        echo "<label style='color:orange;'>$status</label>";
                                                    }
                                                    elseif($status=="Selesai"){
                                                        echo "<label style='color:green;'>$status</label>";
                                                    }
                                                    elseif($status=="Cancelled"){
                                                        echo "<label style='color:red;'>$status</label>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $customer_contact; ?></td>
                                            <td><?php echo $delivery; ?></td>
                                            <td><?php echo $customer_address; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else{
                                echo "<tr><td colspan='12' class='failed'>Order tidak ada.</td></tr>";
                            }
                        ?>
                    
                    </table>
                </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partial/footer.php') ?>