<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Customer</h1><br>

                <?php 

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

                <br>
                <table class="tbl-full">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Lengkap</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        // UNTUK LOAD ADMIN" YANG TERDAFTAR
                        $sql = "SELECT * FROM tbl_customer";
                        $res = mysqli_query($conn, $sql);
                        $number = 1;
                        
                        if($res == TRUE){
                            $count = mysqli_num_rows($res); // untuk ngecek banyaknya row di tabel
                            
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                    //While loop untuk dapatkan semua data dari database

                                    // dapatkan data masing" row
                                    $id=$rows['id'];
                                    $customer_name=$rows['customer_name'];
                                    $customer_contact=$rows['customer_contact'];
                                    $customer_email=$rows['customer_email'];
                                    $customer_address=$rows['customer_address'];
                                    ?>

                                    <tr>
                                        <td><?php echo $number++ ?></td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>

                                            <a href="<?php echo SITEURL; ?>admin/update-customer.php?id=<?php echo $id; ?>" class="btn-secondary">Update Customer</a>

                                            <a href="<?php echo SITEURL; ?>admin/delete-customer.php?id=<?php echo $id; ?>" class="btn-danger">Delete Customer</a>

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