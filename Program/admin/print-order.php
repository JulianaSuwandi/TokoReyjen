<?php 
    require('library/fpdf.php');
    include('../config/connectdb.php');
    include('login-check.php');

    // intance object dan memberikan pengaturan halaman PDF
    $pdf=new FPDF('P','mm','A4');
    $pdf->AddPage();
    
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(200,10,'REPORT ORDER',0,0,'C');
    
    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'NO',1,0,'C');
    $pdf->Cell(30,7,'TANGGAL' ,1,0,'C');
    $pdf->Cell(35,7,'NAMA KONSUMEN',1,0,'C');
    $pdf->Cell(45,7,'BARANG',1,0,'C');
    $pdf->Cell(15,7,'QTY',1,0,'C');
    $pdf->Cell(25,7,'TOTAL',1,0,'C');
    $pdf->Cell(25,7,'STATUS',1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',9);
    $no=1;
    $data = mysqli_query($conn,"SELECT  * FROM tbl_detail_order order by id desc");

    while($d = mysqli_fetch_array($data)){
        $pdf->Cell(10,6, $no++,1,0,'C');
        $pdf->Cell(30,6, $d['order_date'],1,0);
        $pdf->Cell(35,6, $d['customer_name'],1,0);  
        $pdf->Cell(45,6, $d['item'],1,0);
        $pdf->Cell(15,6, $d['qty'],1,0);
        $pdf->Cell(25,6, $d['total'],1,0);
        $pdf->Cell(25,6, $d['status'],1,1);
    }
    
    $pdf->Output();
?>