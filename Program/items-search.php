<?php include('partials-front/menu.php'); ?>

    <!-- item Search Section Start -->
    <section class="item-search">
        <div class="container" style="text-align:center">
        
        <?php 
        //ambil keyword yang diketik dari search
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>
            <h2 style="color:white">Barang yang berkaitan dengan "<a href="#" class="text-white"><?php echo $search; ?></a>"</h2>
        </div>
    </section>
    <!-- item Search Section End -->

    <!-- item Menu Section Start -->
    <section class="item-list">
        <div class="container">
            <h1 style="text-align:center; font-size:170%">LIST BARANG</h1><br>

            <?php 
                //display item berdasarkan hasil search
                $sql = "SELECT * FROM tbl_item WHERE title like '%$search%' or description like '%$search%' and active='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
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
                    echo "<div class='failed'>Tidak ada barang yang sesuai.</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- item Menu Section End -->

<?php include('partials-front/footer.php'); ?>    