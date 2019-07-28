<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Laporan Buku</h1>
                    <p>Daftar buku yang anda pada perpustakaan STMIK KHARISMA Makassar
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


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>Buku/tampil_laporan_buku" method="POST">
                            <div class="form-group">
                                <label>Tahun Pengadaan</label>
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="laporan_tahun_terbit" name="tahun" class="form-control"
                                               value="<?php echo $tahun ?>">
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

        <div class="table-responsive" id="example_wrapper">
            <table id="tabel_laporan_buku" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Buku</th>
                    <th class="text-center">Jumlah Buku</th>
                </tr>
                </thead>
                <?php
                if (sizeof($databuku) > 0) {
                ?>
                <tbody>
                <?php
                $no = 1;
                foreach ($databuku as $u) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center" style="width: 100%;">
                            <a href="<?php echo base_url(); ?>detailBuku/<?php echo $u['id_buku'] ?>"><?php echo $u['pengarang'] ?>(<?php echo $u['thn_terbit'] ?>).<?php echo $u['judul_buku'] ?>. <?php echo $u['tempat_terbit'] ?>: <?php echo $u['nama_penerbit'] ?></a>
                        </td>
                        <td class="text-center"><?php echo $u['jmh_buku'] ?></td>
                    </tr>
                <?php }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->
