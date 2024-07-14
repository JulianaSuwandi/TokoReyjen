<?php ob_start(); ?>

<?php include('partial/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Barang</h1>

            <br><br>

            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql2 = "SELECT * FROM tbl_item WHERE id=$id";
                    $res2 = mysqli_query($conn, $sql2);
                    $count = mysqli_num_rows($res2); //menghitung jumlah row untuk cek id apakah valid atau tidak

                    if($count==1){
                        $row = mysqli_fetch_assoc($res2);

                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $current_image = $row['image_name'];
                        $current_category = $row['category_id'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else{
                        $_SESSION['no-item-found']="<div class='error'>Barang tidak ditemukan.</div>";
                        header("location:".SITEURL.'admin/manage-item.php');
                    }
                }
                else{
                    header('location:'.SITEURL.'admin/manage-item.php');
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30" style="width:60%">
                    <tr>
                        <td>Judul Barang:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Deskripsi: </td>
                        <td>
                            <textarea name="description" placeholder="Deskripsi barang" cols="30" rows="5" maxlength="180"><?php echo $description; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Harga:</td>
                        <td>
                            <input type="number" name="price" value="<?php echo $price; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Gambar Sekarang:</td>
                        <td>
                            <?php 
                                if($current_image!=""){
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/item/<?php echo $current_image;?>" width="100px">
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
                        <td>Kategori:</td>
                        <td>
                            <select name="category">

                            <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                            <option <?php if($current_category==$category_id){echo "Selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <option value="0">Tidak ada kategori yang tersedia.</option>
                                    <?php
                                }

                            ?>
                            </select>
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
                            <input type="submit" name="submit" value="Update Barang" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>


            <?php 
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $current_image = $_POST['current_image'];
                    $category = $_POST ['category'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                    //ngecek apakah ada gambar baru
                    //kalau ada
                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];

                        if($image_name != ""){
                            //menambahkan gambar baru
                            $ext = explode('.', $image_name);
                            $ext = end($ext);
                            $image_name = "Item-Name-".rand(0000,9999).'.'.$ext;

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/item/".$image_name;

                            $upload = move_uploaded_file($source_path,$destination_path);
                            if($upload==false){
                                $_SESSION['upload'] = "<div class='error'>Gagal menambahkan gambar</div>";
                                header("location:".SITEURL.'admin/manage-item.php');
                                die();
                            }

                            //menghapus gambar lama
                            if($current_image!=""){
                                $remove_path = "../images/item/".$current_image;
                                $remove = unlink($remove_path);

                                if($remove==false){
                                    $_SESSION['failed-remove'] = "<div class='error'>Gagal menghapus gambar lama.</div>";
                                    header("location:".SITEURL.'admin/manage-item.php');
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

                    $sql3="UPDATE tbl_item SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active= '$active'
                    WHERE id=$id
                    ";

                    $res3 = mysqli_query($conn, $sql3);

                    if($res3==true){
                        $_SESSION['update-item'] = "<div class='success'>Barang berhasil diupdate.</div>";
                        header('location:'.SITEURL.'admin/manage-item.php');
                        die();
                    }
                    else{
                        $_SESSION['update-item'] = "<div class='success'>Barang gagal diupdate.</div>";
                        header('location:'.SITEURL.'admin/manage-item.php');
                        die();
                    }

                }
            ?>

        </div>
    </div>

<?php include('partial/footer.php'); ?>
<?php ob_end_flush(); ?>
