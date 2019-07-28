<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Penerbit_model');
        $this->load->model('Peminjaman_model');
    }

    public function index()
    {
        $this->Peminjaman_model->deleteAllTempBuku();
        $this->load->template('peminjaman');
    }

    public function get_mahasiswa()
    {
        if (isset($_GET['term'])) {
            $file = file_get_contents("https://siska.kharisma.ac.id/api/mhs/angkatan/2015/prodi/57201");
            $mahasiswa = json_decode($file);
            $listmahasiswa = $mahasiswa->list_mahasiswa;
            foreach ($listmahasiswa as $row) {
                $arr_result[] = array(
                    'nim' => $row->nim,
                    'nama' => $row->nama
                );
            }

            $arr_result2 = array();
            foreach ($arr_result as $row2) {
                if (strpos($row2['nim'], $_GET["term"]) !== false) {
                    $arr_result2[] = array(
                        'label' => $row2['nim'],
                        'description' => $row2['nama']
                    );
                }
            }
        }
        echo json_encode($arr_result2);
    }

    //simpan mahasiswa di database dari API Kharisma
    public function simpanMahasiswa()
    {
        $file = file_get_contents("https://siska.kharisma.ac.id/api/mhs/angkatan/2015/prodi/57201");
        $mahasiswa = json_decode($file);
        $listmahasiswa = $mahasiswa->list_mahasiswa;
        foreach ($listmahasiswa as $row) {
            $arr_result = array(
                'nim' => $row->nim,
                'nama' => $row->nama,
                'password' => md5("123456"),
                'status' => "User",
            );
            $this->Peminjaman_model->simpanMahasiswa($arr_result);
        }

        echo "berhasil simpan";
    }

    public function cari_buku()
    {
        $caribuku = $this->input->post('caribuku');
        $data['buku'] = $this->Buku_model->cari_buku($caribuku)->result();
        $databukuasli = array();
        foreach ($data['buku'] as $datum) {
            $databukuasli[] = array(
                'id_buku' => $datum->id_buku,
                'judul_buku' => $datum->judul_buku,
                'jumlah_buku' => $datum->eksemplar,
                'pengarang' => $this->pecahPengarang(substr($datum->id_buku, 0, 17))
            );
        }
        $data['databuku'] = $databukuasli;
        $this->load->view('peminjaman_search', $data);
    }

    public function cek_kode_buku()
    {
        $kodebuku = $this->input->post('kode_buku');
        $row = $this->Peminjaman_model->cek_kode_buku($kodebuku)->row_array();
        echo json_encode($row);
    }

    function pecahPengarang($idbuku)
    {
        $datapengarang = $this->Buku_model->daftarPengarangbybuku($idbuku)->result_array();

        foreach ($datapengarang as $u) {
            $datapengarangasli[] = $u['nama_belakang'] . ', ' . substr($u['nama_depan'], 0, 1) . '.';
        }

        $kalimat = implode(", ", $datapengarangasli);
        return $kalimat;
    }

    public function save_tmp()
    {
        $data = array(
            'status' => "2"
        );

        $kode_buku = $this->input->post('kode_buku');
        $judul_buku = $this->input->post('judul');
        $nim = $this->input->post('nim');

        $cek = $this->Peminjaman_model->cekJmhTemp();
        $getJumlahBukuPinjam = $this->Peminjaman_model->cekJmhBukuPinjam($nim);
        $cekJudul = $this->Peminjaman_model->cekJudulTemp($judul_buku);
        //cek apakah data masih kosong di tabel tmp

        $total = $getJumlahBukuPinjam->num_rows() + $cek->num_rows();
        if ($total < 3) {
            if ($cekJudul->num_rows() == 0) {
                if ($cek->num_rows() < 3) {
                    $this->Peminjaman_model->ubahStatusBuku($kode_buku, $data);
                    $data = array(
                        'id_buku' => $this->input->post('kode_buku'),
                        'judul_buku' => $this->input->post('judul'),
                        'pengarang' => $this->input->post('pengarang')
                    );
                    $this->Peminjaman_model->InsertTempPeminjaman($data);
                    echo "Buku berhasil diinsert";
                } else {
                    echo "Buku yang bisa dipinjam maksimal 3 buku.";
                }
            } else {
                echo "Buku yang anda pinjam sudah ada.";
            }
        } else {
            echo "Buku yang dipinjam sudah melebihi 3 buku.";
        }

    }

    public function tampil_temp_peminjaman()
    {
        $data['temp'] = $this->Peminjaman_model->getTempPeminjaman()->result();
        $data['jumlahTemp'] = $this->Peminjaman_model->jumlahTemp();
        $this->load->view('peminjaman_tampil_temp', $data);
    }

    public function tampil_buku_peminjaman($id_anggota = null)
    {
        $data['daftarBuku'] = $this->Peminjaman_model->getBukuPeminjaman($id_anggota)->result();
        $data['idanggota'] = $id_anggota;
        $this->load->view('peminjaman_tampil_buku', $data);
    }

    public function tampil_buku_pengembalian($id_anggota = null)
    {
        $data['buku'] = $this->Peminjaman_model->getBukuPengembalian($id_anggota)->result();
        $databukuasli = array();
        foreach ($data['buku'] as $datum) {
            $databukuasli[] = array(
                'id_buku' => $datum->id_buku,
                'judul_buku' => $datum->judul_buku,
                'tgl_pinjam' => $datum->tgl_pinjam,
                'batas_kembali' => $datum->batas_kembali,
                'id_peminjaman' => $datum->id_peminjaman,
                'id_anggota' => $datum->id_anggota,
                'jmh_request' => $this->Buku_model->getJmhRequestBuku(substr($datum->id_buku, 0, 17)),
                'pengarang' => $this->pecahPengarang(substr($datum->id_buku, 0, 17))
            );
        }
        $data['daftarBuku'] = $databukuasli;
        $this->load->view('pengembalian_tampil_buku', $data);
    }

    public function hapus_temp_buku()
    {
        $kode_buku = $this->input->post('kode_buku');
        $data = array(
            'status' => "1"
        );
        $this->Peminjaman_model->ubahStatusBuku($kode_buku, $data);
        $this->Peminjaman_model->deleteTempBuku($kode_buku);
    }

    public function batal_peminjaman()
    {
        $table_temp = $this->Peminjaman_model->getTempPeminjaman()->result();
        foreach ($table_temp as $data) {

            $id = $data->id_buku;

            $data = array(
                'status' => "1"
            );

            $this->Peminjaman_model->ubahStatusBuku($id, $data);
        }
        $this->Peminjaman_model->deleteAllTempBuku();
    }

    public function simpan_transaksi()
    {
        $id_admin = $this->session->userdata['id'];
        //ambil data temp lakukan looping . setelah looping lakukan insert ke table peminjaman detail
        $table_temp = $this->Peminjaman_model->getTempPeminjaman()->result();
        $id_peminjaman = date('U');
        $nim = $this->input->post('nim');
        $tgl_pinjam = date('Y-m-d');
        $tgl_kembali = date('Y-m-d', strtotime('+3 day', strtotime($tgl_pinjam)));
        $jumlah = $this->input->post('jumlah_tmp');

        $data2 = array(
            'id_peminjaman' => $id_peminjaman,
            'id_anggota' => $nim,
            'id_admin' => $id_admin,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
            'status_peminjaman' => "Y",
            'jumlah' => $jumlah
        );

        foreach ($table_temp as $data) {

            $data = array(
                'id_peminjaman' => $id_peminjaman,
                'id_buku' => $data->id_buku,
                'batas_kembali' => $tgl_kembali,
                'status_kembali' => "Y"
            );

            //insert data ke table transaksi
            $this->Peminjaman_model->InsertPeminjamanDetail($data);
        }

        $this->Peminjaman_model->InsertPeminjaman($data2);
    }

    function riwayatpeminjaman()
    {
        $this->load->template('riwayat_peminjaman');
    }

    function tampil_daftar_peminjaman()
    {
        $data['daftarpeminjaman'] = $this->Peminjaman_model->daftarPeminjamanAll()->result();
        $this->load->template('daftar_peminjaman', $data);
    }

    function detail_peminjaman($id_peminjaman)
    {
        $data['daftarbukupinjaman'] = $this->Peminjaman_model->daftarbukuPeminjamanbyID($id_peminjaman)->result();
        $databukuasli = array();
        foreach ($data['daftarbukupinjaman'] as $datum) {
            $databukuasli[] = array(
                'id_buku' => $datum->id_buku,
                'judul_buku' => $datum->judul_buku,
                'pengarang' => $this->pecahPengarang($datum->id_buku)
            );
        }
        $data['databuku'] = $databukuasli;
        $data['detailpeminjaman'] = $this->Peminjaman_model->detailPeminjamanbyID($id_peminjaman);
        $this->load->template('detail_peminjaman', $data);
    }

    function kembalikanbuku()
    {
        $id_buku = $this->input->post('id_buku');
        $id_peminjaman = $this->input->post('id_peminjaman');

        $jmhrequest = $this->Buku_model->getJmhRequestBuku(substr($id_buku, 0, 17));

        $request = $this->Buku_model->getLastRequestBuku(substr($id_buku, 0, 17))->row();

        $where = array(
            'id_buku' => substr($id_buku,0,17),
            'id_anggota' => $request->id_anggota
        );

        if($jmhrequest > 0){

            $wheredatabuku = array(
                'status' => "3",
            );

            $this->Buku_model->updateRequestBuku($where, $wheredatabuku);
        }

        $whereid = array(
            'id_peminjaman' => $id_peminjaman,
            'id_buku' => $id_buku
        );

        $dataPeminjaman = array(
            'status_kembali' => "N"
        );

        $dataBuku = array(
            'status' => "1"
        );

        $datapengembalian = array(
            'status_peminjaman' => "N",
            'jumlah' => 0
        );

        $jmh = $this->Peminjaman_model->daftarbukuPeminjamanbyID($id_peminjaman)->num_rows();
        if ($jmh == 1) {
            $this->Peminjaman_model->ubahStatusBuku($id_buku, $dataBuku);
            $this->Peminjaman_model->ubahStatusPeminjamanDetail($whereid, $dataPeminjaman);
            $this->Peminjaman_model->KurangSemuaJumlahStokBuku($id_peminjaman, $datapengembalian);

            echo "Semua Buku berhasil di kembalikan";
        } else {
            $this->Peminjaman_model->ubahStatusBuku($id_buku, $dataBuku);
            $this->Peminjaman_model->ubahStatusPeminjamanDetail($whereid, $dataPeminjaman);
            $this->Peminjaman_model->KurangJumlahStokBuku($id_peminjaman);

            echo "Buku berhasil di kembalikan";
        }
    }

    function perpanjangbuku()
    {
        $id_buku = $this->input->post('id_buku');
        $id_peminjaman = $this->input->post('id_peminjaman');
        $batas_kembali = $this->input->post('batas_kembali');

        $whereid = array(
            'id_peminjaman' => $id_peminjaman,
            'id_buku' => $id_buku
        );

        $dataPeminjaman = array(
            'batas_kembali' => date('Y-m-d', strtotime('+3 day', strtotime($batas_kembali)))
        );

        $this->Peminjaman_model->ubahStatusPeminjamanDetail($whereid, $dataPeminjaman);

        echo "Perpanjangan Waktu berhasil di tambahkan";

    }

    function kembaliSemuaBuku($id_peminjaman, $telat)
    {

        $data['daftarbukupinjaman'] = $this->Peminjaman_model->daftarbukuPeminjamanbyID($id_peminjaman)->result();
        foreach ($data['daftarbukupinjaman'] as $datum) {
            $where = array(
                'id_buku' => $datum->id_buku,
                'id_peminjaman' => $id_peminjaman
            );

            $data = array(
                'id_buku' => $datum->id_buku,
                'id_peminjaman' => $id_peminjaman,
                'tgl_kembali' => date('Y-m-d')
            );

            $this->Peminjaman_model->TambahJumlahStokBuku($datum->id_buku);
            $this->Peminjaman_model->HapusSatuBukuPinjam($where);
            $this->Peminjaman_model->TambahSatuBukuKembali($data);
        }

        $dataKembali = array(
            'id_peminjaman' => $id_peminjaman,
            'tgl_kembali' => date('Y-m-d'),
            'telat' => $telat,
            'jmh_kembali' => count($data['daftarbukupinjaman']),
            'sisa' => 0,
            'status' => "Y"
        );

        $result = $this->Peminjaman_model->InsertPengembalian($dataKembali);

        $whereid = array(
            'id_peminjaman' => $id_peminjaman
        );

        $dataStatus = array(
            'status_peminjaman' => "Y"
        );

        $this->Peminjaman_model->UpdateStatusBukuPinjam($whereid, $dataStatus);


        if ($result) {
            redirect(base_url("DaftarPeminjaman"));
        }
    }

    function pengembalian()
    {
        $this->load->template('pengembalian');
    }

    public function lihatRiwayatPeminjaman()
    {
        $year = date("Y");
        $data['tahun'] = $year;
        $data['januari'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-01");
        $data['februari'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-02");
        $data['maret'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-03");
        $data['april'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-04");
        $data['mei'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-05");
        $data['juni'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-06");
        $data['juli'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-07");
        $data['agustus'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-08");
        $data['september'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-09");
        $data['oktober'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-10");
        $data['november'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-11");
        $data['desember'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-12");
        $this->load->template('riwayat_peminjaman', $data);
    }

    function tampil_riwayat_peminjaman()
    {
        $year = trim($this->input->post('tahun'));
        $data['tahun'] = $year;
        $data['januari'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-01");
        $data['februari'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-02");
        $data['maret'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-03");
        $data['april'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-04");
        $data['mei'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-05");
        $data['juni'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-06");
        $data['juli'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-07");
        $data['agustus'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-08");
        $data['september'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-09");
        $data['oktober'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-10");
        $data['november'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-11");
        $data['desember'] = $this->Peminjaman_model->jmhPengunjungperbulan($year."-12");
        $this->load->template('riwayat_peminjaman', $data);

    }
    
    function bebas_pustaka(){
        $this->load->view('bebas_pustaka');
    }
}