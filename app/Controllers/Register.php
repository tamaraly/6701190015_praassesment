<?php

namespace App\Controllers;
use App\Models\KaryawansModel;

class Register extends BaseController
{
    public function index()
    {
        helper(['form']);

        # CEK, JIKA SUDAH ADA SESSION-NYA MAKA TIDAK BOLEH MENDAFTAR
        if(session()->get('logged_in'))
        {
            return redirect()->to(base_url('dashboard'));
        }

        $data = array(
                    'title' => 'Register'
                );
        return view('register', $data);
    }

    public function process()
    {
        helper(['form']);

        # CEK, JIKA SUDAH ADA SESSION-NYA MAKA TIDAK BOLEH MENDAFTAR
        if(session()->get('logged_in'))
        {
            return redirect()->to(base_url('dashboard'));
        }

        $rules = [
                    'nip'           => 'required|min_length[3]|is_unique[karyawans.nip]',
                    'password'      => 'required',
                    'nama'          => 'required',
                ];

        if($this->validate($rules))
        {
            $model      = new KaryawansModel();
            $insert     = [
                            'nip'       => $this->request->getVar('nip'), 
                            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT), 
                            'nama'      => $this->request->getVar('nama'),
                        ];

            $status = $model->save($insert);

            if($status)
            {
                session()->setFlashdata('register_success', 'Pendaftaran Berhasil! Silahkan login dengan akun anda!');
                return redirect()->to(base_url('login'));
            }
            else 
            {
                session()->setFlashdata('message', 'Data gagal disimpan!');
                return redirect()->to(base_url('login'));
            }            
        }
        else 
        {

            $data = array(
                        'title'         => 'Login',
                        'validation'    => $this->validator,
                    );
            return view('register', $data);
        }
    }
}
