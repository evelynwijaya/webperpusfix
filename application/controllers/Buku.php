<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('EXT', '.' . pathinfo(__FILE__, PATHINFO_EXTENSION));
define('PUBPATH', str_replace(SELF, '', FCPATH)); // added

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Penerbit_model');
    }

    public function index()
    {
        $data['penerbit'] = $this->Penerbit_model->daftarPenerbit()->result();
        $this->load->template('buku', $data);
    }

    public function detailBukubyID($id_buku)
    {
        $data['dataPengarang'] = $this->Buku_model->daftarPengarangbyIDbuku($id_buku)->result();
        $data['databuku'] = $this->Buku_model->detailBukubyID($id_buku);
        $data['penerbit'] = $this->Penerbit_model->daftarPenerbit()->result();
        $this->load->template('edit_buku', $data);
    }

    public function daftarBuku()
    {
        $data['daftarbuku'] = $this->Buku_model->daftarBuku()->result();
        $databukuasli = array();
        foreach ($data['daftarbuku'] as $datum) {
            $databukuasli[] = array(
                'id_buku' => $datum->id_buku,
                'judul_buku' => $datum->judul_buku,
                'thn_terbit' => $datum->thn_terbit,
                'nama_penerbit' => $datum->nama_penerbit,
                'tempat_terbit' => $datum->tempat_terbit,
                'isbn' => $datum->isbn,
                'pengarang' => $this->pecahPengarang($datum->id_buku)
            );
        }
        $data['databuku'] = $databukuasli;
        $this->load->template('daftarbuku', $data);
    }

    public function detailbuku($id_buku)
    {
        $id_anggota = $this->session->userdata('id');
        $data['jmhavailable'] = $this->Buku_model->getJmhbukuAvailable(substr($id_buku, 0, 17));
        $data['databuku'] = $this->Buku_model->detailBukubyID($id_buku);
        $data['datapengarang'] = $this->pecahPengarang(substr($id_buku, 0, 17));
        $data['requestbuku'] = $this->Buku_model->getRequestBuku(substr($id_buku, 0, 17), $id_anggota)->row_array();
        $this->Buku_model->tambahView($id_buku."1");
        $this->load->template('detailbuku', $data);
    }

    public function tambah_buku()
    {
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $karakter_judul = substr($this->input->post('judul_buku'), 0, 3);
        $tahun_terbit = $this->input->post('tahun_terbit');
        $id_buku = $karakter_judul . $tahun_terbit . date('U');
        $judul_buku = $this->input->post('judul_buku');
        $eksamplar = $this->input->post('eksamplar');
        $penerbit = $this->input->post('penerbit');
        $issn = $this->input->post('issn');
        $kode_ddc = $this->input->post('kode_ddc');
        $deskripsi = $this->input->post('deskripsi');
        $no_image = $this->input->post('no_image');
        $status = '1';
        $request = 'none';

        $config['upload_path'] = './assets/images/buku';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id_buku;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($no_image == true) {
            $nama_gambar = "";
        } else {
            if (!$this->upload->do_upload('myPhoto')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            }
        }

        for ($i = 0; $i < $eksamplar; $i++) {
            $inc = $i + 1;
            $data = array(
                'id_buku' => $id_buku . $inc,
                'judul_buku' => $judul_buku,
                'id_penerbit' => $penerbit,
                'isbn' => $issn,
                'eksemplar' => 1,
                'thn_terbit' => $tahun_terbit,
                'deskripsi' => $deskripsi,
                'status' => $status,
                'request' => $request,
                'kode_ddc' => $kode_ddc,
                'tanggal' => date('Y-m-d H:i:s'),
                'gambar' => $nama_gambar
            );
            $result2 = $this->Buku_model->insert_buku($data);
        }

        $pengarang = $this->input->post('idpengarang');

        $result = array();
        foreach ($pengarang as $key => $namapengarang) {
            $result[] = array(
                'id_buku' => $id_buku,
                'id_pengarang' => $pengarang[$key],
                'urutan' => $_POST['urutan'][$key]
            );
        }

        $result = $this->Buku_model->insert_buku_pengarang($result);
//        $result2 = $this->Buku_model->insert_buku($data);


        if ($result2 && $result) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Buku'));
        } else {
            $this->session->set_flashdata('success', 'Buku Berhasil Ditambahkan');
            redirect(base_url('Buku'));
        }
    }

    public function pecahPengarang($idbuku)
    {
        $datapengarang = $this->Buku_model->daftarPengarangbybuku($idbuku)->result_array();

        foreach ($datapengarang as $u) {
            $datapengarangasli[] = $u['nama_belakang'] . ', ' . substr($u['nama_depan'], 0, 1) . '.';
        }

        $kalimat = implode(", ", $datapengarangasli);
        return $kalimat;
    }

    public function hapusbuku($id_buku)
    {
        $result = $this->Buku_model->delete_buku($id_buku);
        $result3 = $this->Buku_model->delete_buku_pengarang($id_buku);


        if ($result && $result3) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect(base_url('daftarBuku'));
        }
    }

    public function edit_buku()
    {
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $id_buku = $this->input->post('id_buku');
        $judul_buku = $this->input->post('judul_buku');
        $eksamplar = $this->input->post('eksamplar');
        $penerbit = $this->input->post('penerbit');
        $issn = $this->input->post('issn');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $kode_ddc = $this->input->post('kode_ddc');
        $deskripsi = $this->input->post('deskripsi');
        $no_image = $this->input->post('no_image');
        $gambar = $this->input->post('gambar');

        $config['upload_path'] = './assets/images/buku';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id_buku;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($no_image == true) {
            $nama_gambar = "";
        } else {
            $path = PUBPATH . "/assets/images/buku/" . $gambar;

            if (file_exists($path)) {
                @unlink($path);
            }

            if (!$this->upload->do_upload('myPhoto')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            }
        }

        $where = array(
            'id_buku' => $id_buku
        );

        $data = array(
            'judul_buku' => $judul_buku,
            'id_penerbit' => $penerbit,
            'isbn' => $issn,
            'eksemplar' => $eksamplar,
            'thn_terbit' => $tahun_terbit,
            'deskripsi' => $deskripsi,
            'kode_ddc' => $kode_ddc,
            'tanggal' => date('Y-m-d H:i:s'),
            'gambar' => $nama_gambar
        );

        $pengarang = $this->input->post('idpengarang');

        $this->Buku_model->delete_buku_pengarang($id_buku);

        $result = array();
        foreach ($pengarang as $key => $namapengarang) {
            $result[] = array(
                'id_buku' => $id_buku,
                'id_pengarang' => $pengarang[$key],
                'urutan' => $_POST['urutan'][$key]
            );
        }

        $result = $this->Buku_model->insert_buku_pengarang($result);
        $result2 = $this->Buku_model->update_buku($where, $data);


        if ($result2 && $result) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('detailBuku/' . $id_buku));
        } else {
            $this->session->set_flashdata('success', 'Buku Berhasil Diedit');
            redirect(base_url('detailBuku/' . $id_buku));
        }
    }

    public function lihatLaporanBuku()
    {
        $tahun = date('Y');
        $data['daftarbuku'] = $this->Buku_model->daftarBukubyTahun($tahun)->result();
        $databukuasli = array();
        foreach ($data['daftarbuku'] as $datum) {
            $databukuasli[] = array(
                'id_buku' => $datum->id_buku,
                'judul_buku' => $datum->judul_buku,
                'jmh_buku' => $datum->jmh_buku,
                'thn_terbit' => $datum->thn_terbit,
                'nama_penerbit' => $datum->nama_penerbit,
                'tempat_terbit' => $datum->tempat_terbit,
                'isbn' => $datum->isbn,
                'pengarang' => $this->pecahPengarang(substr($datum->id_buku, 0, 17))
            );
        }
        $data['tahun'] = $tahun;
        $data['databuku'] = $databukuasli;
        $this->load->template('laporan_buku', $data);
    }

    public function RequestBuku($id_buku, $id_anggota)
    {
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $tgl_request = date('Y-m-d');
        $tgl_kembali = date('Y-m-d', strtotime('+3 day', strtotime($date)));

        $where = array(
            'id_buku' => substr($id_buku,0,17),
            'id_anggota' => $id_anggota
        );

        $wheredatabuku = array(
            'status' => "9",
        );

        $wheredatabuku1 = array(
            'status' => "1",
        );

        $databuku = array(
            'id_buku' => substr($id_buku, 0, 17),
            'id_anggota' => $id_anggota,
            'status' => "1",
            'tgl_request' => date('Y-m-d H:i:s'),
            'tgl_ready' => $tgl_kembali

        );

        $num_row = $this->Buku_model->getRequestBuku($id_buku, $id_anggota)->row_array();
        $data = $this->Buku_model->getRequestBuku($id_buku, $id_anggota)->row();
        if($num_row > 1){
            if($data->status == "1"){
                $this->Buku_model->updateRequestBuku($where, $wheredatabuku);
            }else{
                $this->Buku_model->updateRequestBuku($where, $wheredatabuku1);
            }

        }else{
            $this->Buku_model->RequestBuku($databuku);
        }

        redirect(base_url('Buku/detailbuku/'.$id_buku));
    }

    public function tampil_laporan_buku()
    {
        $tahun = $this->input->post('tahun');
        $data['daftarbuku'] = $this->Buku_model->daftarBukubyTahun($tahun)->result();
        $databukuasli = array();
        foreach ($data['daftarbuku'] as $datum) {
            $databukuasli[] = array(
                'id_buku' => $datum->id_buku,
                'judul_buku' => $datum->judul_buku,
                'jmh_buku' => $datum->jmh_buku,
                'thn_terbit' => $datum->thn_terbit,
                'nama_penerbit' => $datum->nama_penerbit,
                'tempat_terbit' => $datum->tempat_terbit,
                'isbn' => $datum->isbn,
                'pengarang' => $this->pecahPengarang(substr($datum->id_buku, 0, 17))
            );
        }
        $data['databuku'] = $databukuasli;
        $data['tahun'] = $tahun;
        $this->load->template('laporan_buku', $data);
    }

    public function daftar_request_buku($id_anggota)
    {
        $data['requestbuku'] = $this->Buku_model->getAllRequestBuku($id_anggota)->result();
        $this->load->view('daftar_request_buku', $data);
    }

    public function cari_request(){
        $id_anggota = $this->input->post('id_anggota');
        $data['requestbuku'] = $this->Buku_model->findRequestBuku($id_anggota)->row_array();
        echo json_encode($data['requestbuku']);
    }
}
