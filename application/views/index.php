<!-- HOME -->
<section class="home-section section-hero overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');"
         id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-4 ml-auto">
                <h3 class="text-white">Pencarian Populer</h3>
                <ul class="list-unstyled text-white">
                    <?php
                    $no = 1;
                    foreach ($buku_populer as $u) {
                        ?>
                        <li><a href="<?php echo base_url(); ?>detailBuku/<?php echo $u->id_buku ?>" class="text-white"><?php echo $no++.'. '.$u->judul_buku?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">STMIK KHARISMA LIBRARY</h1>
                    <p>Temukan buku bacaan anda untuk menambah ilmu pengetahuan</p>
                </div>
                <form action="<?php echo base_url(); ?>Pencarian/cari_detail" method="post" class="form-search"
                      id="form-search">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg" id="cari_semua_data"
                                   name="cari_semua_data"placeholder="Judul Buku, Kata Kunci..." value="<?php $this->session->keyword ?>">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="form-control form-control-lg" id="kategori" name="kategori" onChange="valueKategori()">
                                <option value="buku">Buku</option>
                                <option value="jurnal">Jurnal</option>
                                <option value="skripsi">Skripsi</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"
                                    id="btn_cari_semua">
                                <span class="icon-search icon mr-2"></span>Cari Buku
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>



<section class="py-5 bg-image overlay-primary fixed overlay"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="text-white">Ingin Meminjam Buku?</h2>
                <p class="mb-0 text-white lead">Silahkan Login terlebih dahulu untuk melakukan proses peminjaman
                    buku</p>
            </div>
            <div class="col-md-3 ml-auto">
                <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
            </div>
        </div>
    </div>
</section>
