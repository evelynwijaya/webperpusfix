<?php

class Buku_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    function cari_buku($judul)
    {
        return $this->db->query('SELECT * FROM `buku` WHERE `status` = "1" and (`id_buku` LIKE "%' . $judul . '%" OR `judul_buku` LIKE "%' . $judul . '%") LIMIT 10');
    }

    function daftarBuku()
    {
        $result = $this->db->query("SELECT DISTINCT LEFT(`buku`.`id_buku`, LENGTH(`buku`.`id_buku`)-1) as id_buku, `buku`.`judul_buku`, `buku`.`id_penerbit`, `penerbit`.`nama_penerbit`, `penerbit`.`tempat_terbit`, `buku`.`isbn`, `buku`.`eksemplar`, `buku`.`thn_terbit` FROM `buku` INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` ORDER BY `buku`.`views` DESC");
        return $result;
    }

    function search_buku($title)
    {
         $query = $this->db->query('SELECT `buku`.`id_buku`, `buku`.`judul_buku`, `buku`.`id_penerbit`, `penerbit`.`nama_penerbit`, `penerbit`.`tempat_terbit`, `buku`.`isbn`, `buku`.`eksemplar`, `buku`.`thn_terbit`, `pengarang`.`nama_depan`, `pengarang`.`nama_belakang` FROM `buku` INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` JOIN `bukupengarang` ON `bukupengarang`.`id_buku` LIKE CONCAT(LEFT(`buku`.`id_buku`, LENGTH(`buku`.`id_buku`)-1), \'%\') INNER JOIN `pengarang` ON `bukupengarang`.`id_pengarang` = `pengarang`.`id_pengarang`  WHERE `buku`.`judul_buku` LIKE "%'.$title.'%" OR `pengarang`.`nama_depan` LIKE "%'.$title.'%" OR `pengarang`.`nama_belakang` LIKE "%'.$title.'%" GROUP BY `buku`.`judul_buku`');
        return $query->result();
    }

