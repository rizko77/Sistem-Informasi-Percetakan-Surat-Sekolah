<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis', 'nama', 'kelas', 'alamat', 'telepon'];

    // Tambahan fungsi jika dibutuhkan
}
