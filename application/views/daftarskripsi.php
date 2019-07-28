<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Daftar Skripsi</h1>
                    <p>Temukan Skripsi yang ingin anda cari disini dan silahkan request</p>
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
                        <th class="text-center">Skripsi</th>
                        <?php
                        if ($this->session->userdata('status') == "login") {
                            ?>
                            <th class="text-center">Opsi</th>
                            <?php
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($daftarSkripsi as $u) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center">
                                <p style="margin-left: .5in; text-indent: -.5in;" align="justify">
                                    <?php echo $u->nama_belakang ?>, <?php echo substr($u->nama_depan,0,1) ?>, <?php echo $u->thn_terbit ?>,
                                    <strong><?php echo $u->judul_skripsi ?></strong>, Skripsi STMIK Kharisma Makassar
                                </p>

                            </td>
                            <?php
                            if ($this->session->userdata('status') == "login") {
                                ?>
                                <td class="text-center">
                                    <!-- <a class="btn btn-sm btn-warning"
                                       href="<?php echo base_url() . 'editSkripsi/' . $u->id_skripsi ?>"><i
                                                class="icon-pencil"></i></a> -->
                                    <a class="btn btn-sm btn-danger"
                                       onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')"
                                       href="<?php echo base_url() . 'hapusSkripsi/' . $u->id_skripsi ?>"><i
                                                class="icon-trash"></i></a>
                                </td>
                                <?php
                            }
                            ?>
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
