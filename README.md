# Sistem Informasi Percetakan Surat Untuk Sekolah

Merupakan alat yang dipakai untuk mencetak surat kecil bagi guru piket di sekolah sebagai bukti kalau warga sekolah sedang melakukan kegiatan penting disaat jam pembelajaran.


## Untuk menggunakan Yang dibutuhkan:

- Xampp (PHP Versi 8.1)
- Visual Studio (Untuk Git clone dan Run spark serve)
- File database "sekolah.sql" ada dalam folder "db"

## Catatan:
1. Untuk tampilan ada masalah jadi untuk perbaikan anda harus extract file "Perbarui Folder Public CSS.zip" di folder lain di luar folder proyek dan copy folder "public" ke proyek kemudian centang yang replace atau timpa file
2. Untuk tombol Cetak PDF agak delay jangan terkejut jika ada error 404 itu hanya beberapa detik saja


## Cara Pasang

- Download proyek ini bisa dengan Git Clone bisa dengan download zip file
- Extract file proyeknya
- Jalan kan Xampp (Apache, MySQL)
- Buka localhost/phpmyadmin kemudian buat database dengan nama "sekolah" kemudian pada bagian tab import ambil file "sekolah.sql" dari folder "db" di proyek terus scroll bawah klik go
- Pindahin file "Perbarui Folder Public CSS.zip" di folder lain diluar folder proyek kemudian extract 
- Setelah diextract copy folder "public" ke dalam folder proyek kemudian klik Replace
- Semuanya sudah selesai langsung buka di Visual Studio Code Jalankan terminal ketikan "cd nama_folder_proyek" kemudian ketikan "php spark serve"
- Setelah jalan klik link "localhost:8080"
