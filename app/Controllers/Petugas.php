<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPetugas;

class Petugas extends BaseController
{
    protected $petugas;
    public function __construct()
    
    {
        $this->petugas = new MPetugas();
    }
    public function index()
    {
        // if(!session('id_petugas')){
        //     return redirect()->to('/');
        // }
        $data = [
            'title' => 'Halaman Data Petugas',
            'judul' => 'Data Petugas',
            'petugas'   => $this->petugas->findAll()
        ];
        return view('petugas/v_petugas', $data);
    }
    public function save()
    {
        $this->petugas->insert([
            'nama_petugas'  => $this->request->getVar('nama_petugas'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'telp'  => $this->request->getVar('telp'),
            'level'  => $this->request->getVar('level')
        ]);
        return redirect()->to('/petugas');
    }
    public function update($id_petugas)
    {
        $this->petugas->update($id_petugas, [
            'nama_petugas'  => $this->request->getVar('nama_petugas'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'telp'  => $this->request->getVar('telp'),
            'level'  => $this->request->getVar('level')
        ]);
        return redirect()->to('/petugas');
    }
    public function delete($id_petugas)
    {
        $data = [
            'id_petugas'   => $id_petugas
        ];
        $this->petugas->delete($data);
        return redirect()->to('/petugas');
    }

}
