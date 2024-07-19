<?php include('partials-front/menu.php'); ?>

    <!-- item Search Section Start -->
    <section class="item-search">
        <div class="container" style="text-align:center">
            <form action="<?php echo SITEURL;?>items-search.php" method="POST">
                <input type="search" name="search" placeholder="Cari Barang" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!-- item Search Section End -->

    <?php 
        if(isset($_SESSION['order'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
            echo $_SESSION['order']; //Show session message
            unset($_SESSION['order']); // Remove session message
        }
    ?>
        
    <!-- Categories Section Start -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">KATEGORI BARANG</h2><br>

            <?php 
                //sql untuk display categories dari database
                $sql="SELECT * FROM tbl_category where active='Yes' and featured='Yes' LIMIT 3";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                            <a href="<?php echo SITEURL; ?>category-items.php?category_id=<?php echo $id ?>">
                            <div class="box-3 float-container">
                            <?php 
                                //cek apakah di kategori ada gambar atau tidak
                                if($image_name==""){
                                    echo "<div class='failed'>Gambar tidak ada</div>";
                                }
                                else{
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                                <h3 class="float-text text-white" ><?php echo $title; ?></h3>
                            </div>
                            </a>
                        <?php

                    }
                }
                else{
                    echo "<div class='failed'>Kategori tidak ada.</div>";
                }
            ?>
            
            <div class="clearfix"></div>
            <b><a href="<?php echo SITEURL; ?>categories.php"><div class="text-center" >Semua Kategori</div></a></b>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section End -->



    <!-- item Menu Section Start -->
    <section class="item-list">
        <div class="container">
            <h1 style="text-align:center; color:black; font-size:170%">LIST BARANG</h1><br>

            <?php 
                $sql2 = "SELECT * FROM tbl_item where active='Yes' and featured='Yes' limit 6";

                $res2 = mysqli_query($conn, $sql2);
                
                $count2 = mysqli_num_rows($res2);

                //cek apakah ada item atau tidak
                if($count2>0){
                    while($row=mysqli_fetch_assoc($res2)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="item-menu">
                                <div class="item-menu-img">
                                    <?php 
                                        //cek apakah ada gambar di item
                                        if($image_name== ""){
                                            echo "<div class='failed'>Gambar tidak ada.</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>" class="img-list img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                   
                                </div>
                                <div class="item-menu-desc">
                                    <p><b><?php echo $title; ?></b></p>
                                    <p class="item-price">Rp. <?php echo $price ?></p>
                                    <p class="item-detail"> <?php echo $description ?></p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?item_id=<?php echo $id; ?>" class="btn btn-primary">Order Barang Ini</a>
                                </div>
                            </div>      

                        <?php
                    }
                }
                else{
                    echo "<div class='success'>Item tidak tersedia</div>";
                }
            ?>

            <br>
            <div class="clearfix"></div><br>
            <b><a href="<?php echo SITEURL; ?>items.php"><div class="text-center" >Semua Barang</div></a></b>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Item Menu Section End -->

<?php include('partials-front/footer.php'); ?>    
