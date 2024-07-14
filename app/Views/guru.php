<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - Sistem Informasi Sekolah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .edu-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .edu-btn:focus {
            outline: none;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang navbar semi-transparan */
            border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Garis bawah navbar */
        }
        .container-card {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang semi-transparan untuk konten */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Bayangan untuk efek mendalam */
        }
        .form-inline {
            margin-bottom: 20px;
            justify-content: center; /* Posisikan form pencarian di tengah */
        }
        .table {
            background-color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
    </nav>.
    <br>
    <br>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-card">
                <form action="" method="get" class="form-inline justify-content-center mb-3">
                    <div class="input-group">
                        <input type="text" name="nama" class="form-control form-control-lg mr-sm-2" placeholder="Cari Nama Anda..." aria-label="Cari Nama Anda" aria-describedby="button-addon2">
                        <button class="btn btn-dark" type="submit" id="button-addon2"> Cari Data</button>
                    </div>
                    
                </form>


                    <div class="card mb-3 mt-3">
                        <table class="table table-striped table-bordered mt-3 mb-0">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Bidang</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($guru_list)): ?>
                                    <?php foreach($guru_list as $guru): ?>
                                        <tr>
                                            <td><?php echo $guru['nip']; ?></td>
                                            <td><?php echo $guru['nama']; ?></td>
                                            <td><?php echo $guru['jabatan']; ?></td>
                                            <td><?php echo $guru['telepon']; ?></td>
                                            <td><a href="/buat_surat_guru/<?php echo $guru['nip']; ?>" class="btn btn-success">Buat Surat</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Data siswa tidak ditemukan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <?php if(!empty($guru_list)): ?>
                            <div class="text-center mt-4">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        <?php endif; ?>
                    </div>
                    <a href="/" class="btn edu-btn mt-3">Kembali</a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
