<?php

class Pengarang_model extends CI_Model
{

    public function daftarPengarang(){
        $query = $this->db->query('SELECT * FROM `pengarang` where id_pengarang LIKE "%P-%"');
        return $query;
    }

    function checkPengarang($where){
        $this->db->where($where);
        $query = $this->db->get("pengarang");
        if($query->num_rows()>0){
            return true;
        } else {
            return false;
        }
    }

    function search_pengarang($title){
        $query = $this->db->query('SELECT id_pengarang, concat(nama_depan,\' \', nama_belakang) AS nama_pengarang FROM `pengarang` where id_pengarang LIKE "%P-%" AND (nama_depan LIKE "%'.$title.'%" or nama_belakang LIKE "%'.$title.'%") ORDER by nama_pengarang ASC LIMIT 10');
        return $query->result();
    }

    function input_pengarang($where)
    {
        $this->db->insert('pengarang',$where);
    }

}