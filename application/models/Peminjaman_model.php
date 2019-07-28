<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

    function AutoNumbering()
    {
        $today = date('Ymd');
        $data = $this->db->query("SELECT MAX(id_peminjaman) AS last FROM peminjaman ")->row_array();
        $lastNoFaktur = $data['last'];
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        $nextNoUrut   = $lastNoUrut+1;
        $nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);
        return $nextNoTransaksi;
    }

    function cekJmhTemp()
    {
        return $this->db->get("temp_peminjaman");
    }

    function cekJmhBukuPinjam($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->where('status_peminjaman', "Y");
        return $this->db->get("peminjaman");
    }

    function cekJudulTemp($judul)
    {
        $this->db->where("judul_buku",$judul);
        return $this->db->get("temp_peminjaman");
    }

    function getTempPeminjaman()
    {
        return $this->db->get("temp_peminjaman");
    }

    function getBukuPeminjaman($id_anggota)
    {
        return $this->db->query("SELECT `peminjaman`.`id_peminjaman`,`peminjaman`.`id_anggota`, `peminjaman`.`tgl_pinjam`, `peminjaman_detail`.`id_buku`, `buku`.`judul_buku`, `peminjaman_detail`.`batas_kembali` FROM `peminjaman` INNER JOIN `peminjaman_detail` ON `peminjaman`.`id_peminjaman` = `peminjaman_detail`.`id_peminjaman` INNER JOIN `buku` ON `buku`.`id_buku` = `peminjaman_detail`.`id_buku` WHERE `peminjaman`.`id_anggota` = '".$id_anggota."' AND `peminjaman`.`status_peminjaman` = 'Y' AND `peminjaman_detail`.`status_kembali` = 'Y'");
    }

    function getBukuPengembalian($id_anggota)
    {
        return $this->db->query("SELECT `peminjaman`.`id_peminjaman`,`peminjaman`.`id_anggota`, `peminjaman`.`tgl_pinjam`, `peminjaman_detail`.`id_buku`, `buku`.`judul_buku`, `peminjaman_detail`.`batas_kembali` FROM `peminjaman` INNER JOIN `peminjaman_detail` ON `peminjaman`.`id_peminjaman` = `peminjaman_detail`.`id_peminjaman` INNER JOIN `buku` ON `buku`.`id_buku` = `peminjaman_detail`.`id_buku` WHERE `peminjaman`.`id_anggota` = '".$id_anggota."' AND `peminjaman`.`status_peminjaman` = 'Y'  AND `peminjaman_detail`.`status_kembali` = 'Y'");
    }

    function cek_kode_buku($kode_buku)
    {
        return $this->db->query("SELECT `peminjaman_detail`.`id_peminjaman`, `peminjaman_detail`.`id_buku`, `peminjaman`.`id_anggota`, `user`.`nama`, `buku`.`judul_buku` FROM `peminjaman_detail` INNER JOIN `peminjaman` ON `peminjaman`.`id_peminjaman` = `peminjaman_detail`.`id_peminjaman` INNER JOIN `user` ON `user`.`nim` = `peminjaman`.`id_anggota` INNER JOIN `buku` ON `buku`.`id_buku` = `peminjaman_detail`.`id_buku` WHERE `peminjaman_detail`.`id_buku` ='".$kode_buku."' AND `peminjaman_detail`.`status_kembali` = 'Y'");
    }

    function InsertTempPeminjaman($data)
    {
        $this->db->insert('temp_peminjaman', $data);
    }

    function InsertPeminjamanDetail($data)
    {
        $this->db->insert('peminjaman_detail', $data);
    }

    function InsertPeminjaman($data)
    {
        $this->db->insert('peminjaman', $data);
    }

    function jumlahTemp()
    {
        return $this->db->count_all("temp_peminjaman");
    }

    function deleteTempBuku($kode_buku)
    {
        $this->db->where("id_buku",$kode_buku);
        $this->db->delete('temp_peminjaman');
    }

    function deleteAllTempBuku()
    {
        $this->db->truncate('temp_peminjaman');
    }

    function daftarPeminjamanAll()
    {
        return $this->db->query('SELECT `peminjaman`.`id_peminjaman`, `user`.`nama`, `peminjaman`.`tgl_pinjam`, `peminjaman`.`tgl_kembali`, `peminjaman`.`jumlah`, `peminjaman`.`status_peminjaman` FROM `peminjaman` INNER JOIN `user` ON `peminjaman`.`id_anggota` = `user`.`nim` where `peminjaman`.`status_peminjaman` = "N"');
    }

    function RiwayatPeminjamanbyTanggal($tgl_awal, $tgl_akhir)
    {
        return $this->db->query('SELECT `peminjaman`.`id_peminjaman`, `user`.`nama`, `peminjaman`.`tgl_pinjam`, `peminjaman`.`jumlah`, `peminjaman`.`status_peminjaman`, `pengembalian`.`tgl_kembali`, `pengembalian`.`telat` FROM `peminjaman` INNER JOIN `user` ON `peminjaman`.`id_anggota` = `user`.`nim` INNER JOIN `pengembalian` ON `peminjaman`.`id_peminjaman` = `pengembalian`.`id_peminjaman` where `peminjaman`.`status_peminjaman` = "Y" AND `peminjaman`.`tgl_pinjam` >= "'.$tgl_awal.'" and `peminjaman`.`tgl_pinjam` <= "'.$tgl_akhir.'"');
    }

    function simpanMahasiswa($data)
    {
        return $this->db->insert("user", $data);
    }

    function detailPeminjamanbyID($id_peminjaman){
        $query = $this->db->query('SELECT `peminjaman`.`id_peminjaman`, `user`.`nama`, `peminjaman`.`tgl_pinjam`, `peminjaman`.`tgl_kembali`, `peminjaman`.`jumlah`, `peminjaman`.`status_peminjaman` FROM `peminjaman` INNER JOIN `user` ON `peminjaman`.`id_anggota` = `user`.`nim`  WHERE `peminjaman`.`id_peminjaman` = "'.$id_peminjaman.'"');
        return $query->row_array();
    }

    function daftarbukuPeminjamanbyID($id_peminjaman){
        $query = $this->db->query('SELECT `peminjaman_detail`.`id_peminjaman`, `buku`.`id_buku`, `buku`.`judul_buku` FROM `peminjaman_detail` INNER JOIN `buku` ON `buku`.`id_buku` = `peminjaman_detail`.`id_buku`WHERE `peminjaman_detail`.`id_peminjaman` = "'.$id_peminjaman.'" AND `peminjaman_detail`.`status_kembali` = "Y"');
        return $query;
    }

    function HapusSatuBukuPinjam($where)
    {
        $this->db->where($where);
        return $this->db->delete("peminjaman_detail");
    }

    function TambahSatuBukuKembali($data)
    {
        return $this->db->insert("pengembalian_detail",$data);
    }

    function UpdateJumlahBukuPinjam($where, $data)
    {
        $this->db->where($where);
        return $this->db->update("peminjaman",$data);
    }

    function TambahJumlahStokBuku($where)
    {
        $this->db->where('id_buku', $where);
        $this->db->set('eksemplar', 'eksemplar+1', FALSE);
        return $this->db->update("buku");
    }

    function KurangJumlahStokBuku($where)
    {
        $this->db->where('id_peminjaman', $where);
        $this->db->set('jumlah', 'jumlah-1', FALSE);
        return $this->db->update("peminjaman");
    }

    function KurangSemuaJumlahStokBuku($where, $data)
    {
        $this->db->where('id_peminjaman', $where);
        return $this->db->update("peminjaman", $data);
    }

    function ubahStatusPeminjamanDetail($where, $data)
    {
        $this->db->where($where);
        return $this->db->update("peminjaman_detail", $data);
    }

    function ubahStatusBuku($where, $data)
    {
        $this->db->where('id_buku',$where);
        return $this->db->update("buku", $data);
    }

    function UpdateStatusBukuPinjam($where, $data)
    {
        $this->db->where($where);
        return $this->db->update("peminjaman",$data);
    }

    function InsertPengembalian($data)
    {
        return $this->db->insert("pengembalian",$data);
    }

    function updatePengembalian($where, $data)
    {
        $this->db->where($where);
        return $this->db->update("pengembalian",$data);
    }

    function cekPengembalian($where)
    {
        $this->db->where($where);
        return $this->db->get("pengembalian");
    }

    function jmhPengunjungperbulan($tgl){
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->like('tgl_pinjam',$tgl);

        $query = $this->db->get();
        $data = $query->num_rows();
        return $data;
    }


}