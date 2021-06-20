<?php

namespace App\Controllers;
use App\Models\KaryawansModel;

class Dashboard extends BaseController
{
    public function index()
    {
        # CEK, JIKA BELUM ADA SESSION-NYA MAKA HARUS LOGIN
        if(!session()->get('id'))
        {
            session()->setFlashdata('message', 'Silahkan login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }

        $data = array(
                    'title' => 'Dashboard',
                    'hello' => 'Selamat datang ' . session()->get('nama'),
                );
        return view('backend/dashboard/index', $data);
    }
}
