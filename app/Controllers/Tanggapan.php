<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPengaduan;
use App\Models\MPetugas;
use App\Models\MTanggapan;

class Tanggapan extends BaseController
{
    protected $tanggapan;
    protected $pengaduan;
    protected $petugas;
    public function __construct()
    {
        $this->tanggapan = new MTanggapan();
        $this->pengaduan = new MPengaduan();
        $this->petugas = new MPetugas();
    }
    public function index()
    {
        // if(!session('id_petugas')){
        //     return redirect()->to('/');
        // }
        $data = [
            'title' => 'Halaman Data Tanggapan',
            'judul' => 'Data Tanggapan',
            'tanggapan' => $this->tanggapan->getAll()
        ];
        return view('tanggapan/v_tanggapan', $data);
    }
}
