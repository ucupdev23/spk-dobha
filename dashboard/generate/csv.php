<?php

// Sambungkan ke database
include '../../helper/koneksi.php';

// Query untuk mengambil data dari tabel (contoh)
$query = "SELECT users.name, divisions.division_name, positions.position_name, calculations.ha FROM calculations JOIN users ON users.id = calculations.employee_id JOIN divisions ON divisions.division_id = users.division_id JOIN positions ON positions.position_id = users.position_id WHERE users.deleted = 'no' ORDER BY calculations.ha DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nama file CSV
$filename = 'data.csv';

// Judul kolom yang ingin Anda tetapkan
$judulKolom = array('Nama', 'Divisi', 'Jabatan', 'Rangking');

// Buat file CSV dan tulis judul kolom
$file = fopen($filename, 'w');
fputcsv($file, $judulKolom);

// Tulis data
foreach ($data as $row) {
    fputcsv($file, $row);
}
fclose($file);;

// Set header untuk mengatur tipe konten dan nama file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $filename);

// Outputkan isi file CSV ke output HTTP
readfile($filename);

// Hapus file setelah selesai
unlink($filename);

// Tutup koneksi database
$conn = null;
