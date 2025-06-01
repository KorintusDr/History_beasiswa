# Sistem Informasi History Beasiswa

Sistem ini digunakan untuk mencatat, memantau, dan melaporkan penggunaan beasiswa oleh penerima beasiswa di institusi pendidikan. Sistem membantu administrasi dalam mengelola data beasiswa secara transparan dan akurat.

## Fitur Utama

- Pencatatan data penerima beasiswa  
- Tracking riwayat pencairan dan penggunaan beasiswa  
- Pelaporan penggunaan dana beasiswa secara berkala  
- Manajemen jenis beasiswa dan kriteria penerima  
- Hak akses pengguna (Admin, Staff, Penerima Beasiswa)  
- Notifikasi pengingat pelaporan

## Teknologi yang Digunakan

- Backend: PHP (Laravel / CodeIgniter)  
- Frontend: HTML, CSS, JavaScript, Bootstrap  
- Database: MySQL / MariaDB  
- Tools: Git, XAMPP / Laragon

## Instalasi

1. Clone repository:
   ```bash
   git clone https://github.com/username/history_beasiswa.git
   ```
2. Pindahkan folder ke direktori server lokal (`htdocs` atau setara).  
3. Buat database baru di phpMyAdmin dan import file `database.sql`.  
4. Konfigurasikan koneksi database di file konfigurasi aplikasi (`.env` untuk Laravel atau `application/config/database.php` untuk CodeIgniter).  
5. Jalankan aplikasi melalui browser:
   ```
   http://localhost/history_beasiswa/
   ```

## Struktur Folder

```
/app             -> Logika backend aplikasi
/public          -> File frontend dan assets (CSS, JS, gambar)
/database        -> File SQL database
/config          -> Pengaturan konfigurasi aplikasi
```

## Hak Akses Pengguna

| Role            | Akses                                             |
|-----------------|--------------------------------------------------|
| Admin           | Manajemen data beasiswa, pengguna, dan laporan   |
| Staff           | Input dan verifikasi data penggunaan beasiswa    |
| Penerima Beasiswa | Melihat status beasiswa dan mengisi laporan penggunaan |

## Kontribusi

Terima kasih atas minat Anda! Silakan fork repo dan buat pull request untuk kontribusi fitur atau perbaikan bug.

## Lisensi

Proyek ini dilisensikan di bawah MIT License.

---

✉️ Hubungi untuk support: [email@example.com](mailto:email@example.com)
