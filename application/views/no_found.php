<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Halaman tidak ditemukan</h1>
                    <p>Silahkan anda ketik kata kunci yang sesuai
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="site-section">
    <div class="container">
        <!-- Login -->

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="text-primary">
                  <?php $keyword = $this->session->keyword ?>
                    <h1>Ops... <?php echo $this->session->keyword ?> tidak ditemukan :(</h1>
                </div>
                <br>
                <div class="text-center">
                    <a class="btn btn-dark" href="<?php echo base_url();?>">kembali ke halaman utama</a>
                </div>

            </div>
            <div class="col-md-3"></div>
        </div>
</section>
<!-- /.content -->
