<?php

namespace App\Controllers;
use App\Models\KaryawansModel;

class Karyawan extends BaseController
{
    public function index()
    {
        # CEK, JIKA BELUM ADA SESSION-NYA MAKA HARUS LOGIN
        if(!session()->get('id'))
        {
            session()->setFlashdata('message', 'Silahkan login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }

        $karyawans = new KaryawansModel();

        $data = array(
                    'title'     => 'Daftar Karyawan',
                    'karyawan'  => $karyawans->findAll(),
                );
        echo view('backend/karyawan/index', $data);
    }

    public function create()
    {
        # CEK, JIKA BELUM ADA SESSION-NYA MAKA HARUS LOGIN
        if(!session()->get('id'))
        {
            session()->setFlashdata('message', 'Silahkan login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }

        helper(['form']);

        $data = array(
                    'title'     => 'Tambah Data Karyawan',
                );
        echo view('backend/karyawan/create', $data);
    }

    public function store()
    {
        helper(['form']);

        $rules = [
                    'nip'           => 'required|min_length[3]|is_unique[karyawans.nip]',
                    'password'      => 'required',
                    'nama'          => 'required',
                ];

        # CEK, APAKAH LOLOS VALIDASI
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
                session()->setFlashdata('message_success', 'Data berhasil disimpan!');
                return redirect()->to(base_url('karyawan'));
            }
            else 
            {
                session()->setFlashdata('message_danger', 'Data gagal disimpan!');
                return redirect()->to(base_url('karyawan/create'));
            }            
        }
        else 
        {
            $data = array(
                        'title'         => 'Tambah Data Karyawan',
                        'validation'    => $this->validator,
                    );
            echo view('backend/karyawan/create', $data);
        }
    }

    public function edit($id = null)
    {
        helper(['form']);
        $model = new KaryawansModel();

        $data = array(
                    'title'     => 'Ubah Data Karyawan',
                    'edit'      => $model->where('id', $id)->first()
                );
        echo view('backend/karyawan/edit', $data);
    }

    public function update()
    {
        helper(['form']);

        $model  = new KaryawansModel();
        $id     = $this->request->getVar('id');

        $rules = [
                    'nip'           => 'required|min_length[3]',
                    'nama'          => 'required',
                ];

        # CEK, APAKAH LOLOS VALIDASI
        if($this->validate($rules))
        {
            # JIKA ISIAN PASSWORD ADA, MAKA KOLOM PASSWORD DI UPDATE JUGA
            if($this->request->getVar('password'))
            {
                $update = [
                            'nip'       => $this->request->getVar('nip'),
                            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                            'nama'      => $this->request->getVar('nama'),
                        ];
            }
            else 
            {            
                $update = [
                            'nip'       => $this->request->getVar('nip'),
                            'nama'      => $this->request->getVar('nama'),
                        ];
            }

            $status = $model->update($id, $update);

            if($status)
            {
                session()->setFlashdata('message_success', 'Data berhasil disimpan!');
                return redirect()->to(base_url('karyawan'));
            }
            else 
            {
                session()->setFlashdata('message_danger', 'Data gagal disimpan!');
                return redirect()->to(base_url('karyawan/update/' . $id));
            } 
        }
        else
        {
            $data = array(
                        'title'         => 'Ubah Data Karyawan',
                        'edit'          => $model->where('id', $id)->first(),
                        'validation'    => $this->validator,
                    );
            echo view('backend/karyawan/edit', $data);
        }
    }

    public function delete($id = null)
    {
        $model = new KaryawansModel();
        $status= $model->where('id', $id)->delete($id);

        if($status)
        {
            session()->setFlashdata('message_success', 'Data berhasil dihapus!');            
        }
        else 
        {
            session()->setFlashdata('message_danger', 'Data gagal dihapus!');
        }   

        return redirect()->to(base_url('karyawan'));
    }
}
