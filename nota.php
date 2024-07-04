<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'NOTA PEMBELIAN BUAH',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Ecommerce ini dikembangkan oleh kelompok 2',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$id = $_GET ['idUser'];
$conn = mysqli_connect('localhost', 'root', '', 'toko_jamu');

$queryUser = mysqli_query($conn, "SELECT namaUser FROM tabel_user WHERE idUser= '$id'");
$arrayUser = mysqli_fetch_array($queryUser);
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,6,'Nama Pelanggan : '.$arrayUser["namaUser"],0,1);


$queryBarang = mysqli_query($conn, "SELECT * FROM tabel_transaksi ORDER BY idTransaksi DESC");
$arrayBarang = mysqli_fetch_array($queryBarang);
$pdf->SetFont('Arial','',12);
$pdf->Cell(27,6,"Transaksi dilakukan tanggal : ".$arrayBarang['tanggal'],0,1);

$queryUser = mysqli_query($conn, "SELECT alamat FROM tabel_user WHERE idUser= '$id'");
$arrayUser = mysqli_fetch_array($queryUser);
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,6,'Alamat Pelanggan : '.$arrayUser["alamat"],0,1);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'Nama Barang',1,0);
$pdf->Cell(50,6,'Total yang harus dibayarkan',1,1);

$pdf->SetFont('Arial','',10);
$start_x=$pdf->GetX(); 
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();
$cell_width = 125; 
$cell_width_total = 50; 
$cell_height=7; 

			$pdf->MultiCell($cell_width,$cell_height,$arrayBarang['daftarBarang'],1); 
			$current_x+=$cell_width;                           
			$pdf->SetXY($current_x, $current_y);

			$pdf->MultiCell($cell_width_total,$cell_height,"Rp. ".$arrayBarang['total'],1); 
			$pdf->Ln();                          

            // $pdf->MultiCell(150,7,$arrayBarang['daftarBarang'],1,0);
            // $pdf->Cell(25,7,$arrayBarang['total'],1,1); 

$pdf->Cell(10,25,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Write(5,'Terima Kasih sudah Berbelanja, Silahkan Tranfer ke Rekening Mandiin 140-0-0-165473-4 an. Udin Amaruddin atau Transfer ke Rekening Becean 190-0-0-571917-5 an. Udin Komarudin.',0,1);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Write(5,'Barang anda akan segera kami kirim setelah pembayaran dilakukan. Silakan kirim bukti pembayaran melalui no. wa ini : 081236428710. Semoga anda nyaman dengan layanan kami.!.',0,1);
 
$pdf->Output();
?>