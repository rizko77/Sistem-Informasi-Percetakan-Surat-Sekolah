<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanSiswaModel extends Model
{
    protected $table = 'laporan_siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis', 'nama', 'kelas', 'kegiatan', 'keterangan'];

    // Tambahan fungsi jika dibutuhkan
}
