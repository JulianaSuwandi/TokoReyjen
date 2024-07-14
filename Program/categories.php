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

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Kategori Barang</h2>

            <?php 
                //sql untuk display categories dari database
                $sql="SELECT * FROM tbl_category where active='Yes'";

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
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
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
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include('partials-front/footer.php'); ?>    