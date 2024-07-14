<?php 
    require('library/fpdf.php');
    include('../config/connectdb.php');
    include('login-check.php');

    // intance object dan memberikan pengaturan halaman PDF
    $pdf=new FPDF('P','mm','A4');
    $pdf->AddPage();
    
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(200,10,'REPORT PEMBELIAN',0,0,'C');
    
    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',8);
    $pdf->Cell(10,7,'NO',1,0,'C');
    $pdf->Cell(50,7,'SUPPLIER' ,1,0,'C');
    $pdf->Cell(23,7,'KONTAK' ,1,0,'C');
    $pdf->Cell(40,7,'BARANG',1,0,'C');
    $pdf->Cell(20,7,'HARGA',1,0,'C');
    $pdf->Cell(20,7,'QTY',1,0,'C');
    $pdf->Cell(20,7,'TOTAL',1,0,'C');
    
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',9);
    $no=1;
    $data = mysqli_query($conn,"SELECT  * FROM tbl_detail_pembelian order by id desc");

    while($d = mysqli_fetch_array($data)){
        $pdf->Cell(10,6, $no++,1,0,'C');
        $pdf->Cell(50,6, $d['supplier'],1,0);
        $pdf->Cell(23,6, $d['supplier_contact'],1,0);  
        $pdf->Cell(40,6, $d['title'],1,0);
        $pdf->Cell(20,6, $d['price'],1,0);
        $pdf->Cell(20,6, $d['qty'],1,0);
        $pdf->Cell(20,6, $d['total'],1,1);
    }
    
    $pdf->Output();
?>  