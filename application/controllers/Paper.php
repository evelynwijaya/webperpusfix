<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paper extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengarang_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Paper_model');
    }

    function get_pengarang(){
        if (isset($_GET['term'])) {
            $result = $this->Pengarang_model->search_pengarang($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_pengarang,
                        'description'   => $row->id_pengarang
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function index()
    {
        $data['pengarang'] = $this->Pengarang_model->daftarPengarang()->result();
        $data['jurnal'] = $this->Jurnal_model->daftarJurnal()->result();
        $this->load->template('paper', $data);
    }

    public function tambah_paper(){
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $judul = $this->input->post('judul_paper');
        $karakter_judul = substr( $this->input->post('judul_paper'), 0 , 3 );
        $id_paper = $karakter_judul . date('U');
        $id_jurnal = $this->input->post('jurnal');
        $halaman = $this->input->post('halaman');


        $data = array(
            'id_paper' => $id_paper,
            'judul_paper' => $judul,
            'id_jurnal' => $id_jurnal,
            'halaman' => $halaman,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $pengarang = $this->input->post('idpengarang');

        $result = array();
        foreach ($pengarang as $key => $namapengarang) {
            $result[] = array(
                'id_paper' => $id_paper,
                'id_pengarang' => $pengarang[$key],
                'urutan' => $_POST['urutan'][$key]
            );
        }

        $result2 = $this->Paper_model->insert_pengarang($result);
        $result3 = $this->Paper_model->insert_paper($data);

        if ($result2 && $result3) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Paper'));
        } else {
            $this->session->set_flashdata('success', 'Paper Berhasil Ditambahkan');
            redirect(base_url('Paper'));
        }
    }

    public function hapuspaper($id_paper, $id_jurnal){
        $result = $this->Paper_model->delete_paper_by_id_paper($id_paper);
        $result2 = $this->Paper_model->delete_paper_pengarang($id_paper);

        if ($result && $result2) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect(base_url('detailJurnal/'.$id_jurnal));
        }
    }

    public function detailpaper($id_paper, $id_jurnal){
        $data['dataPengarang'] = $this->Paper_model->daftarPengarangbyPaper($id_paper)->result();
        $data['dataPaper'] = $this->Paper_model->detailPaperbyID($id_paper)->row_array();
        $data['jurnal'] = $this->Jurnal_model->daftarJurnal()->result();
        $this->load->template('edit_paper', $data);
    }

    public function edit_paper(){
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $id_paper = $this->input->post('id_paper');
        $judul = $this->input->post('judul_paper');
        $id_jurnal_asli = $this->input->post('id_jurnal');
        $id_jurnal = $this->input->post('jurnal');
        $halaman = $this->input->post('halaman');

        $where = array(
            'id_paper' => $id_paper
        );

        $data = array(
            'judul_paper' => $judul,
            'id_jurnal' => $id_jurnal,
            'halaman' => $halaman,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $pengarang = $this->input->post('idpengarang');

        $result = array();
        foreach ($pengarang as $key => $namapengarang) {
            $result[] = array(
                'id_paper' => $id_paper,
                'id_pengarang' => $pengarang[$key],
                'urutan' => $_POST['urutan'][$key]
            );
        }

        $this->Paper_model->delete_paper_pengarang($id_paper);

        $result2 = $this->Paper_model->insert_pengarang($result);
        $result3 = $this->Paper_model->edit_paper($where, $data);

        if ($result2 && $result3) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('detailJurnal/'.$id_jurnal_asli));
        } else {
            $this->session->set_flashdata('success', 'Paper Berhasil Diedit');
            redirect(base_url('detailJurnal/'.$id_jurnal_asli));
        }
    }
}