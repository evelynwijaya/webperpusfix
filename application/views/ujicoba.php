<!-- HOME -->
<section class="home-section section-hero inner-page overlay bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">Uji Coba</h1>
                    <p>Silahkan tambahakan Skripsi Baru untuk keperluan perpustakaan.
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
        <!-- Tambah Skripsi -->

        <form action="<?php echo base_url(); ?>Paper/tambah_paper" method="post" class="tambah">

            <div class="form-row after-add-more ujicoba">

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="penerbit">Pengarang</label>
                    <select class="selectRow form-control" name="pengarang[]"
                            data-placeholder="Pilih Pengarang">
                        <option value=""></option>
                        <option value="IN">Indonesia</option>
                        <option value="ER">Eropa</option>
                        <option value="CH">China</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label class="text-black" for="urutan">Urutan</label>
                    <input type="text" class="form-control" name="urutan[]" required>
                </div>

                <div class="form-group col-md-3">
                    <label class="text-black" for="urutan">Tambah Pengarang</label>
                    <button type="button" class="btn btn-primary add-more">Tambah Pengarang</button>
                </div>
            </div>

            <div class="ujicoba2">
            <div class="form-row after-add-more">

                <div class="form-group col-md-6 form-group-lg">
                    <label class="text-black" for="penerbit">Pengarang</label>
                    <select class="selectRow form-control" name="pengarang[]"
                            data-placeholder="Pilih Pengarang">
                        <option value=""></option>
                        <option value="IN">Indonesia</option>
                        <option value="ER">Eropa</option>
                        <option value="CH">China</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label class="text-black" for="urutan">Urutan</label>
                    <input type="text" class="form-control" name="urutan[]" required>
                </div>

                <div class="form-group col-md-3">
                    <label class="text-black" for="urutan">Tambah Pengarang</label>
                    <button type="button" class="btn btn-primary add-more">Tambah Pengarang</button>
                </div>
            </div>
            </div>

            <!--            <div class="ujicoba">-->
            <!--                <div class="form-row">-->
            <!--                    <div class="form-group col-md-12">-->
            <!--                        <select class="selectRow form-control col-md-6" data-placeholder="Pilih Pengarang">-->
            <!--                            <option value=""></option>-->
            <!--                            <option value="IN">Indonesia</option>-->
            <!--                            <option value="ER">Eropa</option>-->
            <!--                            <option value="CH">China</option>-->
            <!--                        </select>-->
            <!--                    </div>-->
            <!--                    <div class="form-group col-md-12">-->
            <!--                        <button class="btn btn-danger add-more col-md-3">-</button>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

        </form>

        <div class="form-row">

            <!--                <div class="aaa">-->
            <!--                    <select name="add_section" class="selectRow form-control"  data-placeholder="Pilih Pengarang">-->
            <!--                        <option value=""></option>-->
            <!--                        <option value="IN">Indonesia</option>-->
            <!--                        <option value="ER">Eropa</option>-->
            <!--                        <option value="CH">China</option>-->
            <!--                    </select>-->
            <!--                    <button name="add_class" class="add_class">+</button>-->
            <!--                </div>-->

            <!--            <button class="btn btn-primary add-more">Tambah Pengarang</button>-->
            <!--            <div class="ujicoba">-->
            <!--                <div class="form-group col-md-6 salinan">-->
            <!--                    <select class="selectRow form-control col-md-6" data-placeholder="Pilih Pengarang">-->
            <!--                        <option value=""></option>-->
            <!--                        <option value="IN">Indonesia</option>-->
            <!--                        <option value="ER">Eropa</option>-->
            <!--                        <option value="CH">China</option>-->
            <!--                    </select>-->
            <!--                </div>-->
            <!--                <div class="form-group">-->
            <!--                    <button class="btn btn-danger add-more col-md-3">-</button>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</section>
<!-- /.content -->