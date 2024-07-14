<?php ob_start(); ?>
<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">

    <br><br>

    <?php
        if(isset($_SESSION['upload'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
            echo $_SESSION['upload']; //Show session message
            unset($_SESSION['upload']); // Remove session message
        }
     ?><br><br>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30" style="width:60%">
            <tr>
                <td>Nama Barang: </td>
                <td>
                    <input type="text" name="title" placeholder="Nama barang">
                </td>
            </tr>

            <tr>
                <td>Deskripsi: </td>
                <td>
                    <textarea name="description" placeholder="Deskripsi barang" cols="30" rows="5" maxlength="180"></textarea>
                </td>
            </tr>

            <tr>
                <td>Harga: </td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>

            <tr>
                <td>Upload Gambar:</td>
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
                                $id = $row['id'];
                                $title = $row['title'];
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
                    <input type="radio" name="featured" value="Yes"> Ya
                    <input type="radio" name="featured" value="No"> Tidak
                </td>
            </tr>

            <tr>
                <td>Aktif:</td>
                <td>
                    <input type="radio" name="active" value="Yes"> Ya
                    <input type="radio" name="active" value="No"> Tidak
                </td>
            </tr>

            <tr>
                <td colspan="2">
                        <input type="submit" name="submit" value="Tambah Barang" class="btn-secondary">
                    </td>
                </tr>
        </table>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //cek radiobutton featurednya udh dicheck apa belum
            if(isset($_POST['featured'])){
                $featured = $_POST['featured'];
            }
            else{
                $featured = "No"; //set value default
            }

            //cek radiobutton activenya udh dicheck apa belum
            if(isset($_POST['active'])){
                $active = $_POST['active'];
            }
            else{
                $active = "No"; //set value default
            }

            //cek apakah ada gambar atau tidak
            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];

                    //mengubah nama file gambarnya
                    if($image_name!=""){
                        $ext = explode('.', $image_name);
                        $ext = end($ext);
                        $image_name = "Item-Name-".rand(0000,9999).'.'.$ext;

                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/item/".$image_name;

                        $upload = move_uploaded_file($src,$dst);
                        if($upload==false){
                            $_SESSION['upload'] = "<div class='error'>Gagal menambahkan gambar</div>";
                            header("location:".SITEURL.'admin/add-item.php');
                        }
                    }
            }
            else{
                $image_name = "";
            }


            $sql2 = "INSERT INTO tbl_item SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active= '$active'
            ";

            $res = mysqli_query($conn, $sql2);

            if($res == true){
                $_SESSION['add'] = "<div class='success'>Menambah item berhasil</div>";
                header("location:".SITEURL.'admin/manage-item.php');
            }
            else{
                $_SESSION['add'] = "<div class='failed'>Menambah item gagal</div>";
                header("location:".SITEURL.'admin/manage-item.php');
            }


        }
    ?>



    </div>
</div>

<?php include('partial/footer.php') ?>
<?php ob_end_flush(); ?>