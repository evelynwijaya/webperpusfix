<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
         style="background-image: url('<?php echo base_url(); ?>assets/images/hero_1.jpg');"
         id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Pengembalian Buku</h1>
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
                        <label class="col-lg-12 ">Kode Buku</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku" required>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="col-lg-12 ">Judul Buku</label>
                        <div class="col-lg-12">
                            <input type="text" name="judul_buku" id="judul_buku" class="form-control" readonly>
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
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="form-group form-group-lg">
                                    <label class="col-lg-12 ">NIM Mahasiswa</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa"
                                               required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-lg-12 ">Nama Mahasiswa</label>
                                    <div class="col-lg-12">
                                        <input type="text" name="nama_mahasiswa" id="nama_mahasiswa"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Buku yang dipinjam</h4>
                    </div>
                    <div class="card-body">
                        <!-- buat tampil tabel tmp     -->
                        <div id="tampilbukupeminjaman"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>