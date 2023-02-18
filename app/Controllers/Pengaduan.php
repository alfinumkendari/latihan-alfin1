<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMasyarakat;
use App\Models\MPengaduan;

class Pengaduan extends BaseController
{
    protected $pengaduan;
    protected $masyarakat;
    public function __construct()
    {
        $this->pengaduan = new MPengaduan();
        $this->masyarakat = new MMasyarakat();
    }
    public function index()
    {
        // if(!session('id_petugas')){
        //     return redirect()->to('/');
        // }
        $data = [
            'title' => 'Halaman Data Pengaduan',
            'judul' => 'Data Pengaduan',
            'pengaduan' => $this->pengaduan->getAll()
        ];
        return view('pengaduan/v_pengaduan', $data);
    }
}
