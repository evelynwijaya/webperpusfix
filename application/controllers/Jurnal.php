<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
define('PUBPATH',str_replace(SELF,'',FCPATH)); // added

class Jurnal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Penerbit_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Paper_model');
    }

    public function index()
    {
        $data['penerbit'] = $this->Penerbit_model->daftarPenerbit()->result();
        $this->load->template('jurnal', $data);
    }

    public function daftarJurnal()
    {
        $data['daftarjurnal'] = $this->Jurnal_model->daftarJurnal()->result();
        $this->load->template('daftarjurnal', $data);
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

        $this->load->template('detailjurnal', $data);
    }

    function pecahPengarang($idpaper)
    {
        $datapengarang = $this->Paper_model->daftarPengarangbyPaper($idpaper)->result_array();

        foreach ($datapengarang as $u) {
            $datapengarangasli[] = $u['nama_pengarang'];
        }

        $kalimat = implode(", ", $datapengarangasli);
        return $kalimat;
    }

    public function tambah_jurnal()
    {

        // buat id penerbit otomatis
        $judul = substr($this->input->post('nama_jurnal'), 0, 3);
        $id_jurnal = $judul . date('U');

        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $nama_jurnal = $this->input->post('nama_jurnal');
        $penerbit = $this->input->post('penerbit');
        $volume = $this->input->post('volume');
        $nomor = $this->input->post('nomor');
        $halaman = $this->input->post('halaman');
        $tanggal = $this->input->post('tanggal');
        $issn = $this->input->post('issn');
        $no_image = $this->input->post('no_image');

        $config['upload_path'] = './assets/images/jurnal';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id_jurnal;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        $where = array(
            'judul_jurnal' => $nama_jurnal,
            'id_penerbit' => $penerbit
        );

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

        $data = array(
            'id_jurnal' => $id_jurnal,
            'judul_jurnal' => $nama_jurnal,
            'id_penerbit' => $penerbit,
            'issn' => $issn,
            'halaman' => $halaman,
            'nomor' => $nomor,
            'volume' => $volume,
            'tgl_terbit' => $tanggal,
            'tanggal' => date('Y-m-d H:i:s'),
            'gambar' => $nama_gambar
        );

        $result = $this->Jurnal_model->checkJurnal($where);

        if ($result) {
            echo $this->session->set_flashdata('error', 'Jurnal telah ada tersimpan');
            redirect(base_url('Jurnal'));
        } else {
            $result2 = $this->Jurnal_model->input_jurnal($data);

            if ($result2) {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect(base_url('Jurnal'));
            } else {
                $this->session->set_flashdata('success', 'Jurnal Berhasil Ditambahkan');
                redirect(base_url('Jurnal'));
            }
        }

    }

    public function hapusjurnal($id_jurnal)
    {
        $result = $this->Jurnal_model->delete_jurnal($id_jurnal);
        $data['datapaperbyjurnal'] = $this->Paper_model->daftarPaperbyJurnal($id_jurnal)->result();
        foreach ($data['datapaperbyjurnal'] as $datum) {
            $result2 = $this->Paper_model->delete_paper_pengarang($datum->id_paper);
        }
        $result3 = $this->Paper_model->delete_paper_by_id_jurnal($id_jurnal);

        if ($result && $result3) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect(base_url('Jurnal/daftarjurnal'));
        }
    }

    public function detailJurnalbyID($id_jurnal)
    {
        $data['datajurnal'] = $this->Jurnal_model->detailJurnalbyID($id_jurnal);
        $data['penerbit'] = $this->Penerbit_model->daftarPenerbit()->result();
        $this->load->template('edit_jurnal', $data);
    }

    public function edit_jurnal()
    {

        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");

        $id_jurnal = $this->input->post('id_jurnal');
        $nama_jurnal = $this->input->post('nama_jurnal');
        $penerbit = $this->input->post('penerbit');
        $volume = $this->input->post('volume');
        $nomor = $this->input->post('nomor');
        $halaman = $this->input->post('halaman');
        $tanggal = $this->input->post('tanggal');
        $issn = $this->input->post('issn');
        $no_image = $this->input->post('no_image');
        $gambar = $this->input->post('gambar');

        $config['upload_path'] = './assets/images/jurnal';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id_jurnal;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($no_image == true) {
            $nama_gambar = "";
        } else {
            $path = PUBPATH."/assets/images/jurnal/".$gambar;

            if(file_exists($path)){
                @unlink($path);
            }

            if (!$this->upload->do_upload('myPhoto')) {
                if (empty($_FILES['userfile']['name'])) {
                    $data = array(
                        'judul_jurnal' => $nama_jurnal,
                        'id_penerbit' => $penerbit,
                        'issn' => $issn,
                        'halaman' => $halaman,
                        'nomor' => $nomor,
                        'volume' => $volume,
                        'tgl_terbit' => $tanggal,
                        'tanggal' => date('Y-m-d H:i:s')
                    );
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
            } else {

                $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');

                //  $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            }
        }

        $data = array(
            'judul_jurnal' => $nama_jurnal,
            'id_penerbit' => $penerbit,
            'issn' => $issn,
            'halaman' => $halaman,
            'nomor' => $nomor,
            'volume' => $volume,
            'tgl_terbit' => $tanggal,
            'tanggal' => date('Y-m-d H:i:s'),
            'gambar' => $nama_gambar,
        );

        $where = array('id_jurnal' => $id_jurnal);

        $result2 = $this->Jurnal_model->edit_jurnal($where, $data);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('detailJurnal/' . $id_jurnal));
        } else {
            $this->session->set_flashdata('success', 'Jurnal Berhasil Ditambahkan');
            redirect(base_url('detailJurnal/' . $id_jurnal));
        }

    }

    function deleteFiles($path){
        $files = glob($path.'*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
            //echo $file.'file deleted';
        }
    }

}