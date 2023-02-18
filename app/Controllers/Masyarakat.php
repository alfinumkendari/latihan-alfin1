<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MMasyarakat;

class Masyarakat extends BaseController
{
    protected $masyarakat;
    public function __construct()
    {
        $this->masyarakat = new MMasyarakat();
    }
    public function index()
    {
        if(!session('id_petugas')){
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Halaman Data Masyarakat',
            'judul' => 'Data Masyarakat',
            'masyarakat'    => $this->masyarakat->findAll()
        ];
        return view('masyarakat/v_masyarakat', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nik'   => [
                'rules' => 'required|min_length[3]|max_length[16]',
                'errors' => [
                    'required'  => '{field} Harus Diisi',
                    'min_length'  => '{field} Minimal 3 Digit',
                    'max_length'  => '{field} Makasimal 16 Digit'
                ]
                ],
            'nama'   => [
                'rules' => 'required|min_length[3]|max_length[35]',
                'errors' => [
                    'required'  => '{field} Harus Diisi',
                    'min_length'  => '{field} Minimal 3 Digit',
                    'max_length'  => '{field} Makasimal 35 Digit'
                ]
                ],
            'username'   => [
                'rules' => 'required|min_length[3]|max_length[10]',
                'errors' => [
                    'required'  => '{field} Harus Diisi',
                    'min_length'  => '{field} Minimal 3 Digit',
                    'max_length'  => '{field} Makasimal 10 Digit'
                ]
                ],
            'password'   => [
                'rules' => 'required|min_length[3]|max_length[8]',
                'errors' => [
                    'required'  => '{field} Harus Diisi',
                    'min_length'  => '{field} Minimal 3 Digit',
                    'max_length'  => '{field} Makasimal 8 Digit'
                ]
                ],
            'telp'   => [
                'rules' => 'required|max_length[12]',
                'errors' => [
                    'required'  => '{field} Harus Diisi',
                    'max_length'  => '{field} Makasimal 12 Digit'
                ]
                ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->masyarakat->insert([
            'nik'           => $this->request->getVar('nik'),
            'nama'          => $this->request->getVar('nama'),
            'username'      => $this->request->getVar('username'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'telp'          => $this->request->getVar('telp')
        ]);
        return redirect()->to('/masyarakat')->with('pesan', 'Data Berhasil Diinput');
    }
    public function update($nik)
    {
        $this->masyarakat->update($nik, [
            'nik'           => $this->request->getVar('nik'),
            'nama'          => $this->request->getVar('nama'),
            'username'      => $this->request->getVar('username'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'telp'          => $this->request->getVar('telp')
        ]);
        return redirect()->to('/masyarakat')->with('pesan', 'Data Berhasil Diinput');
    }
    public function delete($nik)
    {
        $data = [
            'nik'   => $nik
        ];
        $this->masyarakat->delete($data);
        return redirect()->to('/masyarakat')->with('pesan', "Data Berhasil Dihapus");
    }
}
