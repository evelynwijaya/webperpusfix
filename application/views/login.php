<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Login</h1>
                    <p>silahkan login untuk akses perpustakaan STMIK KHARISMA Makassar.
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

                <form action="<?php echo base_url(); ?>User/aksi_login" method="post">

                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label class="text-black" for="judul_paper">NIM / NIK</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="text-black" for="deskripsi">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group col-lg-12">
                            <br>
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
</section>
<!-- /.content -->
