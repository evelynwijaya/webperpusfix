<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Riwayat Peminjaman</h1>
                    <p>Daftar Anggota yang telah meminjam buku di perpustakaan STMIK KHARISMA Makassar
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="site-section">
    <div class="container">

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


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>Peminjaman/tampil_riwayat_peminjaman" method="POST">
                            <div class="form-group">
                                <label>Tanggal Peminjaman</label>
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <input type="text" id="laporan_tahun_terbit" name="tahun" class="form-control"
                                                   value="<?php echo $tahun ?>">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" id="lihat_buku_tahun"
                                               class="btn btn-primary" value="Cari">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="text" id="januari" value="<?php echo $januari?>" hidden>
                            <input type="text" id="februari" value="<?php echo $februari?>" hidden>
                            <input type="text" id="maret" value="<?php echo $maret ?>" hidden>
                            <input type="text" id="april" value="<?php echo $april ?>" hidden>
                            <input type="text" id="mei" value="<?php echo $mei ?>" hidden>
                            <input type="text" id="juni" value="<?php echo $juni?>" hidden>
                            <input type="text" id="juli" value="<?php echo $juli?>" hidden>
                            <input type="text" id="agustus" value="<?php echo $agustus ?>" hidden>
                            <input type="text" id="september" value="<?php echo $september ?>" hidden>
                            <input type="text" id="oktober" value="<?php echo $oktober?>" hidden>
                            <input type="text" id="november" value="<?php echo $november?>" hidden>
                            <input type="text" id="desember" value="<?php echo $desember?>" hidden>
                            <div class="col-lg-11 mx-auto">
                                <canvas id="barChart" style="height:150px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-lg-12">
            <div class="row mb-5 bg-light rounded border p-3">
                <p>Total Peminjaman dari bulan Januari - Desember tahun <?php echo $tahun?> adalah </p>&nbsp; <p id="jmhtotalpeminjam"></p>
            </div>
        </div>
    </div>

    </div>

</section>
<!-- /.content -->