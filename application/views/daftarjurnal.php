<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Daftar Jurnal</h1>
                    <p>Temukan jurnal yang ingin anda cari disini dan silahkan request</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="site-section">
    <div class="container">
        <!-- left column -->
        <div class="md-12">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Jurnal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($daftarjurnal as $u) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url(); ?>detailJurnal/<?php echo $u->id_jurnal ?>">
                                    <p style="margin-left: .5in; text-indent: -.5in;" align="justify">
                                        <?php echo substr($u->tgl_terbit, 0, 4) ?>, <?php echo $u->judul_jurnal ?>.
                                        <i><?php echo $u->nama_penerbit ?></i>, <?php echo $u->volume ?>
                                        (<?php echo $u->nomor ?>), <?php echo $u->halaman ?>.
                                    </p>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!--/.col (left) -->
    </div>
</section>
<!-- /.content -->