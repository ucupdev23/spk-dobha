# IMPLEMENTASI PROFILE MATCHING SEBAGAI METODE PEMILIHAN KARYAWAN BERPRESTASI DALAM SISTEM PENDUKUNG KEPUTUSAN BERBASIS WEB PADA PT. DOBHA PUTRA SALIM

![Image](https://github.com/user-attachments/assets/0269a5b7-b19f-4143-a354-c9ac83e5cfaa)
![Image](https://github.com/user-attachments/assets/9024d426-ca48-4b81-b0b5-888212de6665)

---

## Deskripsi Proyek

Proyek ini adalah **Sistem Pendukung Keputusan (SPK)** berbasis web yang dirancang untuk membantu PT. Dobha Putra Salim dalam proses pemilihan karyawan berprestasi. Sistem ini mengimplementasikan metode **Profile Matching** untuk mengevaluasi dan memeringkat karyawan berdasarkan kriteria yang telah ditentukan, sehingga menghasilkan keputusan yang lebih objektif dan akurat.

## Latar Belakang

Pemilihan karyawan berprestasi seringkali menjadi tantangan bagi banyak perusahaan, termasuk PT. Dobha Putra Salim, karena prosesnya yang seringkali subjektif dan memakan waktu. Proyek ini hadir sebagai solusi untuk mengatasi masalah tersebut dengan menyediakan sistem yang terotomatisasi dan transparan, menggunakan pendekatan Profile Matching yang telah terbukti efektif dalam seleksi dan penilaian.

---

## Fitur Utama

* **Manajemen Data Karyawan:** Mengelola informasi detail setiap karyawan.
* **Definisi Kriteria Penilaian:** Menentukan kriteria yang relevan untuk penilaian karyawan berprestasi (misalnya, kinerja, kehadiran, inisiatif, dll.).
* **Implementasi Metode Profile Matching:** Melakukan perhitungan gap kompetensi antara profil ideal dan profil aktual karyawan.
* **Perangkingan Otomatis:** Menghasilkan urutan karyawan berprestasi berdasarkan hasil perhitungan Profile Matching.
* **Antarmuka Berbasis Web:** Memudahkan akses dan penggunaan sistem dari mana saja.
* **Laporan Hasil:** Menyajikan laporan hasil penilaian yang mudah dipahami.

---

## Teknologi yang Digunakan

* **Bahasa Pemrograman:** PHP
* **Framework:** [Sebutkan Framework Anda, misal: CodeIgniter 3 / Laravel / Tanpa Framework]
* **Database:** MySQL
* **Front-end:** HTML, CSS, JavaScript ([Sebutkan Framework CSS jika ada, misal: Bootstrap 5 / Tailwind CSS])
* **Web Server:** Apache / Nginx

---

## Instalasi dan Cara Menjalankan Proyek

Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut:

1.  **Clone Repositori:**
    ```bash
    git clone [https://github.com/](https://github.com/)[username-github-anda]/[nama-repositori-anda].git
    ```
2.  **Masuk ke Direktori Proyek:**
    ```bash
    cd [nama-repositori-anda]
    ```
3.  **Konfigurasi Database:**
    * Buat database baru di MySQL dengan nama `[nama_database_anda]`.
    * Import file `[nama_file_sql_anda.sql]` (biasanya terletak di folder `database` atau `sql`) ke database yang baru Anda buat.
4.  **Konfigurasi Aplikasi:**
    * Buka file konfigurasi database Anda (misalnya: `application/config/database.php` jika menggunakan CodeIgniter, atau sesuaikan dengan lokasi file konfigurasi Anda).
    * Sesuaikan kredensial database (username, password, nama database) dengan pengaturan lokal Anda.
5.  **Tempatkan Proyek di Web Server:**
    * Pindahkan seluruh folder proyek ke direktori `htdocs` (untuk XAMPP/WAMP) atau direktori root web server Anda.
6.  **Akses Aplikasi:**
    * Buka browser Anda dan akses proyek melalui `http://localhost/[nama-folder-proyek-anda]`.

---

## Struktur Direktori

-   `[nama-repositori-anda]/`
    -   `application/` &nbsp; # Logika aplikasi (MVC jika pakai framework)
    -   `assets/` &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; # File CSS, JS, dan Gambar
    -   `database/` &nbsp; &nbsp; &nbsp; # File SQL database
    -   `system/` &nbsp; &nbsp; &nbsp; &nbsp; # File sistem (jika pakai framework, bisa dihapus jika tanpa framework)
    -   `index.php` &nbsp; &nbsp; &nbsp; # File utama aplikasi
    -   `README.md` &nbsp; &nbsp; # File README ini

---

## Kontribusi

Proyek ini merupakan hasil dari skripsi. Jika ada ide atau saran untuk pengembangan lebih lanjut, silakan buka *issue* atau *pull request*.

---

## Lisensi

Proyek ini dilisensikan di bawah [Sebutkan Lisensi Anda, misal: MIT License](LICENSE.md).

---

## Kontak

Jika Anda memiliki pertanyaan atau ingin berdiskusi lebih lanjut tentang proyek ini, jangan ragu untuk menghubungi saya:

* **Nama:** [Nama Lengkap Anda]
* **Email:** [Alamat Email Anda]
* **LinkedIn (Opsional):** [Link Profil LinkedIn Anda]

---

**Terima kasih telah mengunjungi repositori ini!**
