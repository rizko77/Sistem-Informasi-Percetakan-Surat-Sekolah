<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\SiswaModel;
use App\Models\LaporanModel;
use App\Models\KegiatanModel;
use App\Models\KegiatanGuruModel;
use App\Models\GuruModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Menghitung jumlah siswa, guru, kegiatan
        $siswaModel = new SiswaModel();
        $data['jumlah_siswa'] = count($siswaModel->findAll());

        $guruModel = new GuruModel();
        $data['jumlah_guru'] = count($guruModel->findAll());

        $kegiatanModel = new KegiatanModel();
        $data['jumlah_kegiatan'] = count($kegiatanModel->findAll());

        $kegiatanguruModel = new KegiatanGuruModel();
        $data['jumlah_kegiatan_guru'] = count($kegiatanguruModel->findAll());

        // Mengambil jumlah kunjungan beranda
        $visits = session()->get('beranda_visits') ?? 0;
        $data['jumlah_kunjungan_beranda'] = $visits;

        echo view('template/header');
        echo view('admin/dashboard', $data);
        echo view('template/footer');
    }


    // CRUD untuk Siswa
    public function daftarSiswa()
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->findAll();

        echo view('template/header');
        echo view('admin/daftar_siswa', $data);
        echo view('template/footer');
    }

    public function simpanSiswa()
    {
        $siswaModel = new SiswaModel();

        // Proses simpan data siswa dari form
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ];

        $siswaModel->insert($data);

        return redirect()->to('/admin/daftarSiswa');
    }

    public function editSiswa($id)
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->find($id);

        echo view('template/header');
        echo view('admin/daftar_siswa', $data); // Menggunakan kembali view daftar_siswa untuk form edit
        echo view('template/footer');
    }

    public function updateSiswa()
    {
        $siswaModel = new SiswaModel();

        // Proses update data siswa dari form
        $id = $this->request->getPost('id');
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ];

        $siswaModel->update($id, $data);

        return redirect()->to('/admin/daftarSiswa');
    }

    public function hapusSiswa($id)
    {
        $siswaModel = new SiswaModel();
        $siswaModel->delete($id);

        return redirect()->to('/admin/daftarSiswa');
    }

    





    // CRUD untuk Guru
    public function daftarGuru()
    {
        $guruModel = new GuruModel();
        $data['guru'] = $guruModel->findAll();

        echo view('template/header');
        echo view('admin/daftar_guru', $data);
        echo view('template/footer');
    }

    public function simpanGuru()
    {
        $guruModel = new GuruModel();

        // Proses simpan data siswa dari form
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ];

        $guruModel->insert($data);

        return redirect()->to('/admin/daftarGuru');
    }

    public function editGuru($id)
    {
        $guruModel = new GuruModel();
        $data['guru'] = $guruModel->find($id);

        echo view('template/header');
        echo view('admin/daftar_guru', $data); // Menggunakan kembali view daftar_siswa untuk form edit
        echo view('template/footer');
    }

    public function updateGuru()
    {
        $guruModel = new GuruModel();

        // Proses update data siswa dari form
        $id = $this->request->getPost('id');
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ];

        $guruModel->update($id, $data);

        return redirect()->to('/admin/daftarGuru');
    }

    public function hapusGuru($id)
    {
        $guruModel = new GuruModel();
        $guruModel->delete($id);

        return redirect()->to('/admin/daftarGuru');
    }



    // CRUD untuk Laporan
    public function daftarLaporan()
    {

        echo view('template/header');
        echo view('admin/daftar_laporan');
        echo view('template/footer');
    }





    // CRUD untuk Kegiatan
    public function daftarKegiatan()
    {
        $kegiatanModel = new KegiatanModel();
        $data['kegiatan'] = $kegiatanModel->findAll();

        echo view('template/header');
        echo view('admin/daftar_kegiatan', $data);
        echo view('template/footer');
    }
    
    public function simpanKegiatan()
    {
        $model = new KegiatanModel();
        $data = [
            'judul' => $this->request->getPost('judul')
        ];
        $model->insert($data);

        return redirect()->to('/admin/daftarKegiatan');
    }

    public function updateKegiatan()
    {
        $model = new KegiatanModel();
        $id = $this->request->getPost('id');
        $data = [
            'judul' => $this->request->getPost('judul')
        ];
        $model->update($id, $data);

        return redirect()->to('/admin/daftarKegiatan');
    }

    public function hapusKegiatan($id)
    {
        $kegiatanModel = new KegiatanModel();
        $kegiatanModel->delete($id);

        // Optional: Handle response, e.g., return JSON response
        return json_encode(['status' => 'success']);
    }



    // CRUD untuk Kegiatan Guru

    public function daftarKegiatanGuru()
    {
        $kegiatanguruModel = new KegiatanGuruModel();
        $data['kegiatan_guru'] = $kegiatanguruModel->findAll();

        echo view('template/header');
        echo view('admin/daftar_kegiatan_guru', $data);
        echo view('template/footer');
    }
    
    public function simpanKegiatanGuru()
    {
        $model = new KegiatanGuruModel();
        $data = [
            'judul' => $this->request->getPost('judul')
        ];
        $model->insert($data);

        return redirect()->to('/admin/daftarKegiatanGuru');
    }

    public function updateKegiatanGuru()
    {
        $model = new KegiatanGuruModel();
        $id = $this->request->getPost('id');
        $data = [
            'judul' => $this->request->getPost('judul')
        ];
        $model->update($id, $data);

        return redirect()->to('/admin/daftarKegiatanGuru');
    }

    public function hapusKegiatanGuru($id)
    {
        $kegiatanguruModel = new KegiatanGuruModel();

        // Pastikan melakukan penghapusan dengan klausa WHERE
        $kegiatanguruModel->where('id', $id)->delete();

        // Redirect atau kembali ke halaman daftar kegiatan setelah penghapusan
        return redirect()->to('/admin/daftarKegiatanGuru');
    }
}