//    function search_buku($title)
//    {
//        $query = $this->db->query('SELECT `buku`.`id_buku`, `buku`.`judul_buku`, `buku`.`id_penerbit`, `penerbit`.`nama_penerbit`, `penerbit`.`tempat_terbit`, `buku`.`isbn`, `buku`.`eksemplar`, `buku`.`thn_terbit` FROM `buku` INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` WHERE `buku`.`judul_buku` LIKE "%' . $title . '%" GROUP BY `buku`.`judul_buku`');
//        return $query->result();
//    }

    function getJmhbukuAvailable($id_buku)
    {
        $query = $this->db->query('SELECT `buku`.`id_buku`, `buku`.`judul_buku`, `buku`.`id_penerbit`, `penerbit`.`nama_penerbit`, `penerbit`.`tempat_terbit`, `buku`.`isbn`, `buku`.`eksemplar`, `buku`.`thn_terbit` FROM `buku` INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` WHERE `buku`.`id_buku` LIKE "' . $id_buku . '%"  AND `buku`.`status` = "1"');
        return $query->num_rows();
    }

    function daftarBukubyTahun($tahun)
    {
        $result = $this->db->query("SELECT COUNT(`buku`.`id_buku`) as jmh_buku, `buku`.`id_buku`, `buku`.`judul_buku`, `buku`.`id_penerbit`, `penerbit`.`nama_penerbit`, `penerbit`.`tempat_terbit`, `buku`.`isbn`, `buku`.`eksemplar`, `buku`.`thn_terbit` FROM `buku` INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` WHERE `buku`.`tanggal` LIKE '%" . $tahun . "%' GROUP BY `buku`.`tanggal` DESC");
        return $result;
    }

    function detailBukubyID($id_buku)
    {
        $result = $this->db->query("SELECT DISTINCT LEFT(`buku`.`id_buku`, LENGTH(`buku`.`id_buku`)-1) as id_buku, `buku`.`judul_buku`, `buku`.`eksemplar`, `buku`.`id_penerbit`, `penerbit`.`nama_penerbit`, `penerbit`.`tempat_terbit`, `buku`.`isbn`, `buku`.`eksemplar`, `buku`.`thn_terbit`, `buku`.`gambar`, `buku`.`deskripsi`, `buku`.`kode_ddc` FROM `buku` INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` where `buku`.`id_buku` LIKE '" . $id_buku . "%' ");
        return $result->row_array();
    }

    function daftarPengarangbyBuku($buku)
    {
        $query = $this->db->query('SELECT `bukupengarang`.`id_pengarang`, `pengarang`.`nama_depan`,`pengarang`.`nama_belakang`, `bukupengarang`.`urutan` FROM `bukupengarang` INNER JOIN pengarang ON `pengarang`.`id_pengarang` = `bukupengarang`.`id_pengarang` WHERE `bukupengarang`.`id_buku`="' . $buku . '" ORDER BY `bukupengarang`.`urutan` ASC');
        return $query;
    }

    function daftarPengarangbyIDbuku($buku)
    {
        $query = $this->db->query('SELECT `bukupengarang`.`id_pengarang`, concat(`pengarang`.`nama_depan`,\' \',`pengarang`.`nama_belakang`) as nama_pengarang, `bukupengarang`.`urutan` FROM `bukupengarang` INNER JOIN pengarang ON `pengarang`.`id_pengarang` = `bukupengarang`.`id_pengarang` WHERE `bukupengarang`.`id_buku`="' . $buku . '" ORDER BY `bukupengarang`.`urutan` ASC');
        return $query;
    }

    function insert_buku($data)
    {
        $this->db->insert('buku', $data);
    }

    function RequestBuku($data)
    {
        $this->db->insert('request_buku', $data);
    }

    function getRequestBuku($id_buku, $id_anggota)
    {
        return $this->db->query("SELECT * FROM `request_buku` WHERE id_buku='" . $id_buku . "' and id_anggota = '" . $id_anggota . "'");
    }

    function getAllRequestBuku($id_anggota)
    {
        return $this->db->query("SELECT DISTINCT `buku`.`judul_buku`, `request_buku`.`id_buku`, `request_buku`.`id_anggota`, `request_buku`.`tgl_request`, `request_buku`.`tgl_ready` FROM `request_buku`
                                 JOIN `buku` ON `buku`.`id_buku` LIKE CONCAT(`request_buku`.`id_buku`, '%') WHERE `request_buku`.`id_anggota` = " . $id_anggota . " AND `request_buku`.`status` = 1");
    }

    function findRequestBuku($id_anggota)
    {
        return $this->db->query("SELECT `buku`.`judul_buku`, `request_buku`.`id_buku`, `request_buku`.`id_anggota`, `request_buku`.`tgl_request`, `request_buku`.`tgl_ready` FROM `request_buku`
                                 JOIN `buku` ON `buku`.`id_buku` LIKE CONCAT(`request_buku`.`id_buku`, '%') WHERE `request_buku`.`id_anggota` = " . $id_anggota . " AND `request_buku`.`status` = 3 limit 1");
    }

    function getJmhRequestBuku($id_buku)
    {
        return $this->db->query("SELECT * FROM `request_buku` WHERE id_buku='".$id_buku."' and status=1")->num_rows();
    }

    function getLastRequestBuku($id_buku)
    {
        return $this->db->query("SELECT * FROM `request_buku` WHERE id_buku = '".$id_buku."' and status=1 ORDER BY tgl_request ASC LIMIT 1");
    }

    function updateRequestBuku($where, $data)
    {
        $this->db->where($where);
        $this->db->update('request_buku', $data);
    }

    function insert_buku_pengarang($where)
    {
        $this->db->insert_batch('bukupengarang', $where);
    }

    public function delete_buku($id_buku)
    {
        return $this->db->query("DELETE FROM buku WHERE id_buku like '".$id_buku."%'");
    }

    public function delete_buku_pengarang($id_buku)
    {
        return $this->db->query("DELETE FROM bukupengarang WHERE id_buku='$id_buku'");
    }

    public function pencarian_populer()
    {
        return $this->db->query("SELECT DISTINCT LEFT(`buku`.`id_buku`, LENGTH(`buku`.`id_buku`)-1) as id_buku, `buku`.`judul_buku`, `buku`.`views` FROM `buku` GROUP BY `buku`.`judul_buku` ORDER BY `buku`.`views` DESC LIMIT 5");
    }

    function update_buku($where, $data)
    {
        $this->db->where($where);
        $this->db->update('buku', $data);
    }

    function TambahView($where)
    {
        $this->db->where('id_buku', $where);
        $this->db->set('views', 'views + 1', FALSE);
        return $this->db->update("buku");
    }
}
