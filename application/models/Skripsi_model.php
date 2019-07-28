<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 05/06/2019
 * Time: 10:02
 */

class Skripsi_model extends CI_Model
{

    public function daftarSkripsi()
    {
        return $this->db->query('SELECT `skripsi`.`id_skripsi`, `skripsi`.`judul_skripsi`, `skripsi`.`thn_terbit`, `skripsi`.`jurusan`, `skripsi`.`lulusan`, `skripsipengarang`.`pembimbing1`, `skripsipengarang`.`pembimbing2`, `pengarang`.`nama_depan`, `pengarang`.`nama_belakang` FROM `skripsi` INNER JOIN `skripsipengarang` ON `skripsipengarang`.`id_skripsi` = `skripsi`.`id_skripsi` INNER JOIN `pengarang` ON `skripsipengarang`.`id_pengarang` = `pengarang`.`id_pengarang`');
    }

    public function search_skripsi($title)
    {
      return $this->db->query('SELECT `skripsi`.`id_skripsi`, `skripsi`.`judul_skripsi`, `skripsi`.`thn_terbit`, `skripsi`.`jurusan`, `skripsi`.`lulusan`, `skripsipengarang`.`pembimbing1`, `skripsipengarang`.`pembimbing2`, `pengarang`.`nama_depan`, `pengarang`.`nama_belakang` FROM `skripsi` INNER JOIN `skripsipengarang` ON `skripsipengarang`.`id_skripsi` = `skripsi`.`id_skripsi` INNER JOIN `pengarang` ON `skripsipengarang`.`id_pengarang` = `pengarang`.`id_pengarang` WHERE `skripsi`.`judul_skripsi` LIKE "%'.$title.'%" OR `skripsipengarang`.`pembimbing1` LIKE "%'.$title.'%" OR `skripsipengarang`.`pembimbing2` LIKE "%'.$title.'%" OR `pengarang`.`nama_depan` LIKE "%'.$title.'%" OR `pengarang`.`nama_belakang` LIKE "%'.$title.'%"')->result();
    }

    public function detailSkripsibyID($id_skripsi)
    {
        return $this->db->query('SELECT `skripsi`.`id_skripsi`, `skripsi`.`judul_skripsi`, `skripsi`.`thn_terbit`, `skripsi`.`jurusan`, `skripsi`.`lulusan`, `skripsipengarang`.`pembimbing1`, `skripsipengarang`.`pembimbing2`,`pengarang`.`id_pengarang`, `pengarang`.`nama_depan`, `pengarang`.`nama_belakang` FROM `skripsi` INNER JOIN `skripsipengarang` ON `skripsipengarang`.`id_skripsi` = `skripsi`.`id_skripsi` INNER JOIN `pengarang` ON `skripsipengarang`.`id_pengarang` = `pengarang`.`id_pengarang` WHERE `skripsi`.`id_skripsi`="'.$id_skripsi.'"');
    }

    function checkSkripsi($where)
    {
        $this->db->where($where);
        $query = $this->db->get("skripsi");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function input_skripsi($data)
    {
        $this->db->insert('skripsi', $data);
    }

    function input_skripsi_pengarang($data)
    {
        $this->db->insert('skripsipengarang', $data);
    }

    function input_pengarang($data)
    {
        $this->db->insert('pengarang', $data);
    }

    function delete_skripsi($id_skripsi){
        return $this->db->query("DELETE FROM skripsi WHERE id_skripsi='$id_skripsi'");
    }

    function delete_skripsi_pengarang($id_skripsi){
        return $this->db->query("DELETE FROM skripsipengarang WHERE id_skripsi='$id_skripsi'");
    }

    function edit_skripsi($where, $data)
    {
        $this->db->where($where);
        $this->db->update('skripsi', $data);
    }

    function edit_skripsi_pengarang($where, $data)
    {
        $this->db->where($where);
        $this->db->update('skripsipengarang', $data);
    }

    function edit_pengarang($where, $data)
    {
        $this->db->where($where);
        $this->db->update('pengarang', $data);
    }

}
