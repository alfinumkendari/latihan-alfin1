<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // if(!session('id_petugas')){
        //     return redirect()->to('/');
        // }
        $data = [
            'title' => 'Halaman Data Dashboard',
            'judul' => 'Data Dashboard'
        ];
        return view('dashboard', $data);
    }
}
