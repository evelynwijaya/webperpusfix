<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 06/06/2019
 * Time: 11:36
 */

class Paper_model extends CI_Model
{
    public function daftarPaper(){
        return $this->db->get('paper');
    }

    public function daftarPaperbyJurnal($jurnal){
        $this->db->where('id_jurnal', $jurnal);
        return $this->db->get('paper');
    }

    function daftarPengarangbyPaper($paper){
        $query =  $this->db->query('SELECT `paperpengarang`.`id_pengarang`, concat(`pengarang`.`nama_depan`,\' \',`pengarang`.`nama_belakang`) as nama_pengarang, `paperpengarang`.`urutan` FROM `paperpengarang` INNER JOIN pengarang ON `pengarang`.`id_pengarang` = `paperpengarang`.`id_pengarang` WHERE `paperpengarang`.`id_paper`="'.$paper.'" ORDER BY `paperpengarang`.`urutan` ASC');
        return $query;
    }

    function detailPaperbyID($paper){
        $query =  $this->db->query('SELECT `paper`.`id_paper`, `paper`.`judul_paper`, `paper`.`id_jurnal`, `paper`.`halaman` FROM `paper` WHERE `paper`.`id_paper` ="'.$paper.'"');
        return $query;
    }

    function insert_paper($data)
    {
        $this->db->insert('paper',$data);
    }

    function insert_pengarang($where)
    {
        $this->db->insert_batch('paperpengarang',$where);
    }

    public function delete_paper_by_id_jurnal($id_jurnal)
    {
        return $this->db->query("DELETE FROM paper WHERE id_jurnal='$id_jurnal'");
    }

    public function delete_paper_by_id_paper($id_paper)
    {
        return $this->db->query("DELETE FROM paper WHERE id_paper='$id_paper'");
    }

    public function delete_paper_pengarang($id_paper)
    {
        return $this->db->query("DELETE FROM paperpengarang WHERE id_paper='$id_paper'");
    }

    function edit_paper($where, $data)
    {
        $this->db->where($where);
        $this->db->update('paper',$data);
    }

    function edit_pengarang($where, $data)
    {
        $this->db->where($where);
        $this->db->update_batch('paperpengarang',$data);
    }
}