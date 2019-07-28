<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

//buku
$route['detailBuku/(:any)'] = 'Buku/detailbuku/$1'; //tampil detail buku
$route['editBuku/(:any)'] = 'Buku/detailBukubyID/$1'; //tampil detail jurnal by id
$route['hapusBuku/(:any)'] = 'Buku/hapusbuku/$1'; //hapus buku
$route['daftarBuku'] = 'Buku/daftarBuku'; //tampil daftar buku
$route['LaporanBuku'] = 'Buku/lihatlaporanbuku'; //lihat laporan buku

//jurnal
$route['detailJurnal/(:any)'] = 'Jurnal/detailjurnal/$1'; //tampil detail jurnal
$route['editJurnal/(:any)'] = 'Jurnal/detailJurnalbyID/$1'; //tampil detail jurnal
$route['hapusJurnal/(:any)'] = 'Jurnal/hapusjurnal/$1'; //hapus jurnal by id

//skripsi
$route['hapusSkripsi/(:any)'] = 'Skripsi/hapusskripsi/$1'; //hapus skripsi by id
$route['editSkripsi/(:any)'] = 'Skripsi/detailskripsi/$1'; //edit skripsi by id

//paper
$route['hapusPaper/(:any)/(:any)'] = 'paper/hapuspaper/$1/$2'; //hapus paper by id paper dan id jurnal
$route['editPaper/(:any)/(:any)'] = 'Paper/detailPaper/$1/$2'; //edit paper by id paper dan id jurnal

//peminjaman
$route['RiwayatPeminjaman'] = 'Peminjaman/lihatRiwayatPeminjaman'; //Statistik Peminjaman Buku
$route['DaftarPeminjaman'] = 'Peminjaman/tampil_daftar_peminjaman'; //lihat Daftar Peminjaman
$route['DetailPeminjaman/(:any)'] = 'Peminjaman/detail_peminjaman/$1'; //lihat detail peminjaman

$route['User/aksi_login'] = 'User/aksi_login'; //proses login
$route['login'] = 'User/login'; //halaman login
$route['User/logout'] = 'User/logout'; //proses logout
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
