<?php

namespace App\Controllers;

use App\Models\PenghunisModel;

class Penghuni extends BaseController
{
    public function index()
    {
        # CEK, JIKA BELUM ADA SESSION-NYA MAKA HARUS LOGIN
        if (!session()->get('id')) {
            session()->setFlashdata('message', 'Silahkan login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }

        $penghunis = new PenghunisModel();

        $data = array(
            'title'     => 'Daftar Penghuni',
            'penghuni'  => $penghunis->findAll(),
        );
        echo view('backend/penghuni/index', $data);
    }

    public function create()
    {
        # CEK, JIKA BELUM ADA SESSION-NYA MAKA HARUS LOGIN
        if (!session()->get('id')) {
            session()->setFlashdata('message', 'Silahkan login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }

        helper(['form']);

        $data = array(
            'title'     => 'Tambah Data Penghuni',
        );
        echo view('backend/penghuni/create', $data);
    }

    public function store()
    {
        helper(['form']);

        $rules = [
            'nama'      => 'required|min_length[3]',
            'no_ktp'    => 'required|min_length[16]',
            'unit'      => 'required',
            'foto'      => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]',
        ];

        # CEK, APAKAH LOLOS VALIDASI
        if ($this->validate($rules)) {
            $model      = new PenghunisModel();

            $upload = $this->request->getFile('foto');
            $upload->move(WRITEPATH . '../public/uploads/');

            $insert     = [
                'unit'      => $this->request->getVar('unit'),
                'nama'      => $this->request->getVar('nama'),
                'no_ktp'    => $this->request->getVar('no_ktp'),
                'foto'      => $upload->getName(),
            ];

            $status = $model->save($insert);

            if ($status) {
                session()->setFlashdata('message_success', 'Data berhasil disimpan!');
                return redirect()->to(base_url('penghuni'));
            } else {
                session()->setFlashdata('message_danger', 'Data gagal disimpan!');
                return redirect()->to(base_url('penghuni/create'));
            }
        } else {
            $data = array(
                'title'         => 'Tambah Data Penghuni',
                'validation'    => $this->validator,
            );
            echo view('backend/penghuni/create', $data);
        }
    }

    public function edit($id = null)
    {
        helper(['form']);
        $model = new PenghunisModel();

        $data = array(
            'title'     => 'Ubah Data Penghuni',
            'edit'      => $model->where('id', $id)->first()
        );
        echo view('backend/penghuni/edit', $data);
    }

    public function update()
    {
        helper(['form']);

        $model  = new PenghunisModel();
        $id     = $this->request->getVar('id');

        $rules = [
            'nama'          => 'required|min_length[3]',
            'no_ktp'         => 'required|min_length[16]',
            'unit'          => 'required',
        ];

        # CEK, APAKAH LOLOS VALIDASI
        if ($this->validate($rules)) {
            $upload     = $this->request->getFile('foto');
            $foto_baru  = $this->request->getVar('foto_lama');

            if ($upload && $upload->getName()) {
                $upload->move(WRITEPATH . '../public/uploads/');

                if (file_exists(WRITEPATH . '../public/uploads/' . $upload->getName())) {
                    @unlink(WRITEPATH . '../public/uploads/' . $foto_baru);
                    $foto_baru = $upload->getName();
                }
            }

            $update = [
                'nama'      => $this->request->getVar('nama'),
                'no_ktp'    => $this->request->getVar('no_ktp'),
                'unit'      => $this->request->getVar('unit'),
                'foto'      => $foto_baru
            ];

            $status = $model->update($id, $update);

            if ($status) {
                session()->setFlashdata('message_success', 'Data berhasil disimpan!');
                return redirect()->to(base_url('penghuni'));
            } else {
                session()->setFlashdata('message_danger', 'Data gagal disimpan!');
                return redirect()->to(base_url('penghuni/update/' . $id));
            }
        } else {
            $data = array(
                'title'         => 'Ubah Data Penghuni',
                'edit'          => $model->where('id', $id)->first(),
                'validation'    => $this->validator,
            );
            echo view('backend/penghuni/edit', $data);
        }
    }

    public function delete($id = null)
    {
        $model      = new PenghunisModel();
        $penghuni   = $model->where('id', $id);

        $edit       = $penghuni->first();
        $status     = $penghuni->delete($id);

        if ($status) {
            if (file_exists(WRITEPATH . '../public/uploads/' . $edit['foto'])) {
                @unlink(WRITEPATH . '../public/uploads/' . $edit['foto']);
            }

            session()->setFlashdata('message_success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('message_danger', 'Data gagal dihapus!');
        }

        return redirect()->to(base_url('penghuni'));
    }
}
