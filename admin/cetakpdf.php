<?php
require_once('library/tcpdf.php');
require_once('koneksi.php');

// Membuat objek TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Menyiapkan halaman
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Data User/Admin');
$pdf->SetSubject('Data User/Admin');
$pdf->SetKeywords('Data, User, Admin');

// Menambahkan halaman baru
$pdf->AddPage();

// Mengatur font
$pdf->SetFont('helvetica', 'B', 12);

// Menambahkan judul
$pdf->Cell(0, 10, 'Data Pemesan', 0, 1, 'C');

// Mengatur font
$pdf->SetFont('helvetica', '', 6);

// Menambahkan header tabel
$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(30, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(20, 10, 'Nomor', 1, 0, 'C');
$pdf->Cell(40, 10, 'Email', 1, 0, 'C');
$pdf->Cell(40, 10, 'Paket', 1, 0, 'C');
$pdf->Cell(25, 10, 'Alamat', 1, 0, 'C');
$pdf->Cell(20, 10, 'Tanggal', 1, 1, 'C');

// Menambahkan data ke dalam tabel
$query = "SELECT * FROM pendaftaran";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['nama'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['nomor'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['email'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['paket'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['alamat'], 1, 0, 'C');
    $pdf->Cell(20, 10, $row['tanggal'], 1, 1, 'C');
}

// Output file PDF
$pdf->Output('Cetak_Data_Pemesan.pdf', 'I');
?>
