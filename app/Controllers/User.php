<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\KegiatanModel;
use App\Models\KegiatanGuruModel;
use App\Models\LaporanSiswaModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class User extends Controller
{
    public function index()
    {
        // Melacak kunjungan menggunakan session
        $visits = session()->get('beranda_visits') ?? 0;
        session()->set('beranda_visits', $visits + 1);   

        return view('beranda');
    }

    public function siswa()
    {
        $siswaModel = new SiswaModel();
        $nama = $this->request->getGet('nama');
    
        if ($nama) {
            $siswa_list = $siswaModel->like('nama', $nama)->findAll();
        } else {
            $siswa_list = $siswaModel->findAll();
        }
    
        $data['siswa_list'] = $siswa_list;
        echo view('siswa', $data);
    }
    

    public function buat_surat($nis)
    {
        $siswaModel = new SiswaModel();
        $kegiatanModel = new KegiatanModel();
    
        $data['siswa'] = $siswaModel->where('nis', $nis)->first();
        $data['kegiatan_list'] = $kegiatanModel->findAll();
    
        echo view('buat_surat', $data);
    }
    
    public function simpan_surat()
    {
        $laporansiswaModel = new LaporanSiswaModel();
    
        // Proses simpan data laporan dari form
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
    
        $laporansiswaModel->insert($data);
    
        return redirect()->to('/buat_surat/' . $data['nis']);
    }


    public function buatSurat()
    {
        $request = service('request');
        $model = new LaporanModel();
        
        if ($request->getMethod() == 'post') {
            // Proses simpan data laporan dari form
            $data = [
                'nis' => $request->getPost('nis'),
                'nama' => $request->getPost('nama'),
                'kelas' => $request->getPost('kelas'),
                'kegiatan' => $request->getPost('kegiatan'),
                'keterangan' => $request->getPost('keterangan')
            ];

            if ($model->insert($data)) {
                $data['success'] = "Data berhasil disimpan.";
            } else {
                $data['error'] = "Gagal menyimpan data.";
            }
        }

        // Ambil data siswa berdasarkan NIS
        $nis = $request->getPost('nis');
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->where('nis', $nis)->first();
        
        // Ambil semua kegiatan
        $kegiatanModel = new KegiatanModel();
        $data['kegiatan'] = $kegiatanModel->findAll();
        
        echo view('/buat_surat', $data);
    }

    
   

    public function cetakPDF()
    {
        $nis = $this->request->getPost('nis');
        $nama = $this->request->getPost('nama');
        $kelas = $this->request->getPost('kelas');
        $kegiatan = $this->request->getPost('kegiatan');
        $keterangan = $this->request->getPost('keterangan');

        // Jika ingin langsung mencetak PDF tanpa menyimpan ke database
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        // Data untuk ditampilkan di suratsiswa_pdf.php
        $data = [
            'nis' => $nis,
            'nama' => $nama,
            'kelas' => $kelas,
            'kegiatan' => $kegiatan,
            'keterangan' => $keterangan
        ];

        // Render view suratsiswa_pdf.php ke dalam HTML
        $html = view('suratsiswa_pdf', $data);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (Opsional: Simpan ke file dengan `$dompdf->stream('nama_file.pdf')`)
        $dompdf->render();

        // Tampilkan PDF dalam browser
        $dompdf->stream('surat_' . $nis . '.pdf', array("Attachment" => false));
    }

    //Untuk guru
    //Untuk guru
    //Untuk guru
    //Untuk guru
    //Untuk guru
    
    public function guru()
    {
        $guruModel = new GuruModel();
        $nama = $this->request->getGet('nama');
    
        if ($nama) {
            $guru_list = $guruModel->like('nama', $nama)->findAll();
        } else {
            $guru_list = $guruModel->findAll();
        }
    
        $data['guru_list'] = $guru_list;
        echo view('guru', $data);
    }

    public function buat_surat_guru($nip)
    {
        $guruModel = new GuruModel();
        $kegiatanguruModel = new KegiatanGuruModel();
    
        $data['guru'] = $guruModel->where('nip', $nip)->first();
        $data['kegiatan_guru_list'] = $kegiatanguruModel->findAll();
    
        echo view('buat_surat_guru', $data);
    }
    public function simpan_surat_guru()
    {
        $laporanguruModel = new LaporanGuruModel();
    
        // Proses simpan data laporan dari form
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kegiatan_guru' => $this->request->getPost('kegiatan_guru'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
    
        $laporanGuruModel->insert($data);
    
        return redirect()->to('/buat_surat_guru/' . $data['nip']);
    }
    public function buatSuratGuru()
    {
        $request = service('request');
        $model = new LaporanGuruModel();
        
        if ($request->getMethod() == 'post') {
            // Proses simpan data laporan dari form
            $data = [
                'nip' => $request->getPost('nip'),
                'nama' => $request->getPost('nama'),
                'jabatan' => $request->getPost('jabatan'),
                'kegiatan_guru' => $request->getPost('kegiatan_guru'),
                'keterangan' => $request->getPost('keterangan')
            ];
    
            if ($model->insert($data)) {
                $data['success'] = "Data berhasil disimpan.";
            } else {
                $data['error'] = "Gagal menyimpan data.";
            }
        }
    
        // Ambil data guru berdasarkan NIP
        $nip = $request->getPost('nip');
        $guruModel = new GuruModel();
        $data['guru'] = $guruModel->where('nip', $nip)->first();
        
        // Ambil semua kegiatan
        $kegiatanguruModel = new KegiatanGuruModel();
        $data['kegiatan_guru_list'] = $kegiatanguruModel->findAll();
        
        echo view('buat_surat_guru', $data);
    }


    public function cetakPDFGuru()
    {
        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $kegiatan = $this->request->getPost('kegiatan');
        $keterangan = $this->request->getPost('keterangan');

        // Jika ingin langsung mencetak PDF tanpa menyimpan ke database
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        // Data untuk ditampilkan di suratsiswa_pdf.php
        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'jabatan' => $jabatan,
            'kegiatan' => $kegiatan,
            'keterangan' => $keterangan
        ];

        // Render view suratsiswa_pdf.php ke dalam HTML
        $html = view('suratguru_pdf', $data);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (Opsional: Simpan ke file dengan `$dompdf->stream('nama_file.pdf')`)
        $dompdf->render();

        // Tampilkan PDF dalam browser
        $dompdf->stream('surat_' . $nip . '.pdf', array("Attachment" => false));
    }
                
    public function profil()
    {
        echo view('profil');
    }
}
