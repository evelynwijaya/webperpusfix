<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Edit Jurnal</h1>
                    <p>Silahkan edit Jurnal untuk keperluan perpustakaan.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="site-section">
    <div class="container">
        <!-- edit jurnal -->
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

        <form action="<?php echo base_url(); ?>Jurnal/edit_jurnal" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="text-black" for="nama_jurnal">Nama Jurnal</label>
                    <input type="text" name="nama_jurnal" class="form-control"
                           value="<?php echo $datajurnal['judul_jurnal'] ?>" required>
                    <input type="text" name="id_jurnal" class="form-control" hidden
                           value="<?php echo $datajurnal['id_jurnal'] ?>" required>
                    <input type="text" name="temp_id_penerbit" id="id_penerbit" class="form-control" hidden
                           value="<?php echo $datajurnal['id_penerbit'] ?>" required>
                </div>
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
                <div class="form-group col-md-12">
                    <label class="text-black" for="volume">Volume</label>
                    <input type="text" name="volume" class="form-control" value="<?php echo $datajurnal['volume'] ?>"
                           required>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="nomor">Nomor</label>
                    <input type="text" name="nomor" class="form-control" value="<?php echo $datajurnal['nomor'] ?>"
                           required>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="halaman">Halaman</label>
                    <input type="text" name="halaman" class="form-control" value="<?php echo $datajurnal['halaman'] ?>"
                           required>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="tanggal">Tanggal</label>
                    <input id="tgl_terbit" name="tanggal" class="form-control"
                           value="<?php echo $datajurnal['tgl_terbit'] ?>" required/>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="issn">ISSN</label>
                    <input type="text" name="issn" class="form-control" value="<?php echo $datajurnal['issn'] ?>"
                           required>
                    <input type="text" name="gambar" class="form-control" value="<?php echo $datajurnal['gambar'] ?>"
                           hidden>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-black" for="gambar">Gambar</label>
                    <div>
                        <?php if ($datajurnal['gambar'] == null) {
                            ?>
                            <img src="<?php echo base_url() . '/assets/images/no_image.png' ?>"
                                 class="form-control" id="uploadPreview" style="width: 200px; height: 200px;"/><br>
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo base_url() . '/assets/images/jurnal/' . $datajurnal['gambar'] ?>"
                                 class="form-control" id="uploadPreview" style="width: 200px; height: 200px;"/><br>
                            <?php
                        }
                        ?>
                        <input type="file" id="uploadImage" name="myPhoto" onchange="PreviewImage();"
                               class="form-control-file">
                    </div>
                </div>

                <div class="form-group p-3">
                    <div class="col-auto custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="no_image" onclick="run()"
                               name="no_image" <?php if ($datajurnal['gambar'] == null) echo "checked" ?>>
                        <label class="custom-control-label" for="no_image">No Image</label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                </div>
            </div>

        </form>

        <!--/.Tambah Pengarang -->
    </div>
</section>
<!-- /.content -->