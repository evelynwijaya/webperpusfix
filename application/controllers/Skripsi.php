<?php

class Skripsi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Skripsi_model');
    }

    public function index()
    {
        $this->load->template('skripsi');
    }

    public function daftarSkripsi()
    {
        $data['daftarSkripsi'] = $this->Skripsi_model->daftarSkripsi()->result();
        $this->load->template('daftarskripsi', $data);
    }

    public function tambah_skripsi()
    {

        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $karakter_judul = substr($this->input->post('judul_skripsi'), 0, 3);
        $judul = $this->input->post('judul_skripsi');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $id_skripsi = $karakter_judul . $tahun_terbit . date('U');
        $pengarang = substr($this->input->post('penulis'), 0, 3);
        $karakter_depan = substr($this->input->post('nama_depan'), 0, 1);
        $nama_depan = $this->input->post('nama_depan');
        $karakter_belakang = $this->input->post('nama_belakang');
        $nama_belakang = $this->input->post('nama_belakang');
        $jurusan = $this->input->post('jurusan');
        $lulusan = $this->input->post('lulusan');
        $pembimbing1 = $this->input->post('pembimbing1');
        $pembimbing2 = $this->input->post('pembimbing2');
        $id_pengarang = "S-" . $nama_depan . $nama_belakang . date('U');

        $data = array(
            'id_skripsi' => $id_skripsi,
            'judul_skripsi' => $judul,
            'thn_terbit' => $tahun_terbit,
            'jurusan' => $jurusan,
            'lulusan' => $lulusan,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $data2 = array(
            'id_pengarang' => $id_pengarang,
            'id_skripsi' => $id_skripsi,
            'pembimbing1' => $pembimbing1,
            'pembimbing2' => $pembimbing2
        );

        $data3 = array(
            'id_pengarang' => $id_pengarang,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang
        );


        $result2 = $this->Skripsi_model->input_skripsi($data);
        $result3 = $this->Skripsi_model->input_skripsi_pengarang($data2);
        $result4 = $this->Skripsi_model->input_pengarang($data3);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Skripsi'));
        } else {
            $this->session->set_flashdata('success', 'Skripsi Berhasil Ditambahkan');
            redirect(base_url('Skripsi'));
        }

    }

    public function hapusskripsi($id_skripsi)
    {
        $result = $this->Skripsi_model->delete_skripsi($id_skripsi);
        $result2 = $this->Skripsi_model->delete_skripsi_pengarang($id_skripsi);

        if ($result && $result2) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect(base_url('Skripsi/daftarskripsi'));
        }
    }

    public function detailskripsi($id_skripsi)
    {
        $data['dataSkripsi'] = $this->Skripsi_model->detailSkripsibyID($id_skripsi)->row_array();
        $this->load->template('edit_skripsi', $data);
    }

    public function edit_skripsi()
    {
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $id_skripsi = $this->input->post('id_skripsi');
        $id_pengarang = $this->input->post('id_pengarang');
        $judul = $this->input->post('judul_skripsi');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $jurusan = $this->input->post('jurusan');
        $lulusan = $this->input->post('lulusan');
        $pembimbing1 = $this->input->post('pembimbing1');
        $pembimbing2 = $this->input->post('pembimbing2');

        $where = array(
            'id_skripsi' => $id_skripsi
        );

        $where2 = array(
            'id_pengarang' => $id_pengarang
        );

        $dataSkripsi = array(
            'judul_skripsi' => $judul,
            'thn_terbit' => $tahun_terbit,
            'jurusan' => $jurusan,
            'lulusan' => $lulusan,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $dataSkripsiPembimbing = array(
            'pembimbing1' => $pembimbing1,
            'pembimbing2' => $pembimbing2
        );

        $dataSkripsiPengarang = array(
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang
        );


        $result2 = $this->Skripsi_model->edit_skripsi($where, $dataSkripsi);
        $result3 = $this->Skripsi_model->edit_skripsi_pengarang($where, $dataSkripsiPembimbing);
        $result4 = $this->Skripsi_model->edit_pengarang($where2, $dataSkripsiPengarang);

        if ($result2 && $result3 && $result4) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Skripsi/daftarskripsi'));
        } else {
            $this->session->set_flashdata('success', 'Skripsi Berhasil Diedit');
            redirect(base_url('Skripsi/daftarskripsi'));
        }

    }

}