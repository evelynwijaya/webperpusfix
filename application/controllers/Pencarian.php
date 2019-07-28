<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Buku_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Paper_model');
        $this->load->model('Skripsi_model');
    }

    public function index()
    {
        $this->load->template('no_found');
    }

    public function cari_detail()
    {
        $id_data = $this->input->post('id_data');
        $cari_semua_data = $this->input->post('cari_semua_data');
        $kategori = $this->input->post('kategori');

        if ($kategori == "buku") {
            if ($id_data == null) {
                $data['daftarbuku'] = $this->Buku_model->search_buku($cari_semua_data);
                if (sizeof($data['daftarbuku']) == 0) {
                    redirect(base_url('pencarian'));
                } else {
                    $databukuasli = array();
                    foreach ($data['daftarbuku'] as $datum) {
                        $databukuasli[] = array(
                            'id_buku' => $datum->id_buku,
                            'judul_buku' => $datum->judul_buku,
                            'thn_terbit' => $datum->thn_terbit,
                            'nama_penerbit' => $datum->nama_penerbit,
                            'tempat_terbit' => $datum->tempat_terbit,
                            'isbn' => $datum->isbn,
                            'pengarang' => $this->pecahPengarang(substr($datum->id_buku, 0, 17))
                        );
                    }
                    $data['databuku'] = $databukuasli;
                    $this->load->template('daftarbuku', $data);
                }
            } else {
                $this->detailbuku($id_data);
            }
        } else if ($kategori == "jurnal") {
            if ($id_data == null) {
                $data['daftarjurnal'] = $this->Jurnal_model->search_jurnal($cari_semua_data);
                if (sizeof($data['daftarjurnal']) == 0) {
                    redirect(base_url('pencarian'));
                } else {
                    $this->load->template('daftarjurnal', $data);
                }
            } else {
                $this->detailJurnal($id_data);
            }
        } else if ($kategori == "skripsi") {
            if ($id_data == null) {
                $data['daftarSkripsi'] = $this->Skripsi_model->search_skripsi($cari_semua_data);
                if (sizeof($data['daftarSkripsi']) == 0) {
                    redirect(base_url('pencarian'));
                } else {
                    $this->load->template('daftarskripsi', $data);
                }
            } else {
                $this->detailskripsi($id_data);
            }
        }
    }

    public function detailbuku($id_buku)
    {
        $id_anggota = $this->session->userdata('id');
        $data['databuku'] = $this->Buku_model->detailBukubyID($id_buku);
        $data['jmhavailable'] = $this->Buku_model->getJmhbukuAvailable(substr($id_buku, 0, 17));
        $data['datapengarang'] = $this->pecahPengarang(substr($id_buku, 0, 17));
        $data['requestbuku'] = $this->Buku_model->getRequestBuku($id_buku, $id_anggota)->row_array();
        if (count($data['databuku']) > 0) {
            $this->load->template('detailbuku', $data);
        } else {
            redirect(base_url('pencarian'));
        }
    }

    public function detailskripsi($id_skripsi)
    {
        $data['dataSkripsi'] = $this->Skripsi_model->detailSkripsibyID($id_skripsi)->row_array();
        if (count(['dataSkripsi']) != null) {
            $this->load->template('edit_skripsi', $data);
        } else {
            redirect(base_url('pencarian'));
        }
    }

    public function detailJurnal($id_jurnal)
    {
        $data['datajurnal'] = $this->Jurnal_model->detailJurnal($id_jurnal);
        $data['datapaperbyjurnal'] = $this->Paper_model->daftarPaperbyJurnal($id_jurnal)->result();
        $datapaperasli = array();
        foreach ($data['datapaperbyjurnal'] as $datum) {
            $datapaperasli[] = array(
                'id_paper' => $datum->id_paper,
                'judul_paper' => $datum->judul_paper,
                'halaman' => $datum->halaman,
                'pengarang' => $this->pecahPengarang($datum->id_paper)
            );
        }
        $data['datapaper'] = $datapaperasli;

        if (count($data['datapaper']) > 0) {
            $this->load->template('detailjurnal', $data);
        } else {
            redirect(base_url('pencarian'));
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

    public function cari_semua($kategori)
    {
        if (isset($_GET['term'])) {
            if ($kategori == "buku") {
                $result = $this->Buku_model->search_buku($_GET['term']);
                if (count($result) > 0) {
                    foreach ($result as $row)
                        $arr_result[] = array(
                            'label' => $row->judul_buku,
                            'description' => $row->id_buku,
                        );
                    echo json_encode($arr_result);
                }
            } else if ($kategori == "jurnal") {
                $result = $this->Jurnal_model->search_jurnal($_GET['term']);
                if (count($result) > 0) {
                    foreach ($result as $row)
                        $arr_result[] = array(
                            'label' => $row->judul_jurnal,
                            'description' => $row->id_jurnal,
                        );
                    echo json_encode($arr_result);
                }
            }
            if ($kategori == "skripsi") {
                $result = $this->Skripsi_model->search_skripsi($_GET['term']);
                if (count($result) > 0) {
                    foreach ($result as $row)
                        $arr_result[] = array(
                            'label' => $row->judul_skripsi,
                            'description' => $row->id_skripsi,
                        );
                    echo json_encode($arr_result);
                }
            }
        }
    }
}