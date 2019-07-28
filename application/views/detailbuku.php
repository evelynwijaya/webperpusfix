<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');"
         id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Detail Buku</h1>
            </div>
        </div>
    </div>
</section>


<section class="site-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2><?php echo $databuku['judul_buku'] ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <?php
                    if ($this->session->userdata('status') == "login" && $jmhavailable == 0) {
                        if (($requestbuku['id_buku'] != substr($databuku['id_buku'], 0, 17) && $requestbuku['id_anggota'] != $this->session->userdata('id') && $requestbuku['status'] != "1") || ($requestbuku['id_buku'] == substr($databuku['id_buku'], 0, 17) && $requestbuku['id_anggota'] == $this->session->userdata('id') && $requestbuku['status'] != "1")) {
                            ?>
                            <div class="col-12">
                                <a href="<?php echo base_url(); ?>Buku/RequestBuku/<?php echo $databuku['id_buku'] . "/" . $this->session->userdata('id') ?>" class="btn btn-block btn-light btn-md"><span
                                            class="icon-heart-o mr-2 text-danger"></span>Request Book</a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-12">
                                <a href="<?php echo base_url(); ?>Buku/RequestBuku/<?php echo $databuku['id_buku'] . "/" . $this->session->userdata('id') ?>"
                                   class="btn btn-block btn-dark btn-md"><span
                                            class="icon-heart mr-2 text-danger"></span>Sudah di Request</a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <figure class="mb-5">
                        <?php
                        if ($databuku['gambar'] == null) {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/images/gambar_buku.jpg ?>"
                                 alt="Free Website Template by Free-Template.co"
                                 class="img-fluid rounded">
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo base_url(); ?>assets/images/buku/<?php echo $databuku['gambar'] ?>"
                                 alt="Free Website Template by Free-Template.co"
                                 class="img-fluid rounded">
                            <?php
                        }
                        ?>
                    </figure>
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Deksripsi</h3>
                    <p><?php echo $databuku['deskripsi'] ?></p>
                </div>


            </div>
            <div class="col-lg-4">
                <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Detail Buku</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                        <li class="mb-2"><strong class="text-black">Tahun
                                Terbit:</strong> <?php echo $databuku['thn_terbit'] ?></li>
                        <li class="mb-2"><strong
                                    class="text-black">Penerbit:</strong> <?php echo $databuku['nama_penerbit'] ?></li>
                        <li class="mb-2"><strong class="text-black">Tempat
                                Terbit:</strong> <?php echo $databuku['tempat_terbit'] ?></li>
                        <li class="mb-2"><strong class="text-black">ISSN:</strong> <?php echo $databuku['isbn'] ?></li>
                        <li class="mb-2"><strong class="text-black">Jumlah Buku yang
                                tersedia:</strong> <?php echo $databuku['eksemplar'] ?> Buku
                        </li>
                        <li class="mb-2"><strong class="text-black">Kode
                                DDC:</strong> <?php echo $databuku['kode_ddc'] ?></li>
                        <li class="mb-2"><strong class="text-black">Pengarang:</strong> <?php echo $datapengarang ?>
                        </li>
                    </ul>
                </div>



                <br>

                <?php
                if ($this->session->userdata('status') == "login" && $this->session->userdata('status_user') == "Admin") {
                    ?>
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Action</h3>
                        <div class="row">
                            <!-- <div class="col-6">
                                <a href="<?php echo base_url(); ?>editBuku/<?php echo $databuku['id_buku'] ?>"
                                   class="btn btn-block btn-warning btn-md"><span
                                            class="icon-pencil mr-2"></span>Edit</a>
                            </div> -->
                            <div class="col-6">
                                <a href="<?php echo base_url(); ?>hapusBuku/<?php echo $databuku['id_buku'] ?>"
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
    </div>
</section>
