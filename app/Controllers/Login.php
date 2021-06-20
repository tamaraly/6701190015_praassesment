<?php

namespace App\Controllers;
use App\Models\KaryawansModel;

class Login extends BaseController
{
    public function index()
    {
        # CEK, JIKA SUDAH ADA SESSION-NYA MAKA TIDAK BOLEH LOGIN KEMBALI
        if(session()->get('id'))
        {
            return redirect()->to(base_url('dashboard'));
        }

        $data = array(
                    'title' => 'Login'
                );
        return view('login', $data);
    }

    public function auth()
    {
        helper(['form']);
        
        # CEK, JIKA SUDAH ADA SESSION-NYA MAKA TIDAK BOLEH LOGIN KEMBALI
        if(session()->get('id'))
        {
            return redirect()->to(base_url('dashboard'));
        }

        $rules = [
                    'nip'           => 'required',
                    'password'      => 'required',
                ];

        if($this->validate($rules))
        {
            $model      = new KaryawansModel();
            $nip        = $this->request->getVar('nip');
            $password   = $this->request->getVar('password');
            $data       = $model->where('nip', $nip)->first();

            if($data)
            {
                if(password_verify($password, $data['password']))
                {
                    $ses_data = [
                        'id'            => $data['id'],
                        'nip'           => $data['nip'],
                        'password'      => $data['password'],
                        'nama'          => $data['nama'],
                        'logged_in'     => TRUE
                    ];
                    session()->set($ses_data);
                    return redirect()->to(base_url('dashboard'));
                }
                else
                {
                    session()->setFlashdata('message', 'Username/Password salah!');
                    return redirect()->to(base_url('login'));
                }
            }
            else
            {
                session()->setFlashdata('message', 'NIP tidak tersedia!');
                return redirect()->to(base_url('login'));
            }
        }
        else 
        {

            $data = array(
                        'title'         => 'Login',
                        'validation'    => $this->validator,
                    );
            return view('login', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('login'));
    }
}
