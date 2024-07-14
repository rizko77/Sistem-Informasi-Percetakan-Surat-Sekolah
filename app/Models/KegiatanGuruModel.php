<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanGuruModel extends Model
{
    protected $table = 'kegiatan_guru';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul'];

    // Tambahan fungsi jika dibutuhkan
}
