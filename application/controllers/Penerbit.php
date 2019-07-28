<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Penerbit_model');
    }

    public function index()
    {
        $this->load->template('penerbit');
    }

    public function daftarPenerbit()
    {
        $data['daftarpenerbit'] = $this->Penerbit_model->daftarPenerbit()->result();
        echo json_encode($this->Penerbit_model->daftarPenerbit()->result());
    }

    public function tambah_penerbit()
    {

        // buat id penerbit otomatis
        $karakter_penerbit = substr( $this->input->post('nama_penerbit'), 0 , 3 );
        $id_penerbit = "T-" . $karakter_penerbit . date('U');


        $nama_penerbit = $this->input->post('nama_penerbit');
        $tempat = $this->input->post('tempat_penerbit');

        $where = array(
            'nama_penerbit' => $nama_penerbit
        );

        $data = array(
            'id_penerbit' => $id_penerbit,
            'nama_penerbit' => $nama_penerbit,
            'tempat_terbit' => $tempat
        );

        $result = $this->Penerbit_model->checkPenerbit($where);

        if($result){
            echo $this->session->set_flashdata('error','Nama Penerbit telah ada tersimpan');
            redirect('Penerbit');
        }else{
            $result2 = $this->Penerbit_model->input_penerbit($data);

            if($result2){
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('Penerbit');
            } else {
                $this->session->set_flashdata('success', 'Penerbit Berhasil Ditambahkan');
                redirect('Penerbit');
            }
        }
    }

    public function tambah_penerbit2()
    {

        // buat id penerbit otomatis
        $karakter_penerbit = substr( $this->input->post('nama_penerbit'), 0 , 3 );
        $id_penerbit = "T-" . $karakter_penerbit . date('U');


        $nama_penerbit = $this->input->post('nama_penerbit');
        $tempat = $this->input->post('tempat_penerbit');

        $where = array(
            'nama_penerbit' => $nama_penerbit
        );

        $data = array(
            'id_penerbit' => $id_penerbit,
            'nama_penerbit' => $nama_penerbit,
            'tempat_terbit' => $tempat
        );

        $result = $this->Penerbit_model->checkPenerbit($where);

        if($result){
            echo "Nama Penerbit telah ada tersimpan";
        }else{
            $result2 = $this->Penerbit_model->input_penerbit($data);

            if($result2){
                echo "Data gagal disimpan";
            } else {
                echo "Penerbit Berhasil Ditambahkan";
            }
        }
    }
}