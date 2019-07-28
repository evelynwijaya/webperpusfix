<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');"
         id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Detail Peminjaman</h1>
            </div>
        </div>
    </div>
</section>

<?php
function format_tanggal($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>


<section class="site-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2><?php echo $detailpeminjaman['nama'] ?></h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8">
                <div class="bg-light p-3 rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Detail Peminjaman</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Tanggal Pinjam
                                :</strong> <?php echo format_tanggal($detailpeminjaman['tgl_pinjam']); ?></li>
                        <li class="mb-2"><strong class="text-black">Jumlah Buku yang
                                dipinjam:</strong> <?php echo sizeof($databuku) ?>
                        </li>
                        <li class="mb-2"><strong class="text-black">Batas Waktu:</strong>
                            <?php

                            $start_date = new DateTime(date("Y-m-d"));
                            $end_date = new DateTime($detailpeminjaman['tgl_kembali']);
                            $interval = $start_date->diff($end_date);
                            if ($start_date > $end_date) {
                                $telat = $interval->days;
                                ?>
                                <span class="badge badge-danger">telah melewati masa waktu</span>
                                <?php
                            } else {
                                $telat = 0;
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
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="bg-light p-3 rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Foto Mahasiswa</h3>
                    <img src="<?php echo base_url(); ?>assets/images/no_image.png"
                         class="img-fluid pl-3 mb-0 rounded-0">
                </div>

            </div>
        </div>

        <br>

        <div class="md-12">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul Buku</th>
                        <th class="text-center">Pengarang</th>
<!--                        --><?php
//                        if (sizeof($databuku) != 1 or $telat != 0 ) {
//                            ?>
<!--                            <th class="text-center">Opsi</th>-->
<!--                            --><?php
//                        }
//                        ?>

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
                                <?php echo $u['judul_buku'] ?></td>
                            <td class="text-center">
                                <?php echo $u['pengarang'] ?></td>
<!--                            --><?php
//                            if (sizeof($databuku) != 1 or $telat != 0) {
//                                ?>
<!--                                <td class="text-center">-->
<!--                                    <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Kembalikan Buku"-->
<!--                                       href="-->
<!--                    --><?php //echo base_url() . 'Peminjaman/kembalisatubuku/' . $u['id_buku'] . '/' . $detailpeminjaman['id_peminjaman']. '/' . $detailpeminjaman['jumlah'] ?><!--"><i-->
<!--                                                class="icon-arrow-circle-o-right"></i></a>-->
<!--                                </td>-->
<!--                                --><?php
//                            }
//                            ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <br>

                <a href="<?php echo base_url(). 'Peminjaman/kembaliSemuaBuku/'.$detailpeminjaman['id_peminjaman'].'/'.$telat ?>" class="btn btn-primary float-lg-right m-1">Kembalikan Semua Buku</a>
                <a href="<?php echo base_url(). 'DaftarPeminjaman'?>" class="btn btn-danger float-lg-right m-1">Batal</a>
            </div>

        </div>
    </div>
</section>