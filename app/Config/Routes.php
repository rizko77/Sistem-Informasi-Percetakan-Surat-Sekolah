<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//admin
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginCheck', 'Auth::loginCheck');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/', 'User::index');
$routes->get('siswa', 'User::siswa');
$routes->get('buat_surat/(:any)', 'User::buat_surat/$1');
$routes->get('surat_siswa/(:any)', 'User::surat_siswa/$1');
$routes->post('simpan_laporan', 'User::simpan_laporan');
$routes->get('cetak_pdf', 'User::cetak_pdf');
$routes->get('buat_surat/(:segment)', 'User::buat_surat/$1');
$routes->post('simpan_surat', 'User::simpan_surat');

$routes->match(['get', 'post'], 'buatSurat', 'Siswa::buatSurat');
$routes->get('cetakPDF/(:num)', 'User::cetakPDF/$1');
$routes->get('cetakPDF/(:num)', 'Siswa::cetakPDF/$1');
$routes->get('cetakPDFSiswa/(:num)', 'User::cetakPDFSiswa/$1');
$routes->get('suratsiswa_pdf', 'User::cetakPDF');
$routes->get('cetakPDFSiswa/(:any)', 'Buat_surat::cetakPDFSiswa/$1');
$routes->post('cetakPDF', 'User::cetakPDF');

//guru
$routes->get('guru', 'User::guru');
$routes->get('buat_surat_guru/(:any)', 'User::buat_surat_guru/$1');
$routes->get('surat_guru/(:any)', 'User::surat_guru/$1');
$routes->post('simpan_laporan', 'User::simpan_laporan');
$routes->get('cetak_pdf', 'User::cetak_pdf');
$routes->get('buat_surat_guru/(:segment)', 'User::buat_surat_guru/$1');
$routes->post('simpan_surat', 'User::simpan_surat');

$routes->match(['get', 'post'], 'buatSuratGuru', 'Siswa::buatSuratGuru');
$routes->get('cetakPDFGuru/(:num)', 'User::cetakPDFGuru/$1');
$routes->get('cetakPDFGuru/(:num)', 'Siswa::cetakPDFGuru/$1');
$routes->get('cetakPDFGuru/(:num)', 'User::cetakPDFGuru/$1');
$routes->get('suratsiswa_pdf', 'User::cetakPDF');
$routes->get('cetakPDFGuru/(:any)', 'Buat_surat_guru::cetakPDFGuru/$1');
$routes->post('cetakPDFGuru', 'User::cetakPDFGuru');

$routes->get('profil', 'User::profil');

$routes->get('admin/daftarKegiatan', 'Admin::daftarKegiatan');
$routes->post('admin/simpanKegiatan', 'Admin::simpanKegiatan');
$routes->post('admin/updateKegiatan', 'Admin::updateKegiatan');
$routes->delete('admin/hapusKegiatan/(:num)', 'Admin::hapusKegiatan/$1');

$routes->get('admin/daftarKegiatanGuru', 'Admin::daftarKegiatanGuru');
$routes->post('admin/simpanKegiatanGuru', 'Admin::simpanKegiatanGuru');
$routes->post('admin/updateKegiatanGuru', 'Admin::updateKegiatanGuru');
$routes->delete('admin/hapusKegiatanGuru/(:num)', 'Admin::hapusKegiatanGuru/$1');