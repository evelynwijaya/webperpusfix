<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Entry Pengarang</h1>
                    <p>Silahkan tambahakan daftar pengarang yang ada untuk diinput ke dalam jurnal, buku atau paper
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
        <!-- Tambah Pengarang -->
        <div class="md-12">

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

            <form action="<?php echo base_url(); ?>Pengarang/tambah_pengarang" method="post">

                <div class="row">
                    <div class="row form-group col-md-12">
                        <label class="text-black" for="nama_depan">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" required>
                    </div>

                    <div class="row form-group col-md-12">
                        <label class="text-black" for="nama_belakang">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control">
                    </div>

                    <div class="row form-group col-md-12">
                        <label class="text-black" for="institusi">Institusi</label>
                        <input type="text" name="institusi" class="form-control">
                    </div>

                    <div class="row form-group col-md-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                    </div>
                </div>

            </form>

        </div>
        <!--/.Tambah Pengarang -->
    </div>
</section>
<!-- /.content -->