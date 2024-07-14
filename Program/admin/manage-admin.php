<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1><br>

                <?php 
                    if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di add-admin)
                        echo $_SESSION['add']; //Show session message
                        unset($_SESSION['add']); // Remove session message
                    }

                    if(isset($_SESSION['delete'])){ //Cek sessionnya sudah terisi atau belum (session di delete-admin)
                        echo $_SESSION['delete']; //Show session message
                        unset($_SESSION['delete']); // Remove session message
                    }

                    if(isset($_SESSION['update'])){ //Cek sessionnya sudah terisi atau belum (session di delete-admin)
                        echo $_SESSION['update']; //Show session message
                        unset($_SESSION['update']); // Remove session message
                    }

                    if(isset($_SESSION['no-user'])){ //Cek sessionnya sudah terisi atau belum (session di delete-admin)
                        echo $_SESSION['no-user']; //Show session message
                        unset($_SESSION['no-user']); // Remove session message
                    }
                ?><br><br>

                <a href="<?php echo SITEURL; ?>admin/add-admin.php" class="btn-primary">Tambah Admin</a>
                
                <br><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>Nomor</th>
                        <th width="200px">Nama Lengkap</th>
                        <th width="300px">Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        // UNTUK LOAD ADMIN" YANG TERDAFTAR
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);
                        $number = 1;
                        
                        if($res == TRUE){
                            $count = mysqli_num_rows($res); // untuk ngecek banyaknya row di tabel
                            
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                    //While loop untuk dapatkan semua data dari database

                                    // dapatkan data masing" row
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    ?>

                                    <tr>
                                        <td><?php echo $number++ ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>

                                            <?php // UNTUK KE UPDATE-PASSWORD.PHP DAN MELEMPAR VALUE ID (kalau cek di webnya di kiri pojok bawah pas kursor di button)?>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>

                                            <?php // UNTUK KE UPDATE-ADMIN.PHP DAN MELEMPAR VALUE ID (kalau cek di webnya di kiri pojok bawah pas kursor di button)?>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>

                                            <?php // UNTUK KE DELETE-ADMIN.PHP DAN MELEMPAR VALUE ID (kalau cek di webnya di kiri pojok bawah pas kursor di button)?>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>

                                        </td>
                                    </tr>
                                    

                                    <?php
                                }
                            }
                            else{

                            }
                        }
                    ?>
                
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partial/footer.php') ?>