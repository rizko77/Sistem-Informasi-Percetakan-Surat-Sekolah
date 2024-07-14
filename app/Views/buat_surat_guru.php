<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Surat - Sistem Informasi Sekolah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: black;
        }
        .card {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .card-header {
            color: black;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgba(255, 255, 255, 0.8); border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
        <div class="container">
            <a class="navbar-brand" href="/">Sistem Sekolah</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/siswa">Siswa</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/guru">Guru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Buat Surat Pernyataan Guru</b></div>
                    <div class="card-body">
                        <form id="buatSuratForm" method="post">
                            <div class="form-group">
                                <label for="nis">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $guru['nip']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Guru</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Bidang</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $guru['jabatan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" id="kegiatan" name="kegiatan">
                                    <?php foreach ($kegiatan_guru_list as $kegiatan_guru): ?>
                                        <option value="<?= $kegiatan_guru['judul']; ?>"><?= $kegiatan_guru['judul']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan/Alasan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg rounded-pill shadow-sm" onclick="submitForm()">Cetak PDF</button>
                            <a href="/guru" class="btn btn-danger btn-lg rounded-pill ml-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm() {
            const form = document.getElementById('buatSuratForm');
            const formData = new FormData(form);

            // Open a new window
            const win = window.open('/cetakPDFGuru', '_blank');

            fetch('/cetakPDFGuru', {
                method: 'POST',
                body: formData
            }).then(response => {
                return response.blob();
            }).then(blob => {
                const url = URL.createObjectURL(blob);
                win.location.href = url;
            }).catch(err => {
                console.error(err);
                alert('Gagal mencetak PDF');
                win.close();
            });
        }
    </script>
</body>
</html>
