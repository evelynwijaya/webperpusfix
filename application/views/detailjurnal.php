<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');"
         id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Detail Jurnal</h1>
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
                        <h2><?php echo $datajurnal['judul_jurnal'] ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <figure class="mb-5">
                        <?php
                        if ($datajurnal['gambar'] == null) {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/images/gambar_buku.jpg ?>"
                                 alt="Free Website Template by Free-Template.co"
                                 class="img-fluid rounded">
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/images/jurnal/<?php echo $datajurnal['gambar'] ?>"
                                 alt="Free Website Template by Free-Template.co"
                                 class="img-fluid rounded">
                            <?php
                        }
                        ?>
                    </figure>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Detail Jurnal</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Tanggal Terbit
                                :</strong> <?php echo format_tanggal($datajurnal['tgl_terbit']); ?></li>
                        <li class="mb-2"><strong class="text-black">ISSN:</strong> <?php echo $datajurnal['issn'] ?>
                        </li>
                        <li class="mb-2"><strong class="text-black">Volume:</strong> <?php echo $datajurnal['volume'] ?>
                        </li>
                        <li class="mb-2"><strong class="text-black">Nomor:</strong> <?php echo $datajurnal['nomor'] ?>
                        </li>
                        <li class="mb-2"><strong
                                    class="text-black">Halaman:</strong> <?php echo $datajurnal['halaman'] ?></li>
                        <li class="mb-2"><strong
                                    class="text-black">Penerbit:</strong> <?php echo $datajurnal['nama_penerbit'] ?>
                        </li>
                    </ul>
                </div>



                <br>

                <?php
                if ($this->session->userdata('status') == "login") {
                    ?>
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Action</h3>
                        <div class="row">
                            <!-- <div class="col-6">
                                <a href="<?php echo base_url(); ?>editJurnal/<?php echo $datajurnal['id_jurnal'] ?>"
                                   class="btn btn-block btn-warning btn-md"><span
                                            class="icon-pencil mr-2"></span>Edit</a>
                            </div> -->
                            <div class="col-6">
                                <a href="<?php echo base_url(); ?>hapusJurnal/<?php echo $datajurnal['id_jurnal'] ?>"
                                   onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')"
                                   class="btn btn-block btn-danger btn-md"><span
                                            class="icon-trash mr-2"></span>Hapus</a>
                            </div>
                        </div>
                        <!--                    <div class="col-md-12">-->
                        <!--                        <a href="#" class="btn btn-warning col-auto"><span class="icon-pencil"></span>Edit</a>-->
                        <!--                        <a href="#" class="btn btn-danger col-auto"><span class="icon-trash"></span>Delete</a>-->
                        <!--                    </div>-->
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>

        <div class="md-12">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul Paper</th>
                        <th class="text-center">Pengarang</th>
                        <th class="text-center">Halaman</th>
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
                    foreach ($datapaper as $u) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $u['judul_paper'] ?></td>
                            <td class="text-center"><?php echo $u['pengarang'] ?></td>
                            <td class="text-center"><?php echo $u['halaman'] ?></td>
                            <?php
                            if ($this->session->userdata('status') == "login") {
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning"
                                       href="<?php echo base_url() . 'editPaper/' . $u['id_paper'] . '/' . $datajurnal['id_jurnal'] ?>"><i
                                                class="icon-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger"
                                       onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')"
                                       href="<?php echo base_url() . 'hapusPaper/' . $u['id_paper'] . '/' . $datajurnal['id_jurnal'] ?>"><i
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
    </div>
</section>
