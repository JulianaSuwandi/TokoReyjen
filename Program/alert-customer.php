<?php ob_start(); ?>

<?php include('partials-front/menu.php'); ?>

<?php
    $id_customer = $_GET['id_customer'];
    $sql = "SELECT * FROM tbl_detail_order ORDER BY order_date DESC limit 1";
    $res = mysqli_query($conn, $sql);

    if($res==true){
        $row=mysqli_fetch_assoc($res);
        $item = $row['item'];
        $price = $row['price'];
        $qty = $row['qty'];
        $status = $row['status'];
        $total = $row['total'];
        $delivery = $row['delivery'];
    }
    else{
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    
    $sql2 = "SELECT * FROM tbl_customer where id='".$id_customer."'";
    $res2 = mysqli_query($conn, $sql2);
    
    if($res2==true){
        $row2=mysqli_fetch_assoc($res2);
        $customer_name = $row2['customer_name'];
        $customer_contact = $row2['customer_contact'];
        $customer_email = $row2['customer_email'];
        $customer_address = $row2['customer_address'];
    }
    else{
        header('location:'.SITEURL.'admin/manage-order.php');
    }

    $target = $customer_contact;
    $token = "Y0+#FAw@XW@G!uNrm!_6";

    if($delivery=="Toko"){
        $delivery = "ambil di TOKO";
        $message = "Anda telah melakukan pembelian di toko Reyjen sebesar Rp.".$total." dengan sistem ".$delivery.". Silahkan ambil barang di toko dalam waktu paling lambat 7 hari setelah pemesanan.

Alamat toko : jalan Tanjung Ria, Aji Melayu Lating No 73, Kecamatan Sepauk, Kabupaten Sintang

Google map : https://goo.gl/maps/qXvrBHfJ1z2tKGRQ7";
    }
    elseif($delivery=="COD"){
        $total = $total+10000;
        $message = "Anda telah melakukan pembelian di toko Reyjen sebesar Rp.".$total." (Sudah termasuk ongkir Rp.10.000) dengan sistem ".$delivery.". Silahkan menunggu konfirmasi dari kami.";
    }
    elseif($delivery=="Transfer"){
        $random = (rand(1,200));
        $total = $total+$random+10000;
        $message = "Anda telah melakukan pembelian di toko Reyjen dengan sistem ".$delivery.". Silahkan transfer sebesar Rp.".$total." (termasuk ongkir Rp.10.000 + kode unik ".$random.") ke rekening *1711200024* (BCA a.n. Darwin Edryan), jika telah mentransfer silahkan menunggu konfirmasi dari kami.";
    }
   
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
    'target' => $target,
    'message' => $message."

*DETAIL PEMESANAN*
Nama Pemesan = ".$customer_name."
Alamat = ".$customer_address."
Barang = ".$item."
Harga Satuan = ".$price."
Jumlah = ".$qty."
Total = Rp.".$total."
Sistem = ".$delivery
,
    ),
    CURLOPT_HTTPHEADER => array(
        "Authorization: $token"
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    header('location:'.SITEURL);
?>

<?php include('partials-front/footer.php'); ?>    

<?php ob_end_flush(); ?>