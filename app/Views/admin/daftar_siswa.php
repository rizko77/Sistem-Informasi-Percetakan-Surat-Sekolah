<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Siswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Content goes here -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Siswa</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-siswa">
                            Tambah Siswa
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-siswa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Siswa ditampilkan di sini -->
                            <?php foreach ($siswa as $siswa_item): ?>
                                <tr>
                                    <td><?php echo $siswa_item['nis']; ?></td>
                                    <td><?php echo $siswa_item['nama']; ?></td>
                                    <td><?php echo $siswa_item['kelas']; ?></td>
                                    <td><?php echo $siswa_item['alamat']; ?></td>
                                    <td><?php echo $siswa_item['telepon']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-siswa-<?php echo $siswa_item['id']; ?>">
                                            Edit
                                        </button>
                                        <a href="<?php echo base_url('admin/hapusSiswa/' . $siswa_item['id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
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

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="modal-tambah-siswa" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-siswa-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tambah-siswa-label">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah siswa -->
                <form action="<?php echo base_url('admin/simpanSiswa'); ?>" method="post">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Modal Edit Siswa -->
<?php foreach ($siswa as $siswa_item): ?>
    <div class="modal fade" id="modal-edit-siswa-<?php echo $siswa_item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-siswa-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-siswa-label">Edit Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form edit siswa -->
                    <form action="<?php echo base_url('admin/updateSiswa'); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $siswa_item['id']; ?>">
                        <div class="form-group">
                            <label for="edit-nis">NIS</label>
                            <input type="text" class="form-control" id="edit-nis" name="nis" value="<?php echo $siswa_item['nis']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-nama">Nama</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama" value="<?php echo $siswa_item['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-kelas">Kelas</label>
                            <input type="text" class="form-control" id="edit-kelas" name="kelas" value="<?php echo $siswa_item['kelas']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-alamat">Alamat</label>
                            <input type="text" class="form-control" id="edit-alamat" name="alamat" value="<?php echo $siswa_item['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-telepon">Telepon</label>
                            <input type="text" class="form-control" id="edit-telepon" name="telepon" value="<?php echo $siswa_item['telepon']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /.modal -->
