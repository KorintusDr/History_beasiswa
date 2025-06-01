<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Pengajuan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Pengajuan_model');
        $this->load->model('Agama_model');
        $this->load->model('Universitas_model');
        $this->load->model('Fakultas_model');
        $this->load->model('ProgramStudi_model');
        $this->load->model('Beasiswa_model');
        $this->load->model('Penghasilan_model');
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $role = $this->session->userdata('role');
        $id_user = $this->session->userdata('id_user');

        $data['title'] = 'Data Pengajuan';
        
        if ($role === 'petugas') {
            $data['pengajuan'] = $this->Pengajuan_model->get_all_pengajuan(); 
            $view = 'petugas/pengajuan/pengajuan'; 
        } elseif ($role === 'pimpinan') {
            $data['pengajuan'] = $this->Pengajuan_model->get_all_pengajuan(); 
            $view = 'pimpinan/pengajuan/pengajuan';
        } elseif ($role === 'mahasiswa') {
            $data['title'] = 'Data Pengajuan Saya';
            $data['pengajuan'] = $this->Pengajuan_model->get_pengajuan_by_user($id_user); 
            $view = 'mahasiswa/pengajuan/pengajuan'; 
        } else {
            redirect('auth'); 
            return; 
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', ['user' => $role]);
        $this->load->view($view, $data); 
        $this->load->view('layout/footer');
    }

    public function tambah() {

            $role = $this->session->userdata('role');
            $id_user = $this->session->userdata('id_user');

            if ($role === 'mahasiswa') {
                if ($this->Pengajuan_model->isPengajuanExists($id_user)) {
                    $this->session->set_flashdata('error', 'Anda sudah menambahkan pengajuan. Anda tidak bisa menambahkannya lagi.');
                    redirect('pengajuan');
                    return;
                }
            }
        
        if ($this->input->post()) {

            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nim' => $this->input->post('nim'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_ktp' => $this->input->post('no_ktp'),
                'id_agama' => $this->input->post('id_agama'),
                'kode_pos' => $this->input->post('kode_pos'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'id_universitas' => $this->input->post('id_universitas'),
                'id_fakultas' => $this->input->post('id_fakultas'),
                'id_program_studi' => $this->input->post('id_program_studi'),
                'id_beasiswa' => $this->input->post('id_beasiswa'),
                'semester' => $this->input->post('semester'),
                'ipk' => $this->input->post('ipk'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'notlp_ortu' => $this->input->post('notlp_ortu'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'id_penghasilan' => $this->input->post('id_penghasilan'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
                'id_user' => $id_user,
            );
    
            $upload_paths = [
                'ktp' => './uploads/ktp/',
                'kk' => './uploads/kk/',
                'kpm' => './uploads/kpm/',
                'foto' => './uploads/foto/',
                'krs' => './uploads/krs/',
                'transkip_nilai' => './uploads/transkip_nilai/',
                'surat_aktif_kuliah' => './uploads/surat_aktif_kuliah/',
                'surat_rekomendasi' => './uploads/surat_rekomendasi/',
                'surat_pernyataan' => './uploads/surat_pernyataan/'
            ];
    
            foreach ($upload_paths as $field => $path) {
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                $config['upload_path'] = $path;
                $config['allowed_types'] = ($field === 'krs' || $field === 'transkip_nilai' || $field === 'surat_aktif_kuliah' || $field === 'surat_rekomendasi' || $field === 'surat_pernyataan') ? 'pdf' : 'jpg|jpeg|png';
                $config['max_size'] = 2048; 
                $this->upload->initialize($config);

                if ($this->upload->do_upload($field)) {
                    $data[$field] = $this->upload->data('file_name'); 
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('pengajuan/tambah');
                    return;
                }
            }

            if ($this->Pengajuan_model->insertPengajuan($data)) {
                $this->session->set_flashdata('success', 'Pengajuan berhasil ditambahkan.');
                redirect('pengajuan');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan pengajuan.');
            }
        }

        $data['title'] = 'Tambah Pengajuan Beasiswa';

        $data['agama'] = $this->Agama_model->get_all_agama();
        $data['universitas'] = $this->Universitas_model->get_all_universitas();
        $data['fakultas'] = $this->Fakultas_model->get_all_fakultas();
        $data['program_studi'] = $this->ProgramStudi_model->get_all_program_studi();
        $data['beasiswa'] = $this->Beasiswa_model->get_all_beasiswa();
        $data['penghasilan'] = $this->Penghasilan_model->get_all_penghasilan();
        $data['pekerjaan'] = $this->Pekerjaan_model->get_all_pekerjaan();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('mahasiswa/pengajuan/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id_pengajuan) {
        $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($id_pengajuan);

        if (!$data['pengajuan']) {
            $this->session->set_flashdata('error', 'Pengajuan tidak ditemukan.');
            redirect('pengajuan');
            return;
        }

        $role = $this->session->userdata('role');
        $id_user = $this->session->userdata('id_user');
    
        if ($this->input->post()) {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nim' => $this->input->post('nim'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_ktp' => $this->input->post('no_ktp'),
                'id_agama' => $this->input->post('id_agama'),
                'kode_pos' => $this->input->post('kode_pos'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'id_universitas' => $this->input->post('id_universitas'),
                'id_fakultas' => $this->input->post('id_fakultas'),
                'id_program_studi' => $this->input->post('id_program_studi'),
                'id_beasiswa' => $this->input->post('id_beasiswa'),
                'semester' => $this->input->post('semester'),
                'ipk' => $this->input->post('ipk'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'notlp_ortu' => $this->input->post('notlp_ortu'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'id_penghasilan' => $this->input->post('id_penghasilan'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
                'id_user' => $id_user,
            ];

            $upload_paths = [
                'ktp' => './uploads/ktp/',
                'kk' => './uploads/kk/',
                'kpm' => './uploads/kpm/',
                'foto' => './uploads/foto/',
                'krs' => './uploads/krs/',
                'transkip_nilai' => './uploads/transkip_nilai/',
                'surat_aktif_kuliah' => './uploads/surat_aktif_kuliah/',
                'surat_rekomendasi' => './uploads/surat_rekomendasi/',
                'surat_pernyataan' => './uploads/surat_pernyataan/'
            ];
    
            foreach ($upload_paths as $field => $path) {
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
    
                $config['upload_path'] = $path;
                $config['allowed_types'] = ($field === 'krs' || $field === 'transkip_nilai' || $field === 'surat_aktif_kuliah' || $field === 'surat_rekomendasi' || $field === 'surat_pernyataan') ? 'pdf' : 'jpg|jpeg|png';
                $config['max_size'] = 2048; 
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload($field)) {
                    $data[$field] = $this->upload->data('file_name'); 
                } else {

                    $data[$field] = isset($data['pengajuan']->$field) ? $data['pengajuan']->$field : null;
                    if ($this->upload->display_errors()) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
            }

            if ($this->Pengajuan_model->updatePengajuan($id_pengajuan, $data)) {
                $this->session->set_flashdata('success', 'Pengajuan berhasil diperbarui.');
                redirect('pengajuan');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui pengajuan.');
            }
        }

        $data['title'] = 'Edit Pengajuan Beasiswa';

        $data['agama'] = $this->Agama_model->get_all_agama();
        $data['universitas'] = $this->Universitas_model->get_all_universitas();
        $data['fakultas'] = $this->Fakultas_model->get_all_fakultas();
        $data['program_studi'] = $this->ProgramStudi_model->get_all_program_studi();
        $data['beasiswa'] = $this->Beasiswa_model->get_all_beasiswa();
        $data['penghasilan'] = $this->Penghasilan_model->get_all_penghasilan();
        $data['pekerjaan'] = $this->Pekerjaan_model->get_all_pekerjaan();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('mahasiswa/pengajuan/edit', $data);
        $this->load->view('layout/footer');
    }
    
    public function verifikasi() {

        $id = $this->input->post('id_pengajuan');
        $status = $this->input->post('status');

        if ($this->Pengajuan_model->update_status($id, $status)) {
            $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui.');
        } else {

            $this->session->set_flashdata('error', 'Gagal memperbarui status pengajuan.');
        }

        redirect('pengajuan');
    }

    public function detail($id_pengajuan) {
        $data_pengajuan = $this->Pengajuan_model->getPengajuanById($id_pengajuan);
    
        if ($data_pengajuan) {
            $data = array(
                'nama_lengkap' => $data_pengajuan->nama_lengkap,
                'nim' => $data_pengajuan->nim,
                'jenis_kelamin' => $data_pengajuan->jenis_kelamin,
                'tempat_lahir' => $data_pengajuan->tempat_lahir,
                'tanggal_lahir' => $data_pengajuan->tanggal_lahir,
                'no_ktp' => $data_pengajuan->no_ktp,
                'id_agama' => $data_pengajuan->id_agama,
                'kode_pos' => $data_pengajuan->kode_pos,
                'no_telepon' => $data_pengajuan->no_telepon,
                'email' => $data_pengajuan->email,
                'alamat' => $data_pengajuan->alamat,
                'id_universitas' => $data_pengajuan->id_universitas,
                'id_fakultas' => $data_pengajuan->id_fakultas,
                'id_program_studi' => $data_pengajuan->id_program_studi,
                'id_beasiswa' => $data_pengajuan->id_beasiswa,
                'semester' => $data_pengajuan->semester,
                'ipk' => $data_pengajuan->ipk,
                'nama_ayah' => $data_pengajuan->nama_ayah,
                'nama_ibu' => $data_pengajuan->nama_ibu,
                'notlp_ortu' => $data_pengajuan->notlp_ortu,
                'pekerjaan_ayah' => $data_pengajuan->pekerjaan_ayah,
                'pekerjaan_ibu' => $data_pengajuan->pekerjaan_ibu,
                'id_penghasilan' => $data_pengajuan->id_penghasilan,
                'alamat_ortu' => $data_pengajuan->alamat_ortu,
                'foto' => $data_pengajuan->foto,
                'ktp' => $data_pengajuan->ktp,
                'kk' => $data_pengajuan->kk,
                'kpm' => $data_pengajuan->kpm,
                'krs' => $data_pengajuan->krs,
                'transkip_nilai' => $data_pengajuan->transkip_nilai,
                'surat_aktif_kuliah' => $data_pengajuan->surat_aktif_kuliah,
                'surat_rekomendasi' => $data_pengajuan->surat_rekomendasi,
                'surat_pernyataan' => $data_pengajuan->surat_pernyataan,
            );
    
            $data['title'] = 'Detail Pengajuan Beasiswa';
            $data['agama'] = $this->Agama_model->get_all_agama();
            $data['universitas'] = $this->Universitas_model->get_all_universitas();
            $data['fakultas'] = $this->Fakultas_model->get_all_fakultas();
            $data['program_studi'] = $this->ProgramStudi_model->get_all_program_studi();
            $data['beasiswa'] = $this->Beasiswa_model->get_all_beasiswa();
            $data['penghasilan'] = $this->Penghasilan_model->get_all_penghasilan();
            $data['pekerjaan'] = $this->Pekerjaan_model->get_all_pekerjaan();

            $role = $this->session->userdata('role');
            
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');

            if ($role == 'petugas') {
                $this->load->view('petugas/pengajuan/detail', $data);
            } elseif ($role == 'mahasiswa') {
                $this->load->view('mahasiswa/pengajuan/detail', $data);
            } elseif ($role == 'pimpinan') {
                $this->load->view('pimpinan/pengajuan/detail', $data);
            } else {

                $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
                redirect('pengajuan');
            }
  
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('error', 'Data pengajuan tidak ditemukan.');
            redirect('pengajuan'); 
        }
    }
    
    public function export_excel() {
        $data['pengajuan'] = $this->Pengajuan_model->get_all_pengajuan();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Foto Mahasiswa')
              ->setCellValue('B1', 'Nama Mahasiswa')
              ->setCellValue('C1', 'Nomor Induk Mahasiswa')
              ->setCellValue('D1', 'Nomor Telepon')
              ->setCellValue('E1', 'Tanggal Pendaftaran')
              ->setCellValue('F1', 'Status Pengajuan');


        $row = 2; 
        foreach ($data['pengajuan'] as $item) {
            $sheet->setCellValue('A' . $row, $item->foto)
                  ->setCellValue('B' . $row, $item->nama_lengkap)
                  ->setCellValue('C' . $row, $item->nim)
                  ->setCellValue('D' . $row, $item->no_telepon)
                  ->setCellValue('E' . $row, $item->tanggal_pendaftaran)
                  ->setCellValue('F' . $row, $item->status_pendaftaran);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_pengajuan.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function export_pdf() {
        $data['pengajuan'] = $this->Pengajuan_model->get_all_pengajuan();

        $dompdf = new Dompdf();

        $html = $this->load->view('petugas/pengajuan/pdf', $data, true);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('data_pengajuan.pdf', array('Attachment' => true));
    }

    public function hapus($id_pengajuan) {

        $data_pengajuan = $this->Pengajuan_model->getPengajuanById($id_pengajuan);

        if ($data_pengajuan) {
            $upload_fields = ['ktp', 'kk', 'kpm', 'foto', 'krs', 'transkip_nilai', 'surat_aktif_kuliah', 'surat_rekomendasi', 'surat_pernyataan'];
            
            foreach ($upload_fields as $field) {
                $file_path = './uploads/' . $field . '/' . $data_pengajuan->$field;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            if ($this->Pengajuan_model->deletePengajuan($id_pengajuan)) {
                $this->session->set_flashdata('success', 'Pengajuan berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus pengajuan.');
            }
        } else {
            $this->session->set_flashdata('error', 'Data pengajuan tidak ditemukan.');
        }
    
        redirect('pengajuan');
    }
}
