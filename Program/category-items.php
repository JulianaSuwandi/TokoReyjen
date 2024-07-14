<?php include('partials-front/menu.php'); ?>

<?php 
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }
    else{
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="item-search text-center">
        <div class="container">
            
            <h2 class="text-white">Barang pada <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <!-- item Menu Section Start -->
    <section class="item-list">
        <div class="container">
            <h1 style="text-align:center; font-size:170%">LIST BARANG</h1><br>

            <?php 
                $sql2 = "SELECT * FROM tbl_item where category_id=$category_id AND active='Yes'";

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

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Item Menu Section End -->

<?php include('partials-front/footer.php'); ?>    