<?php include('partial/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>

                <?php
                if(isset($_SESSION['login'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                    echo $_SESSION['login']; //Show session message
                    unset($_SESSION['login']); // Remove session message
                }
                ?><br>

                <div class="col-4 text-center">

                    <?php
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);   
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count ?></h1><br>
                    Kategori
                </div>

                <div class="col-4 text-center">

                    <?php
                        $sql2 = "SELECT * FROM tbl_item";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2 ?></h1><br>
                    Barang
                </div>

                <div class="col-4 text-center">

                    <?php
                        $sql3 = "SELECT * FROM tbl_detail_order";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1><?php echo $count3 ?></h1><br>
                    Total Order
                </div>

                <div class="col-4 text-center">

                    <?php 
                        $sql4 = "SELECT SUM(total) as Total FROM tbl_detail_order where status='Selesai'";
                        $res4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        $total_revenue = $row4['Total'];
                    ?>
                    <h1>Rp. <?php echo $total_revenue ?></h1><br>
                    Total Pendapatan
                </div>

                <div class="clearfix"></div>
                <br><br><br><br><br><br>
            </div>
        </div>
        <!-- Main Content Section Ends -->


<?php include('partial/footer.php') ?>