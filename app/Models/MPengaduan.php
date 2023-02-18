<?php

namespace App\Models;

use CodeIgniter\Model;

class MPengaduan extends Model
{
    protected $table            = 'pengaduan';
    protected $primaryKey       = 'id_pengaduan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['tgl_pengaduan','nik','isi_laporan','foto','status'];

    public function getAll()
    {
        $pengaduan = $this->db->table('pengaduan');
        $pengaduan->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        $query = $pengaduan->get();
        return $query->getResult();
    }
}
