<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Entry Skripsi</h1>
                    <p>Silahkan tambahakan Skripsi Baru untuk keperluan perpustakaan.
                        <request></request>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="site-section">
    <div class="container">
        <!-- Tambah Skripsi -->

        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if ($error) {
            ?>
            <div class="col-md-12 no-padding">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $error; ?>
                </div>
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if ($success) {
            ?>
            <div class="col-md-12 no-padding">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $success; ?>
                </div>
            </div>
        <?php } ?>

        <form action="<?php echo base_url(); ?>Skripsi/tambah_Skripsi" method="post">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="text-black" for="judul_skrispi">Judul Skripsi</label>
                    <input type="text" name="judul_skripsi" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-black" for="nama_depan">Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-black" for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" required>
                </div>

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="pembimbing1">Pembimbing 1</label>
                    <input type="text" name="pembimbing1" class="form-control" required>
                </div>

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="pembimbing2">Pembimbing 2</label>
                    <input type="text" name="pembimbing2" class="form-control" required>
                </div>


                <div class="form-group col-md-12">
                    <label class="text-black" for="lulusan">Lulusan</label>
                    <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="lulusan" value="Strata Satu (S1)" id="strata1" checked>
                            <label class="custom-control-label" for="strata1">Strata Satu (S1)</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="lulusan" value="Diploma Tiga (D3)" id="diploma">
                            <label class="custom-control-label" for="diploma">Diploma Tiga (D3)</label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="jurusan">Jurusan</label>
                    <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="jurusan" value="Informatika (TI)" id="informatika" checked>
                            <label class="custom-control-label" for="informatika">Informatika (TI)</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="jurusan" value="Sistem Informasi (SI)" id="sistem_informasi">
                            <label class="custom-control-label" for="sistem_informasi">Sistem Informasi (SI)</label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="tahun_terbit">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" class="form-control" required>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                </div>
            </div>

        </form>

        <!--/.Tambah Pengarang -->
    </div>
</section>
<!-- /.content -->
