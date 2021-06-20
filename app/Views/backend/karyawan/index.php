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

                            <?php if(session()->getFlashdata('message_success')): ?>
                                <div class="alert alert-success MyHide">
                                    <small>
                                        <?php echo session()->getFlashdata('message_success') ?>
                                    </small>
                                </div>
                            <?php endif;?>

                            <?php if(session()->getFlashdata('message_danger')): ?>
                                <div class="alert alert-dange MyHide">
                                    <small>
                                        <?php echo session()->getFlashdata('message_danger') ?>
                                    </small>
                                </div>
                            <?php endif;?>

                            <a href="<?php echo base_url('karyawan/create');?>" title="Tambah Data" class="btn btn-primary mb-2">
                                <i class="bx bx-plus"></i> Tambah Karyawan
                            </a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th class="text-center" width="50">No</th>
                                            <th>NIP/Username</th>
                                            <th>Nama Karyawan</th>
                                            <th class="text-center" width="120">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($karyawan)
                                            {
                                                $nomor = 0;
                                                foreach($karyawan as $row)
                                                {
                                                    $nomor++;
                                                    echo '
                                                    <tr>
                                                        <td class="text-center">'.$nomor.'</td>
                                                        <td>'.$row['nip'].'</td>
                                                        <td>'.$row['nama'].'</td>
                                                        <td class="text-center">
                                                            <a href="'.base_url('karyawan/edit/' . $row['id']).'" class="btn btn-warning" title="Ubah Data">
                                                                <i class="bx bx-edit"></i>
                                                            </a>
                                                            <a href="'.base_url('karyawan/delete/' . $row['id']).'" class="btn btn-danger" title="Hapus Data" onclick="return confirm(\'ANDA YAKIN INGIN MENGHAPUS DATA INI?\')">
                                                                <i class="bx bx-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    ';
                                                }
                                            }
                                            else 
                                            {
                                                echo '
                                                <tr>
                                                    <td colspan="4" class="text-center">TIDAK ADA DATA</td>
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