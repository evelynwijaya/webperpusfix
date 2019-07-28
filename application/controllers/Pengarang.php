<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Pengarang_model');
    }

    public function index()
    {
        $this->load->template('pengarang');
    }

    public function tambah_pengarang()
    {

        $page = $this->input->post('page');

        // buat id pengarang otomatis
        $karakter_depan = substr( $this->input->post('nama_depan'), 0 , 1 );
        $karakter_belakang = substr( $this->input->post('nama_belakang'), 0 , 1 );
        $id_pengarang = "P-" . $karakter_depan . $karakter_belakang . date('U');

        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $institusi = $this->input->post('institusi');
        $where = array(
            'id_pengarang' => $id_pengarang,
            'nama_belakang' => $nama_belakang,
            'nama_depan' => $nama_depan,
            'institusi' => $institusi
        );

        $wherePengarang = array(
            'nama_belakang' => $nama_belakang,
            'nama_depan' => $nama_depan
        );

        $result = $this->Pengarang_model->checkPengarang($wherePengarang);

        if($result){
            echo $this->session->set_flashdata('error','Nama Pengarang telah ada tersimpan');
            redirect('Pengarang');
        }else{
            $result2 = $this->Pengarang_model->input_pengarang($where);

            if($result2){
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                if ($page == "buku"){
                    redirect('buku');
                }else{
                    redirect('Pengarang');
                }

            } else {
                $this->session->set_flashdata('success', 'Pengarang Berhasil Ditambahkan');
                if ($page == "buku"){
                    redirect('buku');
                }else{
                    redirect('Pengarang');
                }
            }
        }
    }

    public function tambah_pengarang2()
    {
        // buat id pengarang otomatis
        $karakter_depan = substr( $this->input->post('nama_depan'), 0 , 1 );
        $karakter_belakang = substr( $this->input->post('nama_belakang'), 0 , 1 );
        $id_pengarang = "P-" . $karakter_depan . $karakter_belakang . date('U');

        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $institusi = $this->input->post('institusi');

        $where = array(
            'id_pengarang' => $id_pengarang,
            'nama_belakang' => $nama_belakang,
            'nama_depan' => $nama_depan,
            'institusi' => $institusi
        );

        $wherePengarang = array(
            'nama_belakang' => $nama_belakang,
            'nama_depan' => $nama_depan
        );

        $result = $this->Pengarang_model->checkPengarang($wherePengarang);

        if($result){
            echo "Nama Pengarang telah ada tersimpan";
        }else{
            $result2 = $this->Pengarang_model->input_pengarang($where);

            if($result2){
                echo "Data gagal disimpan";
            } else {
                echo "Pengarang Berhasil Ditambahkan";
            }
        }
    }
}
