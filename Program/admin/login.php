<?php ob_start(); ?>
<style>img[alt="www.000webhost.com"]{display:none;}</style>
<?php include('../config/connectdb.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Reyjen</title>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body bgcolor="#e9e9e9">
    <div class="login">
        <a href="<?php echo SITEURL; ?>"><img src="../images/back.png" alt="back" class="img-responsive" align="left" width="7%" style="position:relative;"></a><br><br>
        <h1 class="text-center" style="color:#000000;">LOGIN ADMIN</h1>

        <?php 
            if(isset($_SESSION['login'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                echo $_SESSION['login']; //Show session message
                unset($_SESSION['login']); // Remove session message
            }

            if(isset($_SESSION['no-login'])){ //Cek sessionnya sudah terisi atau belum (session di bawah)
                echo $_SESSION['no-login']; //Show session message
                unset($_SESSION['no-login']); // Remove session message
            }
        ?>
        <br>
        <!-- Login Form Start -->
        <form action="" method="POST" align="center">
            Username<br>
            <input type="text" name="username" placeholder="Masukkan username"><br><br>
            Password<br>
            <input type="password" name="password" placeholder="Masukkan password"><br><br>
            
            <input type="submit" name="submit" value="Login" class="btn btn-primary"> 
            
        </form>
        <!-- Login Form End -->

    </div>
</body>
</html>

<?php 
    //Ngecek submit sudah ditekan atau belum
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //ngecek apakah akun ada di database
        $sql = "SELECT * FROM tbl_admin where username='$username' and password='$password'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==1){
            $_SESSION['login'] = "<div class='success'>Login berhasil.</div>";
            header('location:'.SITEURL.'admin/index.php');

            $_SESSION['username'] = $username; //untuk digunakan ngecek apakah sudah login apa belum kedepannya 
            // dipakai di login-check.php (proteksi)
        }
        else{
            $_SESSION['login'] = "<div class='failed'>Username atau password salah.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>

<?php ob_end_flush(); ?>