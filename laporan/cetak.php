<?php
error_reporting(0);
    require_once('../koneksi.php');

    require('fpdf.php');
    $pdf = new FPDF('P','mm','A4');

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(190,20,'DAFTAR HASIL PERANGKINGAN REKSADANA OBLIGASI',0,1,'C');
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(60,7,'Tanggal update data :',0,1);
    $pdf->Cell(60,7,'Tanggal download :');

    $rangking = mysqli_query($koneksi, "SELECT * FROM rangking ORDER BY nilai_preferensi DESC");
    while($data = mysqli_fetch_array($rangking)) {
        $pdf->Cell(10,70,$data['no_alternatif']);
        $pdf->Cell(50,70,$data['nama_produk']);
        $pdf->Cell(90,70,$data['nilai_preferensi']);
    }
    $pdf->Output();

?>