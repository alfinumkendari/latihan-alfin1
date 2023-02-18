<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPetugas;
use App\Models\MTanggapan;

class Pagep extends BaseController
{
    protected $petugas;
    protected $tanggapan;
    public function __construct()
    {
        $this->petugas = new MPetugas();
        $this->tanggapan = new MTanggapan();
    }
    public function index()
    {
        $data = [
            'title'     => 'Halaman Login Petugas',
            'judul'     => 'Halaman Utama Petugas',
            'hp'     => $this->petugas->findAll()
        ];
        return view('page_p/homep', $data);
    }
    public function profile()
    {
        $data = [
            'title'     => 'Halaman Profile Petugas',
            'judul'     => 'Halaman Utama Profile Petugas'
        ];
        return view('page_p/profilep', $data);
    }
    public function tanggap()
    {
        $data = [
            'title' => 'Halaman Data Tanggapan',
            'judul' => 'Data Tanggapan',
            'tanggapan' => $this->tanggapan->getAll()
        ];
        return view('page_p/v_tanggapan', $data);
    }
    public function savep()
    {
        # code...
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
