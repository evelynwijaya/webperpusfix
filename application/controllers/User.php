<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');

    }

    public function index()
    {
        $this->load->template('index');
    }

    public function login()
    {
        $this->load->template('login');
    }

    public function aksi_login()
    {
        $nim = $this->input->post('nim');
        //$nim = '52015022';
        $password = $this->input->post('password');
        //$password = '123456';

        if ($nim == null || $password == null) {
            $this->session->set_flashdata('error', 'Username atau password belum diisi !');
            redirect(base_url('login'));
        } else {
            $where = array(
                'nim' => $nim,
                'password' => md5($password)
            );
            $cek = $this->User_model->cek_login($where)->num_rows();
            if ($cek > 0) {

                $result = $this->User_model->cek_login($where)->result();

                $data_session = array(
                    'status' => "login",
                    'status_user' => $result[0]->status,
                    'id' => $result[0]->nim,
                    'nama_user' => $result[0]->nama
                );

                $this->session->set_userdata($data_session);

                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah !');
                redirect(base_url('login'));
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
