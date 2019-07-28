<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Entry Penerbit</h1>
                    <p>Silahkan tambahkan daftar penerbit yang ada untuk diinput ke dalam jurnal, buku atau paper
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
        <!-- Tambah Penerbit -->
        <div class="md-12">

            <?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if ($error) {
                ?>
                <div class="col-md-12 no-padding">
                    <div class="alert alert-danger" role="alert">
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

            <form action="<?php echo base_url(); ?>Penerbit/tambah_penerbit" method="post">

                <div class="row">
                    <div class="row form-group col-md-12">
                        <label class="text-black" for="nama_penerbit">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" class="form-control" required>
                    </div>

                    <div class="row form-group col-md-12">
                        <label class="text-black" for="tempat_penerbit">Tempat Penerbit</label>
                        <input type="text" name="tempat_penerbit" class="form-control" required>
                    </div>

                    <div class="row form-group col-md-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                    </div>
                </div>

            </form>

        </div>
        <!--/.Tambah Penerbit-->
    </div>
</section>
<!-- /.content -->