<?php
// error_reporting(0);
    require_once('../koneksi.php');

    $tglUpdate = '20 May 2022';
    $tambah = strtotime('5 hours');
    $tglDownload = Date('h:i a, d M Y', $tambah);
    // $tglDownload = Date('H:i:s, d M Y', mktime(0, 0, 0, 1, 1, 1998));

    require('fpdf.php');
    $pdf = new FPDF('L','mm','A4');
    $pdf->SetMargins(5,10); 

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(280,20,'DAFTAR DATA ALTERNATIF REKSA DANA OBLIGASI',0,1,'C');
    
    
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(60,7,'Tanggal update data : '.$tglUpdate,0,1);
    // $pdf->Cell(60,7,'Tanggal download : '.$tglDownload,0,1);
    $pdf->Cell(60,7,'',0,1);; 

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(17,10,'Alternatif',1,0,'C');
    $pdf->Cell(75,10,'Nama Produk',1,0,'C');
    $pdf->Cell(57,10,'Manajer Investasi',1,0,'C');
    $pdf->Cell(20,10,'Total AUM',1,0,'C');
    $pdf->Cell(15,10,'CAGR',1,0,'C');
    $pdf->Cell(20,10,'Drawdown',1,0,'C');
    $pdf->Cell(25,10,'Expense Ratio',1,0,'C');
    $pdf->Cell(30,10,'Minimal Pembelian',1,0,'C');
    $pdf->Cell(28,10,'Lama Peluncuran',1,1,'C');



    $rangking = mysqli_query($koneksi, "SELECT * FROM alternatif ORDER BY no_alternatif ASC");
    $i=0;
    $pdf->SetFont('Arial','',9);
    while($data = mysqli_fetch_array($rangking)) {
        
        $pdf->Cell(17,10,$data['no_alternatif'],1,0,'C');
        $pdf->Cell(75,10,$data['nama_produk'],1,0);
        $pdf->Cell(57,10,$data['kriteria1'],1,0);
        $pdf->Cell(20,10,$data['kriteria2'],1,0,'C');
        $pdf->Cell(15,10,$data['kriteria3'],1,0,'C');
        $pdf->Cell(20,10,$data['kriteria4'],1,0,'C');
        $pdf->Cell(25,10,$data['kriteria5'],1,0,'C');
        $pdf->Cell(30,10,$data['kriteria6'],1,0,'C');
        $pdf->Cell(28,10,$data['kriteria7'],1,1,'C');
        // $pdf->Cell(20,10,$i+=1,1,1,'C');
    }
    $pdf->SetTitle('Daftar Rangking');
    $pdf->Output('I','daftar rangking.pdf');

?>