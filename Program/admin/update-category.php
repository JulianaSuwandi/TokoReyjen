<?php ob_start(); ?>

<?php include('partial/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Kategori</h1>

            <br><br>

            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_category WHERE id=$id";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res); //menghitung jumlah row untuk cek id apakah valid atau tidak

                    if($count==1){
                        $row = mysqli_fetch_assoc($res);

                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else{
                        $_SESSION['no-category-found']="<div class='error'>Kategori tidak ditemukan.</div>";
                        header("location:".SITEURL.'admin/manage-category.php');
                    }
                }
                else{
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30" style="width:60%">
                    <tr>
                        <td>Judul Kategori:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Gambar Sekarang:</td>
                        <td>
                            <?php 
                                if($current_image!=""){
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image;?>" width="100px">
                                    <?php
                                }
                                else{
                                    echo "<div class='error'>Gambar tidak ditambahkan</div>";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Gambar Baru:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes"> Ya
                            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> Tidak
                        </td>
                    </tr>

                    <tr>
                        <td>Aktif:</td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Ya
                            <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> Tidak
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Kategori" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>


            <?php 
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured= $_POST['featured'];
                    $active= $_POST['active'];

                    //ngecek apakah ada gambar baru
                    //kalau ada
                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];

                        if($image_name != ""){
                            //menambahkan gambar baru
                            $ext = explode('.', $image_name);
                            $ext = end($ext);
                            $image_name = "Item_Category_".rand(000,999).'.'.$ext;

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/category/".$image_name;

                            $upload = move_uploaded_file($source_path,$destination_path);
                            if($upload==false){
                                $_SESSION['upload'] = "<div class='error'>Gagal menambahkan gambar</div>";
                                header("location:".SITEURL.'admin/manage-category.php');
                                die();
                            }

                            //menghapus gambar lama
                            if($current_image!=""){
                                $remove_path = "../images/category/".$current_image;
                                $remove = unlink($remove_path);

                                if($remove==false){
                                    $_SESSION['failed-remove'] = "<div class='error'>Gagal menghapus gambar lama.</div>";
                                    header("location:".SITEURL.'admin/manage-category.php');
                                    die();
                                }
                            }
                        }
                        else{
                            $image_name = $current_image;
                        }
                    }
                    //kalau tidak ada
                    else{
                        $image_name = $current_image;
                    }

                    $sql2="UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true){
                        $_SESSION['update'] = "<div class='success'>Kategori berhasil diupdate.</div>";
                        header("location:".SITEURL.'admin/manage-category.php');
                    }
                    else{
                        $_SESSION['update'] = "<div class='success'>Kategori gagal diupdate.</div>";
                        header("location:".SITEURL.'admin/update-category.php');
                    }

                }
            ?>
        </div>
    </div>

<?php include('partial/footer.php'); ?>

<?php ob_end_flush(); ?>
