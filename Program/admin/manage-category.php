<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
                <div class="wrapper">
                    <h1>Manage Kategori</h1><br>

                    <?php
                        if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di add-cat)
                            echo $_SESSION['add']; //Show session message
                            unset($_SESSION['add']); // Remove session message
                        }
                        if(isset($_SESSION['remove'])){ //Cek sessionnya sudah terisi atau belum (session di delete-cat)
                            echo $_SESSION['remove']; //Show session message
                            unset($_SESSION['remove']); // Remove session message
                        }
                        if(isset($_SESSION['delete'])){ //Cek sessionnya sudah terisi atau belum (session di delete-cat)
                            echo $_SESSION['delete']; //Show session message
                            unset($_SESSION['delete']); // Remove session message
                        }
                        if(isset($_SESSION['no-category-found'])){ //Cek sessionnya sudah terisi atau belum (session di update-cat)
                            echo $_SESSION['no-category-found']; //Show session message
                            unset($_SESSION['no-category-found']); // Remove session message
                        }
                        if(isset($_SESSION['update'])){ //Cek sessionnya sudah terisi atau belum (session di update-cat)
                            echo $_SESSION['update']; //Show session message
                            unset($_SESSION['update']); // Remove session message
                        }
                        if(isset($_SESSION['upload'])){ //Cek sessionnya sudah terisi atau belum (session di update-cat)
                            echo $_SESSION['upload']; //Show session message
                            unset($_SESSION['upload']); // Remove session message
                        }
                        if(isset($_SESSION['failed-remove'])){ //Cek sessionnya sudah terisi atau belum (session di update-cat)
                            echo $_SESSION['failed-remove']; //Show session message
                            unset($_SESSION['failed-remove']); // Remove session message
                        }
                    ?><br><br>
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Tambah Kategori</a>

                <br><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>Nomor</th>
                        <th>Judul Kategori</th>
                        <th>Gambar</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?> 
                                    <tr style="height:100px">
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>

                                        <td>
                                            <?php  
                                                if($image_name!=""){
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
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
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Kategori</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Kategori</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else{
                            ?> 
                                <tr>
                                    <td>
                                        <div colspan="6" class="error">Tidak ada Kategori</div>
                                    </td>
                                </tr>
                            <?php
                        }

                    ?>
                    

                
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partial/footer.php') ?>