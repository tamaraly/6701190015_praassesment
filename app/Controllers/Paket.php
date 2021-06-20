<?php

namespace App\Controllers;
use App\Models\PaketsModel;
use App\Models\PenghunisModel;

class Paket extends BaseController
{
    public function index()
    {
        # CEK, JIKA BELUM ADA SESSION-NYA MAKA HARUS LOGIN
        if(!session()->get('id'))
        {
            session()->setFlashdata('message', 'Silahkan login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }

        $pakets = new PaketsModel();

        $data = array(
                    'title'     => 'Daftar Paket',
                    'paket'     => $pakets->getAllPaket(),
                );
        echo view('backend/paket/index', $data);
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

        $penghunis = new PenghunisModel();

        $data = array(
                    'title'     => 'Tambah Data Paket',
                    'penghuni'  => $penghunis->findAll(),
                );
        echo view('backend/paket/create', $data);
    }

    public function store()
    {
        helper(['form']);

        $rules = [
                    'isi_paket'     => 'required',
                    'penghunis_id'  => 'required',
                ];

        # CEK, APAKAH LOLOS VALIDASI
        if($this->validate($rules))
        {
            $model      = new PaketsModel();
            $insert     = [
                            'isi_paket'         => $this->request->getVar('isi_paket'), 
                            'penghunis_id'      => $this->request->getVar('penghunis_id'),
                            'tanggal_datang'    => date('Y-m-d'),
                            'karyawans_id'      => session()->get('id'),
                        ];

            $status = $model->save($insert);

            if($status)
            {
                session()->setFlashdata('message_success', 'Data berhasil disimpan!');
                return redirect()->to(base_url('paket'));
            }
            else 
            {
                session()->setFlashdata('message_danger', 'Data gagal disimpan!');
                return redirect()->to(base_url('paket/create'));
            }            
        }
        else 
        {
            $penghunis = new PenghunisModel();

            $data = array(
                        'title'         => 'Tambah Data Paket',
                        'validation'    => $this->validator,
                        'penghuni'      => $penghunis->findAll(),
                    );
            echo view('backend/paket/create', $data);
        }
    }

    public function edit($id = null)
    {
        helper(['form']);
        $pakets     = new PaketsModel();
        $penghunis  = new PenghunisModel();

        $data = array(
                    'title'     => 'Ubah Data Paket',
                    'edit'      => $pakets->where('id', $id)->first(),
                    'penghuni'  => $penghunis->findAll(),
                );
        echo view('backend/paket/edit', $data);
    }

    public function update()
    {
        helper(['form']);

        $model  = new PaketsModel();
        $id     = $this->request->getVar('id');

       $rules = [
                    'isi_paket'     => 'required',
                    'penghunis_id'  => 'required',
                ];

        # CEK, APAKAH LOLOS VALIDASI
        if($this->validate($rules))
        {
            $update = [
                            'isi_paket'         => $this->request->getVar('isi_paket'), 
                            'penghunis_id'      => $this->request->getVar('penghunis_id'),
                            'tanggal_ambil'     => $this->request->getVar('tanggal_ambil'),
                        ];

            $status = $model->update($id, $update);

            if($status)
            {
                session()->setFlashdata('message_success', 'Data berhasil disimpan!');
                return redirect()->to(base_url('paket'));
            }
            else 
            {
                session()->setFlashdata('message_danger', 'Data gagal disimpan!');
                return redirect()->to(base_url('paket/update/' . $id));
            } 
        }
        else
        {
            $data = array(
                        'title'         => 'Ubah Data Paket',
                        'edit'          => $model->where('id', $id)->first(),
                        'validation'    => $this->validator,
                    );
            echo view('backend/paket/edit', $data);
        }
    }

    public function delete($id = null)
    {
        $model = new PaketsModel();
        $status= $model->where('id', $id)->delete($id);

        if($status)
        {
            session()->setFlashdata('message_success', 'Data berhasil dihapus!');            
        }
        else 
        {
            session()->setFlashdata('message_danger', 'Data gagal dihapus!');
        }   

        return redirect()->to(base_url('paket'));
    }
}
