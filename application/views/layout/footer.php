<footer class="site-footer">
    <div class="container">
        
        <div class="row text-center">
            <div class="col-12">
                <p class="text-light">
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    E-Library STMIK KHARISMA Makassar | This website is made with <i
                            class="icon-heart" aria-hidden="true"></i> by <a href="https://www.kharisma.ac.id/"
                                                                             class="text-primary"
                                                                             target="_blank">STMIK KHARISMA Makassar</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!--Modal Tambah Pengarang-->
<div class="modal fade" id="pengarangModal" tabindex="-1" role="dialog" aria-labelledby="PengarangModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengarang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <div class="form-group">
                    <label class="text-black" for="nama_depan">Nama Depan</label>
                    <input type="text" name="page" class="form-control" value="buku" hidden>
                    <input type="text" id="nama_depan" name="nama_depan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="text-black" for="nama_belakang">Nama Belakang</label>
                    <input type="text" id="nama_belakang" name="nama_belakang" class="form-control">
                </div>

                <div class="form-group">
                    <label class="text-black" for="institusi">Institusi</label>
                    <input type="text" id="institusi" name="institusi" class="form-control">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary btn-lg btn-block" value="Simpan" id="tambah_pengarang">
                </div>

            </div>
        </div>
    </div>
</div>
<!--End Modal Pengarang-->

<!--Modal Tambah Penerbit-->
<div class="modal fade" id="penerbitModal" tabindex="-1" role="dialog" aria-labelledby="PenerbitModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penerbit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <div class="form-group">
                    <label class="text-black" for="nama_penerbit">Nama Penerbit</label>
                    <input type="text" name="page" class="form-control" value="buku" hidden>
                    <input type="text" id="nama_penerbit" name="nama_penerbit" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="text-black" for="tempat_penerbit">Tempat Penerbit</label>
                    <input type="text" id="tempat_penerbit" name="tempat_penerbit" class="form-control">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary btn-lg btn-block" value="Simpan" id="tambah_penerbit">
                </div>

            </div>
        </div>
    </div>
</div>
<!--End Modal Tambah Penerbit-->

<!--Modal Show Notification-->
<div class="modal fade" id="notifikasiModal" tabindex="-1" role="dialog" aria-labelledby="PengarangModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Info Request Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                Hai <strong><?php echo $this->session->userdata('nama_user') ?></strong><p id="judul_buku_request"></p>
                <!-- buat tampil tabel tmp     -->
                <div id="tampilRequest"></div>

            </div>
        </div>
    </div>
</div>
<!--End Notification-->

</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stickyfill.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.full.min.js"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>-->


<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/js/Chart.js/Chart.js"></script>

<!-- Responsive extension -->
<!--<script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>-->
<!-- Buttons extension -->
<!--<script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.18/js/dataTables.jqueryui.min.js"></script>-->

