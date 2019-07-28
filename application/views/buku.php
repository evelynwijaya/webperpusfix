<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Entry Buku</h1>
                    <p>Silahkan tambahakan Buku Baru untuk keperluan perpustakaan.
                        <request></request>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /HOME -->

<!-- Main content -->
<section class="site-section">
    <div class="container">
        <!-- Tambah Buku -->

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

        <form action="<?php echo base_url(); ?>Buku/tambah_buku" method="post" enctype="multipart/form-data">

            <div class="form-row after-add-more">
                <div class="form-group col-md-12">
                    <label class="text-black" for="judul_paper">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 form-group-lg" hidden>
                    <input type="text" class="form-control idpengarang" id="idpengarang" name="idpengarang[]">
                </div>

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="penerbit">Pengarang</label>
                    <input type="text" class="form-control pengarang" id="pengarang" name="pengarang[]" required>
                </div>

                <div class="form-group col-md-3">
                    <label class="text-black" for="urutan">Urutan</label>
                    <input type="text" class="form-control" value="1" readonly name="urutan[]" id="urutan" required>
                </div>

                <div class="form-group col-md-1">
                    <label class="text-black" for="tambah_pengarang">&nbsp</label><br>
                    <input type="button" class="btn btn-primary add-more col-auto" value="&nbsp+&nbsp"/>
                </div>

                <div class="form-group col-md-2">
                    <label class="text-black" for="tambah_pengarang">&nbsp</label><br>
                    <input href="#" target="_blank" type="button" class="btn btn-warning col-auto" data-toggle="modal"
                           data-target="#pengarangModal" value="Tambah Pengarang"/>
                </div>
            </div>

            <div class="divpengarang">

            </div>

            <div class="form-row">
                <div class="form-group col-md-10 form-group-lg">
                    <label class="text-black" for="penerbit">Penerbit</label>
                    <select class="js-example-basic-single form-control penerbit" name="penerbit"
                            data-placeholder="Pilih Penerbit">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label class="text-black" for="tambah_penerbit">&nbsp</label><br>
                    <input href="#" target="_blank" type="button" class="btn btn-warning col-auto" data-toggle="modal"
                           data-target="#penerbitModal" value="Tambah Penerbit"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="issn">ISSN</label>
                    <input type="text" name="issn" class="form-control" required>
                </div>

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="tahun_terbit">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" class="form-control" required>
                </div>

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="kode_ddc">Kode DDC</label>
                    <input type="text" name="kode_ddc" class="form-control" required>
                </div>

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="eksamplar">Eksamplar</label>
                    <input type="text" name="eksamplar" class="form-control" required>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="5" id="deskripsi"></textarea>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="gambar">Gambar</label>

                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <img class="form-control" id="uploadPreview" style="width: 200px; height: 200px;"/><br>
                        </div>
                        <div class="col-auto">
                            <input type="file" id="uploadImage" name="myPhoto" onchange="PreviewImage();"
                                   class="form-control-file">
                        </div>
                    </div>
                </div>

                <div class="form-group p-3">
                    <div class="col-auto custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="no_image" onclick="run()" name="no_image">
                        <label class="custom-control-label" for="no_image">No Image</label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                </div>

            </div>

        </form>

    </div>
</section>
<!-- /.content -->
