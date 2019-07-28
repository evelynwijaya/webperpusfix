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

        <form action="<?php echo base_url(); ?>Paper/edit_paper" method="post" enctype="multipart/form-data">

            <div class="form-row after-add-more">
                <div class="form-group col-md-12">
                    <label class="text-black" for="judul_paper">Judul Paper</label>
                    <input type="text" name="judul_paper" class="form-control"
                           value="<?php echo $dataPaper['judul_paper'] ?>" required>
                    <input type="text" name="id_paper" class="form-control" hidden
                           value="<?php echo $dataPaper['id_paper'] ?>" required>
                    <input type="text" name="id_jurnal" class="form-control" hidden
                           value="<?php echo $dataPaper['id_jurnal'] ?>" required>
                </div>
            </div>

            <?php
            foreach ($dataPengarang as $u) {
                if ($u->urutan == 1) {
                    ?>
                    <div class="form-row">
                        <div class="form-group col-md-6 form-group-lg" hidden>
                            <input type="text" class="form-control idpengarang" id="idpengarang" name="idpengarang[]"
                                   value="<?php echo $u->id_pengarang ?>" required>
                        </div>

                        <div class="form-group col-md-6 form-group-lg">
                            <label class="text-black" for="penerbit">Pengarang</label>
                            <input type="text" class="form-control pengarang" id="pengarang" name="pengarang[]"
                                   value="<?php echo $u->nama_pengarang ?>" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="text-black" for="urutan">Urutan</label>
                            <input type="text" class="form-control" name="urutan[]" id="urutan"
                                   value="<?php echo $u->urutan ?>" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="text-black" for="tambah_pengarang">Tambah Pengarang</label>
                            <input type="button" class="btn btn-primary add-more" value="Tambah Pengarang"/>
                        </div>
                    </div>
                    <?php
                } elseif ($u->urutan != 1) {
                    ?>
                    <div class="form-row">
                        <div class="form-group col-md-6 form-group-lg" hidden>
                            <input type="text" class="form-control idpengarang" id="idpengarang' + i + '"
                                   name="idpengarang[]" value="<?php echo $u->id_pengarang ?>"
                                   required>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control pengarang" name="pengarang[]"
                                   value="<?php echo $u->nama_pengarang ?>" required>
                        </div>

                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="urutan[]" value="<?php echo $u->urutan ?>"
                                   required>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-danger remove"><i class="mr-2 icon-close"></i>
                                Remove
                            </button>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <div class="divpengarang">

            </div>


            <!--field Halaman & Jurnal & simpan-->
            <!--            <div class="form-row">-->

            <div class="form-row">
                <div class="form-group col-md-12 form-group-lg">
                    <label class="text-black" for="Jurnal">Jurnal</label>
                    <select class="js-example-basic-single form-control" name="jurnal" data-placeholder="Pilih Jurnal"
                            value="<?php echo $dataPaper['id_jurnal'] ?>">
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
                    <input type="text" name="halaman" class="form-control" value="<?php echo $dataPaper['halaman'] ?>"
                           required>
                    <input type="text" id="id_jurnal" class="form-control" value="<?php echo $dataPaper['id_jurnal'] ?>" hidden
                           required>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                </div>

            </div>
        </form>
    </div>
</section>
<!-- /.content -->