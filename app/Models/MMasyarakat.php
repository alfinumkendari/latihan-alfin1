<?php

namespace App\Models;

use CodeIgniter\Model;

class MMasyarakat extends Model
{
    protected $table            = 'masyarakat';
    protected $primaryKey       = 'nik';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nik', 'nama','username','password','telp'];
}
