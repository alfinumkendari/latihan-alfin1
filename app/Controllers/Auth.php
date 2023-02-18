<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MMasyarakat;
use App\Models\MPetugas;

class Auth extends BaseController
{
    protected $petugas;
    protected $masyarakat;
    public function __construct()
    {
        $this->petugas = new MPetugas();
        $this->masyarakat = new MMasyarakat();
    }
    public function index()
    {
        helper(['form']);
        return view('page/login');
    }
    public function page_m()
    {
        helper(['form']);
        return view('page/login_m');
    }
    public function login()
    {
        $session    = session();
        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');
        $data       = $this->petugas->where('username', $username)->first();
        if($data){
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $level = $data->level;
                $ses_data = [
                    'id_petugas'       => $data->id_petugas,
                    'nama_petugas'     => $data->nama_petugas,
                    'username'    => $data->username,
                    'level'    => $data->level,
                    'logged_in'     => TRUE
                ];
                session()->set($ses_data);
                if($level == "petugas"){
                    return redirect()->to('/pagep');
                }else{
                    return redirect()->to('/home');
                }
            }else{
                session()->setFlashdata('msg', 'Salah Password');
                return redirect()->to('/auth/login');
            }
        }else{
            $session->setFlashdata('msg', 'Username Belum Terdaftar');
            return redirect()->to('/auth/login');
        }
    }
    public function loginm()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->masyarakat->where('username', $username)->first();
        if($data){
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'nik'       => $data->nik,
                    'nama'     => $data->nama,
                    'username'    => $data->username,
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/pagem');
            }else{
                $session->setFlashdata('msg', 'Salah Password');
                return redirect()->to('/auth/loginm');
            }
        }else{
            $session->setFlashdata('msg', 'Username Belum Terdaftar');
            return redirect()->to('/auth/loginm');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function registerm()
    {
        return view('page/register_masyarakat');
    }
    public function save()
    {
        $this->masyarakat->insert([
            'nik'       => $this->request->getVar('nik'),
            'nama'      => $this->request->getVar('nama'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'telp'      => $this->request->getVar('telp')
        ]);
        return redirect()->to('/auth/loginm');
    }
}
