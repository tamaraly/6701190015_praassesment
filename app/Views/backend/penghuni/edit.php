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
                        <form action="<?php echo base_url('penghuni/update') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                            <?php if (isset($validation)) : ?>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            <?php echo $validation->listErrors(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group row">
                                <label class="col-md-3" for="nama">
                                    Nama Penghuni
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" value="<?php echo (set_value('nama') ? set_value('nama') : $edit['nama']); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for="no_ktp">
                                    No. KTP
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="no_ktp" id="no_ktp" placeholder="Masukkan No KTP" class="form-control" value="<?php echo (set_value('no_ktp') ? set_value('no_ktp') : $edit['no_ktp']); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="foto">
                                    Foto
                                </label>
                                <div class="col-md-5">
                                    <?php
                                    if (file_exists(WRITEPATH . '../public/uploads/' . $edit['foto']) && $edit['foto']) {
                                        $foto = base_url('uploads/' . $edit['foto']);
                                        echo '<a href="' . $foto . '" target="_blank">
                                                <img src="' . $foto . '" alt="' . $edit['nama'] . '" style="width:150px;" class="mb-2">
                                            </a>';
                                    }
                                    ?>
                                    <input type="file" name="foto" id="foto" placeholder="Masukkan Foto" class="form-control">
                                    <input type="hidden" name="foto_lama" id="foto_lama" value="<?php echo $edit['foto']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="unit">
                                    Unit
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="unit" id="unit" placeholder="Masukkan Unit" class="form-control" value="<?php echo (set_value('unit') ? set_value('unit') : $edit['unit']); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">
                                    &nbsp;
                                </label>
                                <div class="col-md-5">
                                    <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-save"></i> Simpan
                                    </button>
                                    <a href="<?php echo base_url('penghuni'); ?>" class="btn btn-dark">
                                        <i class="bx bx-reply"></i> Batal
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $this->endSection(); ?>