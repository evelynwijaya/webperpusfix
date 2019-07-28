<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Entry Paper</h1>
                    <p>Silahkan tambahakan Paper Baru untuk keperluan perpustakaan.
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
        <!-- Tambah paper -->

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

        <form action="<?php echo base_url(); ?>Paper/tambah_paper" method="post" enctype="multipart/form-data">

            <div class="form-row after-add-more">
                <div class="form-group col-md-12">
                    <label class="text-black" for="judul_paper">Judul Paper</label>
                    <input type="text" name="judul_paper" class="form-control" required>
                </div>
            </div>

<!--            <div class="form-row">-->
<!--                <div class="form-group col-md-6 form-group-lg" hidden>-->
<!--                    <input type="text" class="form-control idpengarang" id="idpengarang" name="idpengarang[]" required>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group col-md-6 form-group-lg">-->
<!--                    <label class="text-black" for="penerbit">Pengarang</label>-->
<!--                    <input type="text" class="form-control pengarang" id="pengarang" name="pengarang[]" required>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group col-md-3">-->
<!--                    <label class="text-black" for="urutan">Urutan</label>-->
<!--                    <input type="text" class="form-control" name="urutan[]" id="urutan" value="1" readonly required>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group col-md-3">-->
<!--                    <label class="text-black" for="tambah_pengarang">Tambah Pengarang</label>-->
<!--                    <input type="button" class="btn btn-primary add-more" value="Tambah Pengarang"/>-->
<!--                </div>-->
<!--            </div>-->
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


            <!--field Halaman & Jurnal & simpan-->
            <!--            <div class="form-row">-->

            <div class="form-row">
                <div class="form-group col-md-12 form-group-lg">
                    <label class="text-black" for="Jurnal">Jurnal</label>
                    <select class="js-example-basic-single form-control" name="jurnal" data-placeholder="Pilih Jurnal">
                        <option value=""></option>
                        <?php
                        foreach ($jurnal as $row) {
                            echo "<option value='" . $row->id_jurnal . "'>" . $row->judul_jurnal . "</option>"; //yang disimpan id_jurnal tp yg tampil judul_jurnal
                        }
                        echo "
                            </select>"
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="text-black" for="halaman">Halaman</label>
                    <input type="text" name="halaman" class="form-control" required>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                </div>

            </div>
        </form>
    </div>
</section>
<!-- /.content -->