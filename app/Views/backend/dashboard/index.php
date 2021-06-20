<?php echo $this->extend('layouts/back') ?>

<?php echo $this->section('content') ?>

    <section id="features" class="features mt-5" data-aos="fade-up">
        <div class="container">
            <div class="row content justify-content-center" style="min-height:480px;">
                <div class="col-md-12 mt-5 mb-5 pb-5" data-aos="fade-left" data-aos-delay="100">
                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>
                        <div class="card-body">    
                            <?php echo $hello; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php echo $this->endSection(); ?>