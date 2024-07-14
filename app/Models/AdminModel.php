<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'password'];
    protected $useAutoIncrement = true;
}

