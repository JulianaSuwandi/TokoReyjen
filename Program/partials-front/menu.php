<?php include('config/connectdb.php') ?>
<style>img[alt="www.000webhost.com"]{display:none;}</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- INI PENTING BIAR WEBNYA RESPONSIF -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REYJEN</title>

    <link rel="icon" type="image/png" href="images/reyjen.png">

    <!-- Nge link ke css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigator Bar Section Start -->
    <section class="navbar">
        <div class="container-navbar"> 
            <div class="logo">
                <a href="<?php echo SITEURL; ?>"><img src="images/reyjen.png" alt="Logo" class="img-responsive"></a>  
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Kategori</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>items.php">Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Admin</a>
                    </li>
                </ul>
            </div>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navigator Bar Section End -->