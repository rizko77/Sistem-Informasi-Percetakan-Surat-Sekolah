<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Kegiatan Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Kegiatan Siswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Button to trigger modal for adding new activity -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalTambahKegiatan">
                Tambah Kegiatan
            </button>

            <!-- Table to display activities -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kegiatan as $index => $kg) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td> <!-- Penomoran otomatis -->
                                    <td><?= $kg['judul'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#modalEditKegiatan<?= $kg['id'] ?>">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="deleteKegiatan(<?= $kg['id'] ?>)">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Kegiatan -->
<div class="modal fade" id="modalTambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKegiatanLabel">Tambah Kegiatan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahKegiatan" action="/admin/simpanKegiatan" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul Kegiatan:</label>
                        <input type="text" id="judul" name="judul" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kegiatan -->
<?php foreach ($kegiatan as $kg) : ?>
    <div class="modal fade" id="modalEditKegiatan<?= $kg['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditKegiatanLabel<?= $kg['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditKegiatanLabel<?= $kg['id'] ?>">Edit Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditKegiatan<?= $kg['id'] ?>" action="/admin/updateKegiatan" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $kg['id'] ?>">
                        <div class="form-group">
                            <label for="judul<?= $kg['id'] ?>">Judul Kegiatan:</label>
                            <input type="text" id="judul<?= $kg['id'] ?>" name="judul" class="form-control" value="<?= $kg['judul'] ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    // Fungsi untuk menghapus kegiatan
    function deleteKegiatan(id) {
        if (confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')) {
            $.ajax({
                url: '/admin/hapusKegiatan/' + id,
                type: 'DELETE',
                success: function(response) {
                    // Tambahkan logic untuk menampilkan notifikasi atau mengupdate tampilan jika diperlukan
                    window.location.reload(true); // Contoh: refresh tabel
                }
            });
        }
    }

    // Submit form tambah kegiatan via AJAX
    $('#formTambahKegiatan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Tambahkan logic untuk menampilkan notifikasi atau mengupdate tampilan jika diperlukan
                $('#modalTambahKegiatan').modal('hide');
                window.location.reload(true); // Contoh: refresh tabel
            }
        });
    });

    // Submit form edit kegiatan via AJAX (jika perlu)
    $('form[id^="formEditKegiatan"]').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Tambahkan logic untuk menampilkan notifikasi atau mengupdate tampilan jika diperlukan
                $('#modalEditKegiatan').modal('hide');
                window.location.reload(true); // Contoh: refresh tabel
            }
        });
    });
</script>
