<?php

namespace App\Models;

use CodeIgniter\Model;

class MTanggapan extends Model
{
    protected $table            = 'tanggapan';
    protected $primaryKey       = 'id_tanggapan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_pengaduan','tgl_tanggapan','tanggapan','id_petugas'];

    public function getAll()
    {
        $tanggapan = $this->db->table('tanggapan');
        $tanggapan->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $query = $tanggapan->get();
        return $query->getResult();
    }
}
