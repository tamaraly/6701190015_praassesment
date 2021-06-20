<?php echo $this->extend('layouts/front') ?>

<?php echo $this->section('content') ?>

<section id="features" class="features mt-5" data-aos="fade-up">
    <div class="container">
        <div class="row content justify-content-center">
            <div class="col-md-4 mt-5 mb-5 pb-5" data-aos="fade-left" data-aos-delay="100">
                <div class="card">
                    <div class="card-header text-center">
                        Silakan Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('login/auth'); ?>">

                            <?php if (session()->getFlashdata('register_success')) : ?>
                                <div class="alert alert-success">
                                    <small>
                                        <?php echo session()->getFlashdata('register_success') ?>
                                    </small>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('message')) : ?>
                                <div class="alert alert-danger">
                                    <small>
                                        <?php echo session()->getFlashdata('message') ?>
                                    </small>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger">
                                    <small>
                                        <?php echo $validation->listErrors() ?>
                                    </small>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP/Username</label>
                                <input type="text" class="form-control" id="nip" name="nip">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <div class="mt-4 text-center">
                                <a href="<?php echo base_url('register'); ?>">
                                    <small>
                                        Klik Disini Untuk Mendaftar <i class="bx bx-arrow-from-left"></i>
                                    </small>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $this->endSection(); ?>