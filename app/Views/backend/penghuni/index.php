<?php echo $this->extend('layouts/back') ?>

<?php echo $this->section('content') ?>

<section id="features" class="features mt-5" data-aos="fade-up">
    <div class="container">
        <div class="row content justify-content-center" style="min-height:480px;">
            <div class="col-md-12 mt-5 mb-5 pb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <div class="card-header">
                        <?php echo $title; ?>
                    </div>
                    <div class="card-body">

                        <?php if (session()->getFlashdata('message_success')) : ?>
                            <div class="alert alert-success MyHide">
                                <small>
                                    <?php echo session()->getFlashdata('message_success') ?>
                                </small>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('message_danger')) : ?>
                            <div class="alert alert-dange MyHide">
                                <small>
                                    <?php echo session()->getFlashdata('message_danger') ?>
                                </small>
                            </div>
                        <?php endif; ?>

                        <a href="<?php echo base_url('penghuni/create'); ?>" title="Tambah Data" class="btn btn-primary mb-2">
                            <i class="bx bx-plus"></i> Tambah Penghuni
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th class="text-center" width="50">No</th>
                                        <th>Nama Penghuni</th>
                                        <th width="200">No. KTP</th>
                                        <th class="text-center" width="150">Foto</th>
                                        <th>Unit</th>
                                        <th class="text-center" width="120">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($penghuni) {
                                        $nomor = 0;
                                        foreach ($penghuni as $row) {
                                            $nomor++;
                                            $foto = base_url('assets/img/default.png');

                                            if (file_exists(WRITEPATH . '../public/uploads/' . $row['foto']) && $row['foto']) {
                                                $foto = base_url('uploads/' . $row['foto']);
                                            }

                                            echo '
                                                    <tr>
                                                        <td class="text-center">' . $nomor . '</td>
                                                        <td>' . $row['nama'] . '</td>
                                                        <td>' . ($row['no_ktp'] ? $row['no_ktp'] : '-') . '</td>
                                                        <td>
                                                            <a href="' . $foto . '" target="_blank">
                                                                <img src="' . $foto . '" alt="' . $row['nama'] . '" style="width:150px;">
                                                            </a>
                                                        </td>
                                                        <td>' . $row['unit'] . '</td>
                                                        <td class="text-center">
                                                            <a href="' . base_url('penghuni/edit/' . $row['id']) . '" class="btn btn-warning" title="Ubah Data">
                                                                <i class="bx bx-edit"></i>
                                                            </a>
                                                            <a href="' . base_url('penghuni/delete/' . $row['id']) . '" class="btn btn-danger" title="Hapus Data" onclick="return confirm(\'ANDA YAKIN INGIN MENGHAPUS DATA INI?\')">
                                                                <i class="bx bx-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    ';
                                        }
                                    } else {
                                        echo '
                                                <tr>
                                                    <td colspan="5" class="text-center">TIDAK ADA DATA</td>
                                                </tr>
                                                ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $this->endSection(); ?>