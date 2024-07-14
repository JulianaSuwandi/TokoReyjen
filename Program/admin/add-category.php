<?php ob_start(); ?>
<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Tambah Kategori </h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                echo $_SESSION['add']; //Show session message
                unset($_SESSION['add']); // Remove session message
            }

            if(isset($_SESSION['upload'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                echo $_SESSION['upload']; //Show session message
                unset($_SESSION['upload']); // Remove session message
            }
        ?><br><br>

        <!-- Add category mulai -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30" style="width:60%">
                <tr>
                    <td>Judul Kategori:</td>
                    <td>
                        <input type="text" name="title" placeholder="kategori">
                    </td>
                </tr>

                <tr>
                    <td>Upload Gambar:</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Tambah Kategori" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            //ngecek apakah submit sudah ditekan
            if(isset($_POST['submit'])){
                $title = $_POST['title'];

                //untuk gambar
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    //mengubah nama file gambarnya
                    if($image_name!=""){
                        $ext = explode('.', $image_name);
                        $ext = end($ext);
                        $image_name = "Item_Category_".rand(000,999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        $upload = move_uploaded_file($source_path,$destination_path);
                        if($upload==false){
                            $_SESSION['upload'] = "<div class='error'>Gagal menambahkan gambar</div>";
                            header("location:".SITEURL.'admin/add-category.php');
                        }
                    }
                    
                }
                else{
                    $image_name="";
                }

                //untuk featured
                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }
                else{
                    $featured = "No";
                }

                //untuk active
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }
                else{
                    $active = "No";
                }

                //query untuk masukkan data ke sql
                $sql="INSERT INTO tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'";

                $res = mysqli_query($conn, $sql);

                if($res==true){
                    $_SESSION['add'] = "<div class='success'>Kategori berhasil ditambahkan.</div>";
                    header("location:".SITEURL.'admin/manage-category.php');
                }
                else{
                    $_SESSION['add'] = "<div class='success'>Kategori gagal ditambahkan.</div>";
                    header("location:".SITEURL.'admin/add-category.php');
                }
            }
        ?>
        <!-- Add category selesai -->
    </div>
</div>

<?php include('partial/footer.php'); ?>
<?php ob_end_flush(); ?>