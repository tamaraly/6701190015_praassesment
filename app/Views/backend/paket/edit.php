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
                            <form action="<?php echo base_url('paket/update')?>" method="post" accept-charset="utf-8">
                                
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
                                    <label class="col-md-3" for="isi_paket">
                                        Isi Paket
                                    </label>
                                    <div class="col-md-5">
                                        <textarea class="form-control" name="isi_paket" id="isi_paket" rows="5" required><?php echo (set_value('isi_paket') ? set_value('isi_paket') : $edit['isi_paket']);?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="penghunis_id">
                                        Nama Penghuni
                                    </label>
                                    <div class="col-md-5">
                                        <select name="penghunis_id" id="penghunis_id" class="form-control" required>
                                            <option value="">- PILIH PENGHUNI -</option>
                                            <?php
                                            if($penghuni)
                                            {
                                                foreach($penghuni as $row)
                                                {
                                                    $selected = ($row['id'] == (set_value('penghunis_id') ? set_value('penghunis_id') : $edit['penghunis_id']) ? 'selected' : '');

                                                    echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['nama'].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>   
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="tanggal_ambil">
                                        Tanggal Ambil
                                    </label>
                                    <div class="col-md-5">
                                        <input type="date" name="tanggal_ambil" id="tanggal_ambil" placeholder="Masukkan Tanggal Ambil" class="form-control" value="<?php echo (set_value('tanggal_ambil') ? set_value('tanggal_ambil') : $edit['tanggal_ambil']);?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">
                                        &nbsp;
                                    </label>
                                    <div class="col-md-5">
                                        <input type="hidden" name="id" value="<?php echo $edit['id'];?>">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-save"></i> Simpan
                                        </button>
                                        <a href="<?php echo base_url('paket');?>" class="btn btn-dark">
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