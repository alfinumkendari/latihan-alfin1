<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMasyarakat;
use App\Models\MPengaduan;

class Pagem extends BaseController
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
        $model = new MMasyarakat();
        $data = [
            'title'     => 'Halaman Login Masyarakat',
            'judul'     => 'Halaman Utama Masyarakat',
            'hm'        => $model->findAll()
        ];
        return view('page_m/homem', $data);
    }
    protected $helpers = ['form'];
    public function aduan()
    {
        $data = [
            'title' => 'Halaman Data Pengaduan',
            'judul' => 'Data Pengaduan',
            'pengaduan' => $this->pengaduan->getAll()
        ];
        return view('page_m/v_pengaduan', $data);
    }
    public function profile()
    {
        $data = [
            'title'     => 'Halaman Profile Masyarakat',
            'judul'     => 'Halaman Utama Profile Masyarakat'
        ];
        return view('page_m/profilem', $data);
    }
    public function savem()
    {
        # code...
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth/loginm');
    }
}
