<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan - Sistem Informasi Sekolah</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          font-size: 14px; /* Ukuran font diubah menjadi 10px */
        }

        .container {
        width: 595px; /* Ukuran kertas A4 portrait */
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
          text-align: center;
        }

        .header h2 {
          margin-top: 0;
        }

        .alamat {
          font-size: 9px;
        }

        .content {
          padding-top: 20px;
        }

        .content p {
          margin-bottom: 10px;
        }

        .section {
          margin-bottom: 20px;
        }

        .section p strong {
          font-weight: bold;
        }

        .signature {
          text-align: center;
        }

        .signature strong {
          font-size: 12px;
        }

        /* Baru ditambahkan */
        .date {
          float:right;
          font-size:10px;
        }

        .footer {
          clear:both;
          text-align:right;
          font-size:9px;
          margin-bottom:10px;
        }

        hr {
            border-top: 1px solid #000;
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>SMK Negeri 2 Bukittinggi</h2>
            <p class="alamat" style="font-size: 12px;">Jl. Syekh Jamil Jambek, Aur Tajungkang Tengah Sawah, Kec. Guguk Panjang, Kota Bukittinggi, Sumatera Barat 26136</p>
            <hr>
            <h3>Surat Pernyataan</h3>
        </div>
        <div class="date" style="font-size: 12px;">Bukittinggi, <?= date('d F Y') ?></div>
        <div class="content">
            Yang bertanda tangan di bawah ini:

            <div class="section">
                <p><strong>NIS:</strong> <?= $nis ?></p>
                <p><strong>Nama Siswa:</strong> <?= $nama ?></p>
                <p><strong>Kelas:</strong> <?= $kelas ?></p>
            </div>

            Sedang melakukan kegiatan sebagai berikut:

            <div class="section">
                <p><strong>Kegiatan:</strong> <?= $kegiatan ?></p>
                <p><strong>Alasan:</strong> <?= $keterangan ?></p>
            </div>

            Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.

            Harap simpan surat ini sampai pulang sekolah, Terimakasih.
        </div>

        <div class="footer" style="font-size: 12px;">
            Hormat kami,
            <br>
            <br><strong>Kepala Sekolah</strong>
        </div>
    </div>
</body>
</html>