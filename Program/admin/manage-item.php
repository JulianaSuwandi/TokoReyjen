<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Item</h1><br>

                <?php 
                    if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di add-admin)
                        echo $_SESSION['add']; //Show session message
                        unset($_SESSION['add']); // Remove session message
                    }

                    if(isset($_SESSION['remove'])){ //Cek sessionnya sudah terisi atau belum (session di delete-item)
                        echo $_SESSION['remove']; //Show session message
                        unset($_SESSION['remove']); // Remove session message
                    }

                    if(isset($_SESSION['delete'])){ //Cek sessionnya sudah terisi atau belum (session di delete-item)
                        echo $_SESSION['delete']; //Show session message
                        unset($_SESSION['delete']); // Remove session message
                    }

                    if(isset($_SESSION['no-item-found'])){ //Cek sessionnya sudah terisi atau belum (session di update-item)
                        echo $_SESSION['no-item-found']; //Show session message
                        unset($_SESSION['no-item-found']); // Remove session message
                    }

                    if(isset($_SESSION['upload'])){ //Cek sessionnya sudah terisi atau belum (session di update-item)
                        echo $_SESSION['upload']; //Show session message
                        unset($_SESSION['upload']); // Remove session message
                    }

                    if(isset($_SESSION['failed-remove'])){ //Cek sessionnya sudah terisi atau belum (session di update-item)
                        echo $_SESSION['failed-remove']; //Show session message
                        unset($_SESSION['failed-remove']); // Remove session message
                    }

                    if(isset($_SESSION['update-item'])){ //Cek sessionnya sudah terisi atau belum (session di update-item)
                        echo $_SESSION['update-item']; //Show session message
                        unset($_SESSION['update-item']); // Remove session message
                    }
                ?>

                <br><br>

                <a href="<?php echo SITEURL; ?>admin/add-item.php" class="btn-primary">Tambah Barang</a>
                
                <br><br><br>
                <table class="tbl-full">
                    <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama Barang</th>
                        <th width="15%">Harga</th>
                        <th>Gambar</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        // UNTUK LOAD ADMIN" YANG TERDAFTAR
                        $sql = "SELECT * FROM tbl_item";
                        $res = mysqli_query($conn, $sql);
                        $count= mysqli_num_rows($res);
                        $number = 1;
                        
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                    //While loop untuk dapatkan semua data dari database

                                    // dapatkan data masing" row
                                    $id=$rows['id'];
                                    $title=$rows['title'];
                                    $price=$rows['price'];
                                    $image_name=$rows['image_name'];
                                    $featured=$rows['featured'];
                                    $active=$rows['active'];
                                    ?>
                                    

                                    <tr>
                                        <td><?php echo $number++ ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>Rp. <?php echo $price; ?></td>
                                        <td>
                                            <?php  
                                                if($image_name!=""){
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }
                                                else{
                                                    echo "<div class='failed'>Gambar tidak tersedia</div>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>

                                            <?php // UNTUK KE UPDATE-PASSWORD.PHP DAN MELEMPAR VALUE ID (kalau cek di webnya di kiri pojok bawah pas kursor di button)?>
                                            <a href="<?php echo SITEURL; ?>admin/update-item.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>

                                            <?php // UNTUK KE DELETE-ADMIN.PHP DAN MELEMPAR VALUE ID (kalau cek di webnya di kiri pojok bawah pas kursor di button)?>
                                            <a href="<?php echo SITEURL; ?>admin/delete-item.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name?>" class="btn-danger">Hapus</a>

                                        </td>
                                    </tr>
                                    

                                    <?php
                                }
                            }
                            else{
                                echo "<tr><td colspan='7' class='failed'>Item tidak ditemukan</td></tr>";
                            }
                    ?>
                
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partial/footer.php') ?>