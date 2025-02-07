<?php
// Sertakan pustaka TCPDF
require_once('../libs/tcpdf/tcpdf.php');

// Buat instance TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set dokumen informasi
$pdf->SetCreator('By Yusuf Abdilhaq');
$pdf->SetAuthor('Himpunan Mahasiswa Informatika');
$pdf->SetTitle('Data Karyawan');
$pdf->SetSubject('Data PDF Example');
$pdf->SetKeywords('TCPDF, PDF, example, data');

// Set header dan footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set font
$pdf->SetFont('helvetica', '', 8); // Ukuran font diperkecil menjadi 8

// Add a page
$pdf->AddPage();

// Tambahkan header dengan logo dan kalimat
$logo = 'https://spkdobha.my.id/assets/img/unnamed.png'; // Ganti dengan path logo Anda
$headerHTML = '<div style="text-align: center;">
                    <img src="' . $logo . '" alt="logo" height="80"> <!-- Ukuran logo diperkecil -->
                    <h2>Rangking Karyawan</h2>
                    <h4><i>Perhitungan Nilai Total Core Factor & Secondary Factor</i></h4>
               </div>';
$pdf->writeHTML($headerHTML, true, false, true, false, '');

// Sertakan file koneksi ke database
include '../../helper/koneksi.php';

// Ambil data dari database
$query = "SELECT users.name, calculations.cf1, calculations.sf1, calculations.nkc, calculations.cf2, 
                 calculations.sf2, calculations.nk, calculations.cf3, calculations.sf3, calculations.nsk, calculations.ha 
          FROM calculations 
          JOIN users ON users.id = calculations.employee_id 
          WHERE users.deleted = 'no' 
          ORDER BY calculations.ha DESC";
$result = $conn->query($query);

// Nomor urut dimulai dari 1
$no = 1;

// Tampilkan data dalam tabel
$pdf->Ln(5); // Tambahkan spasi di bawah header
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.3);

// Tambahkan header tabel dengan aspek-aspek
$pdf->SetFont('helvetica', 'B', 8);

// Baris pertama untuk aspek
$pdf->Cell(40, 10, '', 1, 0, 'C', 1); // Kosongkan untuk nomor dan nama
$pdf->Cell(45, 10, 'Aspek Kecerdasan', 1, 0, 'C', 1);
$pdf->Cell(45, 10, 'Aspek Kinerja', 1, 0, 'C', 1);
$pdf->Cell(45, 10, 'Aspek Sikap Kerja', 1, 0, 'C', 1);
$pdf->Cell(20, 10, '', 1, 1, 'C', 1); // Kosongkan untuk HA

// Baris kedua untuk kolom-kolom individual
$pdf->Cell(10, 10, 'No', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Nama', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'CF', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'SF', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'NKC', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'CF', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'SF', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'NK', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'CF', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'SF', 1, 0, 'C', 1);
$pdf->Cell(15, 10, 'NSK', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'HA', 1, 1, 'C', 1);

$pdf->SetFont('helvetica', '', 8);

// Periksa apakah ada halaman baru yang perlu ditambahkan sebelum menulis baris baru
foreach ($result as $row) {
    if ($pdf->GetY() + 10 > $pdf->getPageHeight() - $pdf->getBreakMargin()) {
        $pdf->AddPage(); // Tambahkan halaman baru
        // Tambahkan header tabel pada halaman baru
        $pdf->SetFont('helvetica', 'B', 8);

        // Baris pertama untuk aspek
        $pdf->Cell(40, 10, '', 1, 0, 'C', 1);
        $pdf->Cell(45, 10, 'Aspek Kecerdasan', 1, 0, 'C', 1);
        $pdf->Cell(45, 10, 'Aspek Kinerja', 1, 0, 'C', 1);
        $pdf->Cell(45, 10, 'Aspek Sikap Kerja', 1, 0, 'C', 1);
        $pdf->Cell(20, 10, '', 1, 1, 'C', 1);

        // Baris kedua untuk kolom-kolom individual
        $pdf->Cell(10, 10, 'No', 1, 0, 'C', 1);
        $pdf->Cell(30, 10, 'Nama', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'CF', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'SF', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'NKC', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'CF', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'SF', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'NK', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'CF', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'SF', 1, 0, 'C', 1);
        $pdf->Cell(15, 10, 'NSK', 1, 0, 'C', 1);
        $pdf->Cell(20, 10, 'HA', 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 8);
    }
    $pdf->Cell(10, 10, $no, 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $row['name'], 1, 0, 'L', 1);
    $pdf->Cell(15, 10, $row['cf1'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['sf1'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['nkc'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['cf2'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['sf2'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['nk'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['cf3'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['sf3'], 1, 0, 'C', 1);
    $pdf->Cell(15, 10, $row['nsk'], 1, 0, 'C', 1);
    $pdf->Cell(20, 10, $row['ha'], 1, 1, 'C', 1);
    $no++;
}

// Tutup koneksi database
$conn = null;

// Outputkan PDF ke browser
$pdf->Output('data.pdf', 'D');
