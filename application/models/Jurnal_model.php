<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 05/06/2019
 * Time: 10:02
 */

class Jurnal_model extends CI_Model
{

    public function daftarJurnal(){
        return $this->db->query('SELECT `jurnal`.`id_jurnal`,`jurnal`.`issn`, `jurnal`.`judul_jurnal`, `jurnal`.`volume`, `jurnal`.`nomor`, `jurnal`.`tgl_terbit`, `penerbit`.`nama_penerbit`, `jurnal`.`halaman` FROM `jurnal` INNER JOIN `penerbit` ON `jurnal`.`id_penerbit` = `penerbit`.`id_penerbit`');
    }

    public function search_jurnal($title){
        return $this->db->query('SELECT `jurnal`.`id_jurnal`,`jurnal`.`issn`, `jurnal`.`judul_jurnal`, `jurnal`.`volume`, `jurnal`.`nomor`, `jurnal`.`tgl_terbit`, `penerbit`.`nama_penerbit`, `jurnal`.`halaman` FROM `jurnal` INNER JOIN `penerbit` ON `jurnal`.`id_penerbit` = `penerbit`.`id_penerbit` WHERE `jurnal`.`judul_jurnal` LIKE "%'.$title.'%"')->result();
    }

    function checkJurnal($where){
        $this->db->where($where);
        $query = $this->db->get("jurnal");
        if($query->num_rows()>0){
            return true;
        } else {
            return false;
        }
    }

    function input_jurnal($data)
    {
        $this->db->insert('jurnal',$data);
    }

    function edit_jurnal($where, $data)
    {
        $this->db->where($where);
        $this->db->update('jurnal',$data);
    }

    public function detailJurnal($id_jurnal)
    {
        $query = $this->db->query("SELECT jurnal.id_jurnal,jurnal.judul_jurnal, jurnal.volume, jurnal.nomor, jurnal.halaman, jurnal.tgl_terbit, jurnal.id_penerbit, jurnal.issn, jurnal.gambar, penerbit.nama_penerbit FROM jurnal
                                  INNER JOIN penerbit ON penerbit.id_penerbit = jurnal.id_penerbit
                                  WHERE jurnal.id_jurnal = '" . $id_jurnal . "'");
        return $query->row_array();
    }

    public function detailJurnalbyID($id_jurnal)
    {
        $query = $this->db->query("SELECT jurnal.id_jurnal,jurnal.judul_jurnal, jurnal.volume, jurnal.nomor, jurnal.halaman, jurnal.tgl_terbit, jurnal.id_penerbit, jurnal.issn, jurnal.gambar, jurnal.id_penerbit FROM jurnal
                                  WHERE jurnal.id_jurnal = '" . $id_jurnal . "'");
        return $query->row_array();
    }

    public function delete_jurnal($id_jurnal)
    {
        return $this->db->query("DELETE FROM jurnal WHERE id_jurnal='$id_jurnal'");
    }

}