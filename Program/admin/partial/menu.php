<?php include('../config/connectdb.php'); ?>
<?php include('login-check.php'); ?>
<style>img[alt="www.000webhost.com"]{display:none;}</style>
<html>
    <head>
    <title>Reyjen - Home Page</title>

    <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="<?php echo SITEURL;?>index.php">Home</a></li>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-customer.php">Customer</a></li>
                    <li><a href="manage-pemasukan.php">Catatan Pembelian</a></li>
                    <li><a href="manage-category.php">Kategori</a></li>
                    <li><a href="manage-item.php">Barang</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->