<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-title {
            font-family: 'Arial', sans-serif;
            font-size: 1.5rem;
            color: #343a40;
        }

        .card-body {
            font-family: 'Verdana', sans-serif;
            font-size: 1.2rem;
            color: #495057;
        }

        .content-wrapper {
            background-color: #f8f9fa;
        }

        .content-header h1 {
            font-family: 'Arial', sans-serif;
            font-size: 2rem;
            color: #343a40;
        }

        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Card Jumlah Siswa -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah Siswa</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center">
                                    <?php echo $jumlah_siswa; ?> <!-- Tampilkan jumlah siswa di sini -->
                                </h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Jumlah Guru -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah Guru</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center">
                                    <?php echo $jumlah_guru; ?> <!-- Tampilkan jumlah guru di sini -->
                                </h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Jumlah Kegiatan -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kegiatan Siswa</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center">
                                    <?php echo $jumlah_kegiatan; ?> <!-- Tampilkan jumlah kegiatan di sini -->
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kegiatan Guru</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center">
                                    <?php echo $jumlah_kegiatan_guru; ?> <!-- Tampilkan jumlah kegiatan di sini -->
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jam -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jam</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center" id="current-time"></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Card Tanggal -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tanggal</h3>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center" id="current-date"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- JavaScript untuk memperbarui waktu saat ini -->
    <script>
        // Function to update the time and date every second
        function updateDateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = now.toLocaleDateString('id-ID', options);
            
            document.getElementById('current-time').innerText = timeString;
            document.getElementById('current-date').innerText = dateString;
        }

        // Call the updateDateTime function immediately to set the initial time and date
        updateDateTime();

        // Set an interval to update the time and date every second
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>