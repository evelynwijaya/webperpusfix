<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');"
         id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Peminjaman Buku</h1>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class=" col-lg-12">
            <div class="row align-items-center mb-5 bg-light rounded border p-3">

                <div class="col-6">
                    <div class="form-group form-group-lg">
                        <label class="col-lg-12 ">NIM Mahasiswa</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" required>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="col-lg-12 ">Nama Mahasiswa</label>
                        <div class="col-lg-12">
                            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <!-- buat tampil tabel tmp     -->
                        <div id="tampil2"></div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row" id="insertbuku">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Buku</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <input type="text" name="kode" id="kode"
                                                   class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <button href="#" data-toggle="modal" id="btnCariBuku"
                                                    data-target="#myModal2" class="btn btn-primary"><span
                                                        class="icon-search"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" name="judul" id="judul" class="form-control"
                                           readonly>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input type="text" name="pengarang" id="pengarang" class="form-control"
                                           readonly>
                                    <input type="text" name="jumlah_buku" id="jumlah_buku" class="form-control" hidden
                                           readonly>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tambah Buku</label>
                                    <div>
                                        <button name="tambah_buku" id="tambah_buku"
                                                class="btn btn-primary">Tambah Buku</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- buat tampil tabel tmp     -->
                        <div id="tampil"></div>

                        <div>
                            <button class="btn btn-primary float-lg-right m-2" id="simpan">Simpan</button>
                            <button class="btn btn-danger float-lg-right m-2" id="batal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Modal Cari Buku -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Search Book</strong></h4>
            </div>
            <div class="modal-body"><br/>
                <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
                <input type="text" name="caribuku" id="caribuku" class="form-control"
                       placeholder="please search book code">

                <div id="tampilbuku">
                </div>

            </div>

            <br/><br/>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari Buku -->