<script>
    $(document).ready(function () {
        $('#example1').DataTable();
        var table2 = $('#tabel_laporan_buku').DataTable({
            dom: 'Bfrtip',
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '/' + mm + '/' + dd;

        //var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        // $('#startDate').val(today);
        // $('#endDate').val(today);
        // $('#startDate').datepicker({
        //     uiLibrary: 'bootstrap4',
        //     todayBtn: true,
        //     format: 'yyyy-mm'
        // });
        // $('#endDate').datepicker({
        //     uiLibrary: 'bootstrap4',
        //     todayBtn: true,
        //     format: 'yyyy-mm'
        // });

        $("#startDate").datepicker({
            minViewMode: 1,
            format: 'yyyy-mm'
        }).on('changeDate', function (ev) {
            $("#endDate").datepicker("option", "minDate", ev.date.setMonth(ev.date.getMonth() + 1));
        });

        $("#endDate").datepicker({
            minViewMode: 1,
            format: 'yyyy-mm'
        }).on('changeDate', function (ev) {
            $("#endDate").datepicker("option", "minDate", ev.date.setMonth(ev.date.getMonth() + 1));
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>

<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
    $('.js-example-basic-single').select2({
        placeholder: 'Pilih Penerbit'
    });

    $('.select-jurnal').select2({
        placeholder: 'Pilih Penerbit'
    });

    $(document).ready(function () {

        if(<?php echo "'".$this->uri->segment(1)."'" ?> == ""){
            if(<?php echo "'".$this->session->userdata('status')."'"?> == "login"){
                 $.post("<?php echo site_url('Buku/cari_request');?>", {id_anggota: '<?php echo $this->session->userdata('id')?>'}, function(result){
              if (result != null){
                        var data = JSON.parse(result);
                        $("#judul_buku_request").html("Buku "+'<b>'+data.judul_buku+'</b>'+" tersedia di perpustakaan, silahkan lakukan peminjaman paling lambat tanggal "+data.tgl_ready);
                        loadDataBukuRequest(<?php echo $this->session->userdata('id')?>);
                        $('#notifikasiModal').modal('show');
                    }
                });
            }
        }

        var total = eval($("#januari").val()) + eval($("#februari").val()) + eval($("#maret").val()) + eval($("#april").val()) + eval($("#mei").val()) +
            eval($("#juni").val()) + eval($("#juli").val()) + eval($("#agustus").val()) + eval($("#september").val()) + eval($("#oktober").val()) +  eval($("#november").val())
            eval($("#desember").val());

        $("#jmhtotalpeminjam").text("  "+total + " Peminjaman");

        $(".pengarang").autocomplete({
            source: "<?php echo site_url('Paper/get_pengarang');?>",

            select: function (event, ui) {
                $('#idpengarang').val(ui.item.description);
            }
        });

        $("#nim_mahasiswa").autocomplete({
            source: "<?php echo site_url('Peminjaman/get_mahasiswa');?>",

            select: function (event, ui) {
                $('#nama_mahasiswa').val(ui.item.description);
                loadDataBukuPinjam(ui.item.label);
            }
        });

        var kategori = $('#kategori').val();

        $("#cari_semua_data").autocomplete({
            source: "<?php echo site_url('Pencarian/cari_semua/');?>" + kategori + '/',

            select: function (event, ui) {
                $('#id_data').val(ui.item.description);
                $("#form_search").submit();
            }
        });

        $('#tgl_terbit').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy/mm/dd',
            todayBtn: true,
            todayHighlight: true
        });

        var d = new Date();
        var year = d.getFullYear();

        $("#laporan_tahun_terbit").datepicker({
            format: " yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            startDate: "1500",
            endDate: '"' + year + '"'
        });

        var value = "";
        var valuepenerbit = $('#id_penerbit').val();
        var value = $('#id_jurnal').val();

        $('.js-example-basic-single').val(value);
        $('.js-example-basic-single').select2().trigger('change');
        $('.select-jurnal').val(valuepenerbit);
        $('.select-jurnal').select2().trigger('change');

        if ($("#no_image").is(":checked") === true) {
            var x = document.getElementById("uploadPreview");
            var y = document.getElementById("uploadImage");
            x.style.display = "none";
            y.style.display = "none";
        }

    });

    function hidedatabuku(){
        var jmhPinjam = $('#jmhPinjam').val();
        if(jmhPinjam == 3){
            document.getElementById("insertbuku").style.display = "none";
        }else{
            document.getElementById("insertbuku").style.display = "block";
        }
    }

    function load_penerbit() {
        $.post("<?php echo site_url('Penerbit/daftarPenerbit');?>", function (data) {
            for (var i = 0; i <= data.length; i++) {
                $(".penerbit option[value='" + data[i].id_penerbit + "']").remove();
                $('.penerbit').append('<option value="' + data[i].id_penerbit + '">' + data[i].nama_penerbit + '</option>');
            }
        }, "json");
        // $('.penerbit').empty();
    }

    load_penerbit();
    loadDataBukuPinjam(null);

    //ambil value kategori di index
    function valueKategori() {
        var kategori = $('#kategori').val();
        $("#cari_semua_data").autocomplete({
            source: "<?php echo site_url('Pencarian/cari_semua/');?>" + kategori + '/',

            select: function (event, ui) {
                $('#id_data').val(ui.item.description);
                $("#form_search").submit();
            }
        });
    }

    function run() {
        var x = document.getElementById("uploadPreview");
        var y = document.getElementById("uploadImage");
        if (x.style.display === "none" && y.style.display === "none") {
            x.style.display = "block";
            y.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "none";
        }
    }

    //search buku
    $("#caribuku").keyup(function () {
        var caribuku = $('#caribuku').val();

        $.ajax({
            url: "<?php echo site_url('Peminjaman/cari_buku');?>",
            type: "POST",
            data: "caribuku=" + caribuku,
            cache: false,
            success: function (hasil) {
                $("#tampilbuku").html(hasil);

            }
        })
    });

    //search kode buku
    $("#kode_buku").keyup(function (e) {

        var code = e.which;
        if (code == 13) {
            var kode_buku = $('#kode_buku').val();

            $.ajax({
                url: "<?php echo site_url('Peminjaman/cek_kode_buku');?>",
                type: "POST",
                data: "kode_buku=" + kode_buku,
                cache: false,
                success: function (hasil) {
                    if (hasil == "null") {
                        alert("Kode Buku tidak ditemukan");
                        $('#nim_mahasiswa').val("");
                        $('#nama_mahasiswa').val("");
                        $('#judul_buku').val("");
                        loadDataBukuPengembalian();
                    } else {
                        var data = JSON.parse(hasil);
                        $('#nim_mahasiswa').val(data.id_anggota);
                        $('#nama_mahasiswa').val(data.nama);
                        $('#judul_buku').val(data.judul_buku);
                        loadDataBukuPengembalian(data.id_anggota);
                    }
                }
            })
        } else if (code == 8) {
            $('#nim_mahasiswa').val("");
            $('#nama_mahasiswa').val("");
            $('#judul_buku').val("");
            loadDataBukuPengembalian();
        }
    });

    $('body').on('click', '.tambah', function () {

        var kode_buku = $(this).attr("kode");
        var judul = $(this).attr("judul");
        var pengarang = $(this).attr("pengarang");
        var jumlah_buku = $(this).attr("jumlah_buku");

        $("#kode").val(kode_buku);
        $("#judul").val(judul);
        $("#pengarang").val(pengarang);
        $("#jumlah_buku").val(jumlah_buku);

        $("#myModal2").modal("hide");
        //console.log(kode_buku);

    });

    //load data tmp
    function loadData() {
        $("#tampil").load("<?php echo site_url('Peminjaman/tampil_temp_peminjaman') ?>");
    }

    //load daftar buku yang dipinjam
    function loadDataBukuPinjam(anggota) {
        $("#tampil2").load("<?php echo site_url('Peminjaman/tampil_buku_peminjaman/') ?>" + anggota, function() {
            hidedatabuku();
        });
    }

    //load daftar buku yang direquest
    function loadDataBukuRequest(id_anggota) {
        $("#tampilRequest").load("<?php echo site_url('Buku/daftar_request_buku/')?>"+id_anggota);
    }

    //load daftar buku yang dipinjam bagian pengembalian
    function loadDataBukuPengembalian(anggota) {
        $("#tampilbukupeminjaman").load("<?php echo site_url('Peminjaman/tampil_buku_pengembalian/') ?>" + anggota);
    }

    loadData();
    loadDataBukuPengembalian();


    //function buat mengkosong form data buku setelah di tambah ke tmp
    function EmptyData() {
        $("#kode").val("");
        $("#judul").val("");
        $("#pengarang").val("");
    }

    //tambah_buku ke tabel temporary
    $("#tambah_buku").click(function () {
        var jmhPinjam = $('#jmhPinjam').val();
        if (jmhPinjam != 3) {
            var kode_buku = $("#kode").val();
            var judul = $("#judul").val();
            var pengarang = $("#pengarang").val();
            var jumlah_buku = $("#jumlah_buku").val();
            var nim = $("#nim_mahasiswa").val();

            if (kode_buku == "") {
                alert("Kode Masih Kosong ");
                $("#kode").focus();
                return false;
            } else if (judul == "") {
                alert("Judul Masih Kosong ");
                return false;
            } else if (nim == "") {
                alert("nim Masih Kosong ");
                $("#nim_mahasiswa").focus();
                return false;
            } else {
                $.ajax({
                    url: "<?php echo site_url('Peminjaman/save_tmp');?>",
                    type: "POST",
                    data: "kode_buku=" + kode_buku + "&judul=" + judul + "&pengarang=" + pengarang + "&jumlah_buku=" + jumlah_buku + "&nim=" + nim,
                    cache: false,
                    success: function (hasil) {
                        loadData();
                        EmptyData();
                        alert(hasil);
                    }
                })
            }
        } else {
            alert("Buku hanya bisa dipinjam sebanyak 3 buku")
        }

    }) //end tambahbuku

    // tambah_pengarang
    $("#tambah_pengarang").click(function () {

        var nama_depan = $("#nama_depan").val();
        var nama_belakang = $("#nama_belakang").val();
        var institusi = $("#institusi").val();

        if (nama_depan == "") {
            alert("Nama Depan Masih Kosong ");
            $("#nama_depan").focus();
            return false;
        } else {
            $.ajax({
                url: "<?php echo site_url('Pengarang/tambah_pengarang2');?>",
                type: "POST",
                data: "nama_depan=" + nama_depan + "&nama_belakang=" + nama_belakang + "&institusi=" + institusi,
                cache: false,
                success: function (hasil) {
                    alert(hasil);
                    $('#pengarangModal').modal('hide');
                    $("#nama_depan").val("");
                    $("#nama_belakang").val("");
                    $("#institusi").val("");
                }
            })
        }

    }) //end tambahbuku

    // tambah_penerbit
    $("#tambah_penerbit").click(function () {

        var nama_penerbit = $("#nama_penerbit").val();
        var tempat_penerbit = $("#tempat_penerbit").val();

        if (nama_penerbit == "") {
            alert("Nama Penerbit Masih Kosong ");
            $("#nama_penerbit").focus();
            return false;
        } else {
            $.ajax({
                url: "<?php echo site_url('Penerbit/tambah_penerbit2');?>",
                type: "POST",
                data: "nama_penerbit=" + nama_penerbit + "&tempat_penerbit=" + tempat_penerbit,
                cache: false,
                success: function (hasil) {
                    alert(hasil);
                    $('#penerbitModal').modal('hide');
                    $("#nama_penerbit").val("");
                    $("#tempat_penerbit").val("");
                    load_penerbit();
                }
            })
        }

    }) //end tambahbuku

    // //delete tabel tmp
    $('body').on('click', '.hapus', function () {

        //ambil dulu atribute kodenya
        var kode_buku = $(this).attr('kode');
        $.ajax({
            url: "<?php echo site_url('Peminjaman/hapus_temp_buku');?>",
            type: "POST",
            data: "kode_buku=" + kode_buku,
            cache: false,
            success: function (hasil) {
                loadData();
            }
        })
    }); //end delete table tmp

    // kembalikan buku
    $('body').on('click', '#kembalikan_buku', function () {

        //ambil dulu atribute kodenya
        var kode_buku = $(this).attr('kode');
        var id_peminjaman = $(this).attr('id_peminjaman');
        var id_anggota = $(this).attr('id_anggota');
        $.ajax({
            url: "<?php echo site_url('Peminjaman/kembalikanbuku');?>",
            type: "POST",
            data: "id_buku=" + kode_buku + "&id_peminjaman=" + id_peminjaman,
            cache: false,
            success: function (hasil) {
                alert(hasil);
                loadDataBukuPengembalian(id_anggota);
                loadDataBukuPinjam(id_anggota);
            }
        })
    }); //kembalikan buku

    // perpanjang buku
    $('body').on('click', '#perpanjang_buku', function () {

        //ambil dulu atribute kodenya
        var kode_buku = $(this).attr('kode');
        var id_peminjaman = $(this).attr('id_peminjaman');
        var id_anggota = $(this).attr('id_anggota');
        var batas_kembali = $(this).attr('batas_kembali');
        $.ajax({
            url: "<?php echo site_url('Peminjaman/perpanjangbuku');?>",
            type: "POST",
            data: "id_buku=" + kode_buku + "&id_peminjaman=" + id_peminjaman + "&batas_kembali=" + batas_kembali,
            cache: false,
            success: function (hasil) {
                alert(hasil);
                loadDataBukuPengembalian(id_anggota);
            }
        })
    }); //kembalikan buku

    //simpan transaksi
    $('body').on('click', '#simpan', function () {

        //tampung data dari form buat dikirim
        var no_transaksi = $("#no_transaksi").val();
        var tgl_pinjam = $("#tgl_pinjam").val();
        var tgl_kembali = $("#tgl_kembali").val();
        var nim = $("#nim_mahasiswa").val();

        var jumlah_tmp = parseInt($("#jumlahTmp").val(), 10);

        //cek nim jika kosong
        if (nim == "") {
            alert("Pilih NIM Mahasiswa terlebih dahulu");
            $("#nim_mahasiswa").focus();
            return false;
        } else if (jumlah_tmp == 0) {
            alert("Pilih Buku yang ingin di pinjam");
            return false;
        } else {
            $.ajax({
                url: "<?php echo site_url('Peminjaman/simpan_transaksi');?>",
                type: "POST",
                data: "no_peminjaman=" + no_transaksi + "&tgl_pinjam=" + tgl_pinjam + "&tgl_kembali=" + tgl_kembali +
                    "&nim=" + nim + "&jumlah_tmp=" + jumlah_tmp,
                cache: false,
                success: function (hasil) {

                    alert("Transaksi Peminjaman Berhasil");

                    location.reload();
                }
            })
        }

    });

    //batal transaksi
    $('body').on('click', '#batal', function () {

        $.ajax({
            url: "<?php echo site_url('Peminjaman/batal_peminjaman');?>",
            cache: false,
            success: function (hasil) {
                alert("Batal Transaksi Peminjaman");
                EmptyData();
                $("#nim_mahasiswa").val("");
                $("#nama_mahasiswa").val("");
                $("#nim_mahasiswa").focus();
                loadData();
                loadDataBukuPinjam();
            }
        })

    });

    $(document).ready(function () {

        var template2 = $('.ujicoba').clone(true);
        //$('.selectRow').select2();
        var i = 1;
        $(".add-more").click(function () {
            i++;
            //var html = $(".copy").html();
            var html = '<div class="form-row">\n' +
                '                        <div class="form-group col-md-6 form-group-lg" hidden>\n' +
                '                            <input type="text" class="form-control idpengarang" id="idpengarang' + i + '" name="idpengarang[]"\n' +
                '                                   required>\n' +
                '                        </div>\n' +
                '\n' +
                '                        <div class="form-group col-md-6">\n' +
                '                            <input type="text" class="form-control pengarang" name="pengarang[]" required>\n' +
                '                        </div>\n' +
                '\n' +
                '                        <div class="form-group col-md-3">\n' +
                '                            <input type="text" class="form-control" name="urutan[]" required>\n' +
                '                        </div>\n' +
                '\n' +
                '                        <div class="form-group col-md-3">\n' +
                '                            <button type="button" class="btn btn-danger remove"><i class="mr-2 icon-close"></i>\n' +
                '                                Remove\n' +
                '                            </button>\n' +
                '                        </div>\n' +
                '                    </div>';
            $(".divpengarang").append(html);

            var idpengarang = "#idpengarang" + i;

            $(".pengarang").autocomplete({
                source: "<?php echo site_url('paper/get_pengarang/?');?>",

                select: function (event, ui) {
                    $(idpengarang).val(ui.item.description);
                }
            });
            //$('.selectRow').select2();


            // if ($(this).text().indexOf('-') > -1) {
            //     $(this).parent().remove();
            //     return;
            // }
            //
            // var new_comm = template2.clone(true).insertAfter($(this).parent());
            // new_comm.find('.selectRow').select2();
            //new_comm.find('.add_class').text('-');

            // var html = $(".form-add-more").clone();
            // console.log(html)
            // var new_comm = $(".ujicoba").append(html);
            //
            // if ($(new_comm).find('.form-add-more').length > 2) {
            //     console.info('There are more than one.');
            //     $(new_comm).find('.form-add-more').slice(1).remove();
            // }
            //
            // $('.js-example-basic-single').select2({
            //     placeholder: 'Pilih Penerbit'
            // });
            //
            // $('.js-example-basic-single').last().next().remove();
        });

        var template = $('.aaa').clone(true);
        $('.selectRow').select2();
        $('.add_class').click(function () {
            if ($(this).text().indexOf('-') > -1) {
                $(this).parent().remove();
                return;
            }
            var new_comm = template.clone(true).insertAfter($(this).parent());
            new_comm.find('.selectRow').select2();
            new_comm.find('.add_class').text('-');


        });


        $("body").on("click", ".remove", function () {
            $(this).parents(".form-row").remove();
        });


        if(<?php echo "'".$this->uri->segment(1)."'" ?> == "RiwayatPeminjaman")
    {
        var barChartData = {
            labels: ['Januari', 'Febuari', 'Maret', 'april', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [
                {
                    label: 'Jumlah Peminjam',
                    fillColor: 'rgba(0, 0, 255, 0.7)',
                    strokeColor: 'rgba(0, 0, 255, 0.7)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [$("#januari").val(),
                        $("#februari").val(),
                        $("#maret").val(),
                        $("#april").val(),
                        $("#mei").val(),
                        $("#juni").val(),
                        $("#juli").val(),
                        $("#agustus").val(),
                        $("#september").val(),
                        $("#oktober").val(),
                        $("#november").val(),
                        $("#desember").val()]
                }
            ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChart = new Chart(barChartCanvas)
        var barChartData = barChartData
        //barChartData.datasets[1].fillColor   = '#00a65a'
        //barChartData.datasets[1].strokeColor = '#00a65a'
        //barChartData.datasets[1].pointColor  = '#00a65a'
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        }

        barChartOptions.datasetFill = false
       barChart.Bar(barChartData, barChartOptions)

        }
    });
</script>

<script>
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>

</body>

</html>
