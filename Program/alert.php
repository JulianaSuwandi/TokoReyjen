<?php ob_start(); ?>

<?php include('partials-front/menu.php'); ?>

<?php
    $id_customer = $_GET['id_customer'];
   $target = "082153015332";
   $token = "nTKsV72P+LKj@PV#8NDB#";
   $message = "Ada pesanan masuk! Silahkan cek website!";
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
   'message' => $message,
   ),
   CURLOPT_HTTPHEADER => array(
      "Authorization: $token"
   ),
   ));
   $response = curl_exec($curl);
   curl_close($curl);

   header('location:'.SITEURL.'alert-customer.php?id_customer='.$id_customer.'');
?>

<?php include('partials-front/footer.php'); ?>  

<?php ob_end_flush(); ?>