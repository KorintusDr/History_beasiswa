<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/register'] = 'auth/register'; 

$route['petugas/dashboard'] = 'dashboard'; 

$route['petugas/user'] = 'user'; 
$route['petugas/user/tambah'] = 'user/tambah'; 
$route['petugas/user/edit/(:num)'] = 'user/edit/$1'; 
$route['petugas/user/delete/(:num)'] = 'user/delete/$1'; 


$route['petugas/beasiswa'] = 'Beasiswa';
$route['petugas/beasiswa/tambah'] = 'Beasiswa/tambah'; 
$route['petugas/beasiswa/edit/(:num)'] = 'Beasiswa/edit/$1'; 
$route['petugas/beasiswa/hapus/(:num)'] = 'Beasiswa/hapus/$1'; 


$route['petugas/agama'] = 'Agama'; 
$route['petugas/agama/tambah'] = 'Agama/tambah';
$route['petugas/agama/edit/(:num)'] = 'Agama/edit/$1'; 
$route['petugas/agama/hapus/(:num)'] = 'Agama/hapus/$1';


$route['pekerjaan'] = 'pekerjaan'; 
$route['pekerjaan/tambah'] = 'pekerjaan/tambah'; 
$route['pekerjaan/edit'] = 'pekerjaan/edit'; 
$route['pekerjaan/hapus/(:num)'] = 'pekerjaan/hapus/$1';


$route['penghasilan'] = 'penghasilan';
$route['penghasilan/tambah'] = 'penghasilan/tambah'; 
$route['penghasilan/edit'] = 'penghasilan/edit';
$route['penghasilan/hapus/(:num)'] = 'penghasilan/hapus/$1'; 


$route['universitas'] = 'universitas';
$route['universitas/tambah'] = 'universitas/tambah';
$route['universitas/edit/(:num)'] = 'universitas/edit/$1';
$route['universitas/hapus/(:num)'] = 'universitas/hapus/$1';


$route['fakultas'] = 'fakultas'; 
$route['fakultas/tambah'] = 'fakultas/tambah'; 
$route['fakultas/edit/(:num)'] = 'fakultas/edit/$1'; 
$route['fakultas/hapus/(:num)'] = 'fakultas/hapus/$1'; 


$route['programstudi'] = 'ProgramStudi'; 
$route['programstudi/tambah'] = 'ProgramStudi/tambah'; 
$route['programstudi/edit'] = 'ProgramStudi/edit'; 
$route['programstudi/hapus/(:num)'] = 'ProgramStudi/hapus/$1'; 


$route['pengajuan'] = 'pengajuan';
$route['pengajuan/tambah'] = 'pengajuan/tambah'; 
$route['pengajuan/edit/(:num)'] = 'pengajuan/edit/$1'; 
$route['pengajuan/hapus/(:num)'] = 'pengajuan/hapus/$1';
$route['pengajuan/detail/(:num)'] = 'pengajuan/detail/$1';
$route['pengajuan/ubah_status/(:num)'] = 'pengajuan/ubah_status/$1'; 


$route['petugas/pencairan'] = 'Pencairan/index'; 
$route['petugas/pencairan/tambah'] = 'Pencairan/tambah';  
$route['petugas/pencairan/get_mahasiswa_data'] = 'Pencairan/get_mahasiswa_data'; 



$route['pimpinan/dashboard'] = 'dashboard'; 
$route['pengajuan'] = 'pengajuan';
$route['pencairan'] = 'pencairan'; 


$route['mahasiswa/dashboard'] = 'dashboard';
$route['pencairan'] = 'pencairan'; 

// $route['mahasiswa/pengajuan'] = 'pengajuan';
// $route['mahasiswa/pengajuan/tambah'] = 'pengajuan/tambah'; 
// $route['mahasiswa/pengajuan/edit/(:num)'] = 'pengajuan/edit/$1';
// $route['mahasiswa/pengajuan/detail/(:num)'] = 'pengajuan/detail/$1'; 

// $route['penggunaan'] = 'Penggunaan';
// $route['penggunaan/tambah'] = 'Penggunaan/tambah';
// $route['penggunaan/edit/(:num)'] = 'Penggunaan/edit/$1';
// $route['penggunaan/hapus/(:num)'] = 'Penggunaan/hapus/$1';


$route['mahasiswa/penggunaan'] = 'penggunaan'; 
$route['mahasiswa/penggunaan/edit/(:num)'] = 'Penggunaan/edit/$1'; 
$route['petugas/penggunaan'] = 'penggunaan'; 
$route['pimpinan/penggunaan'] = 'penggunaan';