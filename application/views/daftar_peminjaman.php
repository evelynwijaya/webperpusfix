<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Daftar Peminjaman</h1>
                    <p>Daftar Anggota yang sedang meminjam buku di perpustakaan STMIK KHARISMA Makassar
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="site-section">
    <div class="container">

        <div class="table-responsive" id="example_wrapper">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Anggota</th>
                    <th class="text-center">Tanggal Pinjam</th>
                    <th class="text-center">Batas Waktu</th>
                    <th class="text-center">Jumlah Buku</th>
                    <th class="text-center">Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($daftarpeminjaman as $u) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $u->nama ?></td>
                        <td class="text-center"><?php echo $u->tgl_pinjam ?></td>
                        <td class="text-center">
                            <?php

                            $start_date = new DateTime(date("Y-m-d"));
                            $end_date = new DateTime($u->tgl_kembali);
                            $interval = $start_date->diff($end_date);
                            if( $start_date > $end_date){
                                ?>
                                <span class="badge badge-danger">telah melewati masa waktu</span>
                                <?php
                            }else {
                                if ($interval->days >= 2 && $interval->days <= 3) {
                                    ?>
                                    <span class="badge badge-success">sisa waktu <?php echo $interval->days ?> hari</span>
                                    <?php
                                } else if ($interval->days == 1 ) {
                                    ?>
                                    <span class="badge badge-info">sisa waktu <?php echo $interval->days ?> hari</span>
                                    <?php
                                } else if ($interval->days == 0) {
                                    ?>
                                    <span class="badge badge-warning">sisa waktu <?php echo $interval->days ?> hari</span>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                        <td class="text-center"><?php echo $u->jumlah ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning"
                               href="<?php echo base_url() . 'DetailPeminjaman/' . $u->id_peminjaman ?>"><i
                                        class="icon-pencil"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>

</section>
<!-- /.content -->