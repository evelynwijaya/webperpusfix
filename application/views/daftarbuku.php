<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Daftar Buku</h1>
                    <p>Temukan buku yang ingin anda cari disini dan silahkan
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
        <!-- left column -->
        <div class="md-12">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Buku</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($databuku as $u) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url(); ?>detailBuku/<?php echo $u['id_buku'] ?>">
                                    <p style="margin-left: .5in; text-indent: -.5in;" align="justify">
                                        <?php echo $u['pengarang'] ?> (<?php echo $u['thn_terbit'] ?>).
                                        <i><?php echo $u['judul_buku'] ?></i>. <?php echo $u['tempat_terbit'] ?>
                                        : <?php echo $u['nama_penerbit'] ?>
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