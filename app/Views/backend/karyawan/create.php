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
                            <form action="<?php echo base_url('karyawan/store')?>" method="post" accept-charset="utf-8">
                                
                                <?php if(isset($validation)):?>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <?php echo $validation->listErrors(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <div class="form-group row">
                                    <label class="col-md-3" for="nip">
                                        NIP/Username
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="nip" id="nip" placeholder="Masukkan NIP/Username" class="form-control" value="<?php echo set_value('nip');?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="password">
                                        Password
                                    </label>
                                    <div class="col-md-5">
                                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" value="<?php echo set_value('password');?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="nama">
                                        Nama Karyawan
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Karyawan" class="form-control" value="<?php echo set_value('nama');?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">
                                        &nbsp;
                                    </label>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-save"></i> Simpan
                                        </button>
                                        <a href="<?php echo base_url('karyawan');?>" class="btn btn-dark">
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