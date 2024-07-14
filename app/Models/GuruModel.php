<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nip', 'nama', 'jabatan', 'alamat', 'telepon'];

    // Tambahan fungsi jika dibutuhkan
}
