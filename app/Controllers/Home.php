<?php

namespace App\Controllers;
use App\Models\M_w;
use App\Models\M_m;
date_default_timezone_set('Asia/Jakarta');
class Home extends BaseController
{

	public function checkInternetConnection()
{
    $connected = @fsockopen("www.google.com", 80);
    if ($connected) {
        fclose($connected);
        return true;
    } else {
        return false;
    }
}

public function login(){
    $model = new M_w();
	$where = array('setting.id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where);
	echo view('login',$data);
}
	public function aksi_login()
{
    // Periksa koneksi internet
    if (!$this->checkInternetConnection()) {
        // Jika tidak ada koneksi, cek CAPTCHA gambar
        $captcha_code = $this->request->getPost('captcha_code');
        if (session()->get('captcha_code') !== $captcha_code) {
            session()->setFlashdata('toast_message', 'Invalid CAPTCHA');
            session()->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
    } else {
        // Jika ada koneksi, cek Google reCAPTCHA
        $recaptchaResponse = trim($this->request->getPost('g-recaptcha-response'));
        $secret = '6LeKfiAqAAAAAFkFzd_B9MmWjX76dhdJmJFb6_Vi'; // Ganti dengan Secret Key Anda
        $credential = array(
            'secret' => $secret,
            'response' => $recaptchaResponse
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        curl_close($verify);

        $status = json_decode($response, true);

        if (!$status['success']) {
            session()->setFlashdata('toast_message', 'Captcha validation failed');
            session()->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
    }

    // Proses login seperti biasa
    $u = $this->request->getPost('username');
    $p = $this->request->getPost('password');

    $where = array(
        'username' => $u,
        'password' => md5($p),
        // 'status' => 'verified'
    );
    $model = new M_w;
    $cek = $model->getWhere('user', $where);
    
    if ($cek) {
        $this->log_activitys('User Melakukan Login', $cek->id_user);
        // session()->set('nama', $cek->nama);
        session()->set('id', $cek->id_user);
        session()->set('level', $cek->id_level);
        // session()->set('kelas', $cek->id_kelas);
        return redirect()->to('home/');
    } else {
        session()->setFlashdata('toast_message', 'Invalid login credentials');
        session()->setFlashdata('toast_type', 'danger');
        return redirect()->to('home/login');
    }
}

public function logout()
{
    // $this->log_activity('User Logout');
    session()->destroy();
    return redirect()->to('home/login');
}
	public function index()
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
		$this->log_activity('User Membuka Dashboard');
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where1 = array('delete' => NULL);
		$data['wisata'] = $model->tampilwhere('wisata_batam',$where1);
		echo view('header',$data);
		echo view('menu',$data);
		echo view('dashboard',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function wisata()
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->wisata)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->wisata == 1) {
		$this->log_activity('User Membuka Wisata');
		$model = new M_w();
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		echo view('header',$data);
		echo view('menu',$data);
		echo view('wisata',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function dwisata()
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->wisata)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->wisata == 1) {
		$model = new M_w();
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where1 = array('delete' => NULL);
		$data['wisata'] = $model->tampilwhere('wisata_batam', $where1);
		$this->log_activity('User Membuka Data Wisata');
		echo view('header',$data);
		echo view('menu',$data);
		echo view('dwisata',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function rswisata()
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->wisata)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->wisata == 1) {
		$model = new M_w();
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where1 = "delete IS NOT NULL";
		$data['wisata'] = $model->tampilwhere('wisata_batam', $where1);
		$this->log_activity('User Membuka Data Wisata');
		echo view('header',$data);
		echo view('menu',$data);
		echo view('rswisata',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function duser()
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->wisata)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->wisata == 1) {
		$this->log_activity('User Membuka Data User');
		$model = new M_w();
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where1 = array('delete' => NULL);
		$data['user'] = $model->join2('user', 'level','user.id_level = level.level',$where1);
		echo view('header',$data);
		echo view('menu',$data);
		echo view('duser',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}


    public function cariwisata()
    {
        $model = new M_w();
        $objek = $this->request->getPost('wisata'); // Get the search term

        // Log the search term for debugging
        error_log("Searching for: " . $objek);
		$this->log_activity('User Mencari lokasi' . $objek);
		$this->history('User Mencari lokasi ' . $objek);
        // Return an empty JSON array if the search term is empty
        if (empty($objek)) {
            return $this->response->setJSON([]);
        }
		// $this->history($objek);
        // Call the model method to search for the tourist spot
        $data = $model->cariWisata($objek);

        // Return the data as JSON
        return $this->response->setJSON($data);
    }
	
	public function t_wisata()
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->wisata)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->wisata == 1) {
		$this->log_activity('User Membuka Form Tambah Wisata');
		$model = new M_w();
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		echo view('header',$data);
		echo view('menu',$data);
		echo view('t_wisata',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function aksi_twisata() {
		$model = new M_w();
		$nama = $this->request->getPost('nama_wisata');
		$latitude = $this->request->getPost('latitude');
		$longitude = $this->request->getPost('longitude');
	
	
		// Siapkan data untuk ditambahkan
		$data = array(
			'nama_objek' => $nama,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'delete' => null,
			'create_at' => date('Y-m-d H:i:s'),
			'create_by' => session()->get('id')
		);
		$this->log_activity('User Menambahkan Wisata');
		// Tambahkan data ke dalam tabel 'user'
		$model->tambah('wisata_batam', $data);
		return redirect()->to('home/t_wisata');
	}

	public function wisatabatam($id)
	{
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->wisata)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->wisata == 1) {
		$this->log_activity('User Membuka Wisata');
		$model = new M_w();
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where1 = array('id_wisata' => $id);
		$data['wisata'] = $model->getwhere('wisata_batam', $where1);
		echo view('header',$data);
		echo view('menu',$data);
		echo view('wisatabatam',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function menu(){
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
			return redirect()->to('Home/login');
		}
	if (session()->get('level') == 1 || $data['menu']->data == 1) {
		$model = new M_w();
				
				// Fetch user details
				$where = ['id_user' => session()->get('id')];
				$data['user'] = $model->getwhere('user', $where);
				$where2 = ['level' => '2'];
				$data['menue'] = $model->getwhere('menu', $where2);
				$where3 = ['level' => '3'];
				$data['menuee'] = $model->getwhere('menu', $where3);
				$where4 = ['level' => '4'];
				$data['menueee'] = $model->getwhere('menu', $where4);
				$where = ['id_setting' => 1];
				$data['setting'] = $model->getwhere('setting', $where);
				
				$this->log_activity('User Membuka Manage Menu');
				echo view('header', $data);
				echo view('menu', $data);
				echo view('managemenu', $data);
				echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}
	
	public function updatemenuws()
	{
		$level = 2; // Level 2 untuk Wali Kelas
	
		// Ambil data dari form
		$data = $this->request->getPost();
	
		// Panggil fungsi untuk update menu visibility
		$menuModel = new M_m(); // Pastikan model ini sudah dibuat
		$success = $menuModel->updateMenuVisibility($data, $level);
		// $this->log_activity('User Mengedit Menu');
		if ($success) {
			return redirect()->back()->with('message', 'Menu updated successfully for Wali Kelas');
		} else {
			return redirect()->back()->with('message', 'Failed to update menu');
		}
	}
	
	public function updateMenuks()
	{
		$level = 3; // Level 3 untuk Kepala Sekolah
	
		$data = $this->request->getPost();
		$menuModel = new M_m();
		$success = $menuModel->updateMenuVisibility($data, $level);
		// $this->log_activity('User Mengedit Menu');
		if ($success) {
			return redirect()->back()->with('message', 'Menu updated successfully for Kepala Sekolah');
		} else {
			return redirect()->back()->with('message', 'Failed to update menu');
		}
	}
	
	public function updateMenumd()
	{
		$level = 4; // Level 4 untuk Murid
	
		$data = $this->request->getPost();
		$menuModel = new M_m();
		$success = $menuModel->updateMenuVisibility($data, $level);
		// $this->log_activity('User Mengedit Menu');
		if ($success) {
			return redirect()->back()->with('message', 'Menu updated successfully for Murid');
		} else {
			return redirect()->back()->with('message', 'Failed to update menu');
		}
	}

	public function setting(){
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
			return redirect()->to('Home/login');
		}
	if (session()->get('level') == 1 || $data['menu']->data == 1) {
		$model = new M_w();
		// $where = array('user.id_kelas' => session()->get('kelas'));
		// $data['user'] = $model->joinrow('kelas','user','kelas.id_kelas = user.id_kelas', $where);
		$where = array('setting.id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$this->log_activity('User Membuka Setting');
		echo view('header', $data);
		echo view('menu', $data);
		echo view('setting',$data);
		echo view('footer'); 
	}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_esetting() {
		// Membuat instance model
		$model = new M_w();
	
		// Mengambil data dari request
		$jwebsite = $this->request->getPost('judul_website');
		$t_icon = $this->request->getFile('t_icon');
		$m_icon = $this->request->getFile('m_icon');
		$id = $this->request->getPost('id');
	
		// Menentukan kondisi where untuk pembaruan
		$where = array('id_setting' => $id);
	
		// Menyiapkan array data dengan 'judul_website'
		$data = array(
			'judul_website' => $jwebsite
		);
	
		// Memeriksa dan menangani file t_icon
		if ($t_icon->isValid() && !$t_icon->hasMoved()) {
			$foto_t_icon = $t_icon->getName(); // Mendapatkan nama file
			$t_icon->move(ROOTPATH . 'public/images/', $foto_t_icon);  // Memindahkan file ke direktori tujuan
			$data['tab_icon'] = $foto_t_icon;  // Menambahkan nama file ke array data
		} else {
			// Jika file tidak valid, log pesan error
			log_message('error', 'File t_icon tidak valid atau telah dipindahkan. Nama file: ' . $t_icon->getName());
		}
	
		// Memeriksa dan menangani file m_icon
		if ($m_icon->isValid() && !$m_icon->hasMoved()) {
			$foto_m_icon = $m_icon->getName(); // Mendapatkan nama file
			$m_icon->move(ROOTPATH . 'public/images/', $foto_m_icon);  // Memindahkan file ke direktori tujuan
			$data['menu_icon'] = $foto_m_icon;  // Menambahkan nama file ke array data
		} else {
			// Jika file tidak valid, log pesan error
			log_message('error', 'File m_icon tidak valid atau telah dipindahkan. Nama file: ' . $m_icon->getName());
		}
	
		// Menambahkan aktivitas log
		$this->log_activity('User Mengedit Setting');
	
		// Melakukan pembaruan data di database
		$update_result = $model->edit('setting', $data, $where);
	
		// Mengecek hasil update
		if ($update_result) {
			log_message('info', 'Update berhasil untuk ID: ' . $id);
		} else {
			log_message('error', 'Update gagal untuk ID: ' . $id);
		}
	
		// Mengarahkan pengguna ke halaman pengaturan
		return redirect()->to('home/setting');
	}
	

	private function log_activity($activity)
    {
		$model = new M_w();
        $data = [
            'id_user'    => session()->get('id'),
            'activity'   => $activity,
			'timestamp' => date('Y-m-d H:i:s'),
			'delete' => Null
        ];

        $model->tambah('activity', $data);
    }

	private function log_activitys($activity, $id)
    {
		$model = new M_w();
        $data = [
            'id_user'    => $id,
            'activity'   => $activity,
			'timestamp' => date('Y-m-d H:i:s'),
			'delete' => Null
        ];

        $model->tambah('activity', $data);
    }

	private function history($activity)
    {
		$model = new M_w();
        $data = [
            'id_user'    => session()->get('id'),
            'search'   => $activity,
			'create_at' => date('Y-m-d H:i:s'),
			'create_by' => session()->get('id')
        ];

        $model->tambah('history', $data);
    }
    private function updatelog($update,$table)
    {
		$model = new M_w();
        $data = [
            'id_user'    => session()->get('id'),
            'updated'   => $update,
			'timestamp' => date('Y-m-d H:i:s'),
			'table' => $table
        ];

        $model->tambah('updatelog', $data);
    }

    public function userlog(){
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->website == 1) {
		$model = new M_w();
		$this->log_activity('User membuka view userlog');
		$where = array('id_user' => session()->get('id'));
		$data['dua'] = $model->getwhere('user', $where);
		$where1 = array('activity.delete' => Null);
		$data['satu'] = $model->join2('activity','user','activity.id_user = user.id_user',$where1);
		$data['users'] = $model->tampil('user');
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		echo view('header',$data);
		echo view('menu',$data);
		echo view('userlog',$data);
		echo view('footer');
	} else{
		return redirect()->to('home/login');
	}
	}

    public function filteruserlog()
    {
		if (session()->get('level') == 1) {
        // Ambil parameter tanggal dari query string
        $id = $this->request->getGet('id_user');


        // Set tanggal default jika tidak ada filter
        if (!$id) {
            $id = []; // Atau tanggal default yang sesuai
        }


        // Panggil model untuk mendapatkan data yang difilter
        $model = new M_w(); // Ganti dengan nama model Anda
		$where = array('id_user' => session()->get('id'));
		$data['dua'] = $model->getwhere('user', $where);
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where2 = array('user.id_user' => $id);
		$where1 = array('activity.delete' => null);
        $data['satu'] = $model->joinwhere2('activity','user','activity.id_user = user.id_user',$where1,$where2);
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		$data['users'] = $model->tampil('user');
       
        // Load view dengan data yang difilter
        echo view('header',$data);
		echo view('menu',$data);
		echo view('userlog',$data);
		echo view('footer');
	} elseif(session()->get('level') == 2||session()->get('level') == 3) {
		return redirect()->to('Home/notfound');
	}else{
		return redirect()->to('home/login');
	}
    }

    public function huserlog($id)
	{
		$model = new M_w();
		$where = array('id_activity' => $id);
		$model->hapus('activity', $where);
		// $this->log_activity('User Menghapus data activity');

		return redirect()->to('Home/userlog');
	}

	public function user(){
		$model = new M_w();
			$where1 = array('level' =>session()->get('level'));
			$data['menu'] = $model->getwhere('menu', $where1);
			if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
				return redirect()->to('Home/login');
			}
		if (session()->get('level') == 1 || $data['menu']->data == 1) {
			$this->log_activity('User Membuka View User');
			$model = new M_w();
			$where1 = array('user.delete' => Null);
			$data['satu'] = $model->joinresultinner('user','level','user.id_level = level.id_level',$where1);
			$where = array('setting.id_setting' => 1);
			$data['setting'] = $model->getwhere('setting', $where);
			echo view('header', $data);
			echo view('menu', $data);
			echo view('user',$data);
			echo view('footer'); 
		}else{
			return redirect()->to('home/login');
		}
	
	}

	public function rsuser(){
		$model = new M_w();
			$where1 = array('level' =>session()->get('level'));
			$data['menu'] = $model->getwhere('menu', $where1);
			if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
				return redirect()->to('Home/login');
			}
		if (session()->get('level') == 1 || $data['menu']->data == 1) {
			$this->log_activity('User Membuka View RestoreUser');
			$model = new M_w();
			$where1 = "delete IS NOT NULL";
			$data['satu'] = $model->joinresultinner('user','level','user.id_level = level.id_level',$where1);
			$where = array('setting.id_setting' => 1);
			$data['setting'] = $model->getwhere('setting', $where);
			echo view('header', $data);
			echo view('menu', $data);
			echo view('rsuser',$data);
			echo view('footer'); 
		}else{
			return redirect()->to('home/login');
		}
	
	}

	public function t_user(){
		$model = new M_w();
			$where1 = array('level' =>session()->get('level'));
			$data['menu'] = $model->getwhere('menu', $where1);
			if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
				return redirect()->to('Home/login');
			}
			if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
			$model = new M_w();
			$this->log_activity('User Membuka Form Tambah User');
			$where = array('setting.id_setting' => 1);
			$data['setting'] = $model->getwhere('setting', $where);
			$data['level'] = $model->tampil('level');
			echo view('header', $data);
			echo view('menu', $data);
			echo view('t_user',$data);
			echo view('footer');
		} else {
			return redirect()->to('home/login');
		}
	}

	public function aksi_tuser() {
		$model = new M_w();
		$uploadedFile = $this->request->getFile('image');
		$username = $this->request->getPost('username');
		$level = $this->request->getPost('level');
	
	
		// Atur nama foto
		if ($uploadedFile->getName()) {
			$foto = $uploadedFile->getName();
			$model->upload($uploadedFile);
		} else {
			$foto = '1.jpg';
		}
	
		// Siapkan data untuk ditambahkan
		$data = array(
			'id_level' => $level,
			'username' => $username,
			'password' => md5('sph'),
			'foto' => $foto,
			'delete' => null
		);
		$this->log_activity('User Menambahkan User');
		// Tambahkan data ke dalam tabel 'user'
		$model->tambah('user', $data);
		return redirect()->to('home/user');
	}

	public function detailuser($id){
		$model = new M_w();
			$where1 = array('level' =>session()->get('level'));
			$data['menu'] = $model->getwhere('menu', $where1);
			if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
				return redirect()->to('Home/login');
			}
		if (session()->get('level') == 1 || $data['menu']->data == 1) {
				$model = new M_w();
				$this->log_activity('User Membuka Detail User');
				$where1 = array('user.delete' => Null);
				$where2 = array('id_user' => $id);
				$data['satu'] = $model->joinrowinnerwhere2('user','level','user.id_level = level.id_level',$where1,$where2);
				$where = array('setting.id_setting' => 1);
				$data['setting'] = $model->getwhere('setting', $where);
				$data['level'] = $model->tampil('level');
				echo view('header', $data);
				echo view('menu', $data);
				echo view('detailuser',$data);
				echo view('footer');
		} else {
			return redirect()->to('home/login');
		}
	}

	public function aksi_euser(){
		$model = new M_w();
		$uploadedFile = $this->request->getfile('image');
		$username = $this->request->getPost('username');
		$id = $this->request->getPost('id');
		$where = array('id_user' => $id);
		if ($uploadedFile->getName()) {
			$foto = $uploadedFile->getName();
			$model->upload1($uploadedFile);
	
			
		$data = array(
			'username' => $username,
			'foto' => $foto,
			'update_by' => session()->get('id'),
			'update_at' => date('Y-m-d H:i:s')
		);
	
		}else{
			$data = array(
				'username' => $username,
				'update_by' => session()->get('id'),
				'update_at' => date('Y-m-d H:i:s')
			);
		}
		
	
			
		$this->log_activity('User Mengedit User');
		$model->edit('user', $data, $where);
		return redirect()->to('home/detailuser/'.$id);
		// print_r($id);
	}

	public function sdelete_user($id)
	{
		$model = new M_w();
		$where = array('id_user' => $id);
		$model->statuschange('user', 'delete', date('Y-m-d H:i:s'), $where);
		$this->log_activity('User Menghapus data User');

		return redirect()->to('Home/user');
	}

	public function rs_user($id)
	{
		$model = new M_w();
		$where = array('id_user' => $id);
		$model->statuschange('user', 'delete', NULL, $where);
		$this->log_activity('User Restore data User');

		return redirect()->to('Home/rsuser');
	}
	public function delete_user($id)
	{
		$model = new M_w();
		$where = array('id_user' => $id);
		$model->hapus('user', $where);
		$this->log_activity('User Menghapus data User');

		return redirect()->to('Home/user');
	}

	public function delete_wisata($id)
	{
		$model = new M_w();
		$where = array('id_wisata' => $id);
		$model->hapus('wisata_batam', $where);
		$this->log_activity('User Menghapus data Wisata');

		return redirect()->to('Home/rswisata');
	}
	public function sdelete_wisata($id)
	{
		$model = new M_w();
		$where = array('id_wisata' => $id);
		$model->statuschange('wisata_batam', 'delete', date('Y-m-d H:i:s'), $where);
		$this->log_activity('User Menghapus data User');

		return redirect()->to('Home/dwisata');
	}

	public function rs_wisata($id)
	{
		$model = new M_w();
		$where = array('id_wisata' => $id);
		$model->statuschange('wisata_batam', 'delete', NULL, $where);
		$this->log_activity('User Restore data User');

		return redirect()->to('Home/rswisata');
	}

	public function profile(){
    
		if (session()->get('level') > 0){
			$model = new M_w();
			$this->log_activity('User Membuka Profile');
			$where1 = array('level' =>session()->get('level'));
			$data['menu'] = $model->getwhere('menu', $where1);
			$data['level'] = $model->tampil('level');
			$where2 = array('id_user' =>session()->get('id'));
			$data['user'] = $model->getwhere('user',$where2);
			$where = array('setting.id_setting' => 1);
			$data['setting'] = $model->getwhere('setting', $where);
			echo view('header', $data);
			echo view('menu', $data);
			echo view('profile',$data);
			echo view('footer');

		} else {
			return redirect()->to('home/login');
		}
	}

	public function aksi_eprofile(){
		$model = new M_w();
		$uploadedFile = $this->request->getfile('image');
		$username = $this->request->getPost('username');
		$id = $this->request->getPost('id');
		$where = array('id_user' => $id);
		if ($uploadedFile->getName()) {
			$foto = $uploadedFile->getName();
			$model->upload1($uploadedFile);
	
			
		$data = array(
			'username' => $username,
			'foto' => $foto,
			'update_by' => session()->get('id'),
			'update_at' => date('Y-m-d H:i:s')
		);
	
		}else{
			$data = array(
				'username' => $username,
				'update_by' => session()->get('id'),
				'update_at' => date('Y-m-d H:i:s')
			);
		}
		
	
			
		$this->log_activity('User Mengedit Profile');
		$model->edit('user', $data, $where);
		return redirect()->to('home/profile');
		// print_r($id);
	}

	public function resetpassword($id) {
		$model = new M_w();
		
		// Define where clause and table details
		$where = array('id_user' => $id);
		
		// Prepare the data array with the new password
		$data = array(
			'password' => md5('sph'),
		);
		$this->log_activity('User Reset Password Ke Default');
		// $this->log_activity('User Reset Password for user with ID ' . $id);
	
		// $this->updatelog('User Update Password to Default for user with ID ' . $id, 'user');
		
		// Reset the password in the database
		$model->edit('user', $data, $where);
		
		// Redirect to the user management page
		return redirect()->to('Home/user');
	}

	public function laporan(){
		$model = new M_w();
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
		if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
			return redirect()->to('Home/login');
		}
		if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
		$this->log_activity('User Membuka View Laporan');
		$model = new M_w();
		$where = array('setting.id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
		$where1 = "view IS NOT NULL";
		$data['kelas'] = $model->joinresult1r('history','user','user.id_user = history.id_user');
		echo view('header', $data);
		echo view('menu', $data);
		echo view('laporan',$data);
		echo view('footer');
	} else {
		return redirect()->to('home/login');
	}
	}

	public function filterTanggal()
    {
		$model = new M_w();
    $where1 = array('level' =>session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where1);
    if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
        return redirect()->to('Home/login');
    }
    if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
    $model = new M_w();
    $where = array('setting.id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where);
    $where1 = "view IS NOT NULL";
        // Ambil parameter tanggal dari query string
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        // Set tanggal default jika tidak ada filter
        if (!$startDate) {
            $startDate = '0000-00-00'; // Atau tanggal default yang sesuai
        }
        if (!$endDate) {
            $endDate = '9999-12-31'; // Atau tanggal default yang sesuai
        }

        // Panggil model untuk mendapatkan data yang difilter
        $model = new M_w(); // Ganti dengan nama model Anda
		$where = array('id_user' => session()->get('id'));
		$data['dua'] = $model->getwhere('user', $where);
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
        $data['kelas'] = $model->joinresult1tanggal(
            'history','user','user.id_user = history.id_user',
            $startDate,
            $endDate
        );
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
        // Load view dengan data yang difilter
        echo view('header',$data);
		echo view('menu',$data);
		echo view('laporan',$data);
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
    }

    public function history_pdf()
    {
		$model = new M_w();
    $where1 = array('level' =>session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where1);
    if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
        return redirect()->to('Home/login');
    }
    if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
    $model = new M_w();
    $this->log_activity('User Membuat Laporan Pdf');
    $where = array('setting.id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where);
    $where1 = "view IS NOT NULL";
        // Ambil parameter tanggal dari query string
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        // Set tanggal default jika tidak ada filter
        if (!$startDate) {
            $startDate = '0000-00-00'; // Atau tanggal default yang sesuai
        }
        if (!$endDate) {
            $endDate = '9999-12-31'; // Atau tanggal default yang sesuai
        }

        // Panggil model untuk mendapatkan data yang difilter
        $model = new M_w(); // Ganti dengan nama model Anda
		$where = array('id_user' => session()->get('id'));
		$data['dua'] = $model->getwhere('user', $where);
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
        $data['kelas'] = $model->joinresult1tanggal(
            'history','user','user.id_user = history.id_user',
            $startDate,
            $endDate
        );
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        // Load view dengan data yang difilter
        return view('laporanpdf', $data);
	}else{
		return redirect()->to('home/login');
	}
    }

    public function history_excel()
    {
		$model = new M_w();
    $where1 = array('level' =>session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where1);
    if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
        return redirect()->to('Home/login');
    }
    if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
    $model = new M_w();
    $this->log_activity('User Membuat Laporan Excel');
    $where = array('setting.id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where);
    $where1 = "view IS NOT NULL";
        // Ambil parameter tanggal dari query string
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        // Set tanggal default jika tidak ada filter
        if (!$startDate) {
            $startDate = '0000-00-00'; // Atau tanggal default yang sesuai
        }
        if (!$endDate) {
            $endDate = '9999-12-31'; // Atau tanggal default yang sesuai
        }

        // Panggil model untuk mendapatkan data yang difilter
        $model = new M_w(); // Ganti dengan nama model Anda
		$where = array('id_user' => session()->get('id'));
		$data['dua'] = $model->getwhere('user', $where);
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
        $data['kelas'] = $model->joinresult1tanggal(
            'history','user','user.id_user = history.id_user',
            $startDate,
            $endDate
        );
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        // Load view dengan data yang difilter
        return view('laporanexcel', $data);
	}else{
		return redirect()->to('home/login');
	}
    }

    public function history_windows()
    {
		$model = new M_w();
    $where1 = array('level' =>session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where1);
    if ($data['menu'] === null || !isset($data['menu']->dashboard)) {
        return redirect()->to('Home/login');
    }
    if (session()->get('level') == 1 || $data['menu']->dashboard == 1) {
    $model = new M_w();
    $this->log_activity('User Membuat Laporan Windows');
    $where = array('setting.id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where);
    $where1 = "view IS NOT NULL";
        // Ambil parameter tanggal dari query string
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        // Set tanggal default jika tidak ada filter
        if (!$startDate) {
            $startDate = '0000-00-00'; // Atau tanggal default yang sesuai
        }
        if (!$endDate) {
            $endDate = '9999-12-31'; // Atau tanggal default yang sesuai
        }

        // Panggil model untuk mendapatkan data yang difilter
        $model = new M_w(); // Ganti dengan nama model Anda
		$where = array('id_user' => session()->get('id'));
		$data['dua'] = $model->getwhere('user', $where);
		$where = array('id_setting' => 1);
		$data['setting'] = $model->getwhere('setting', $where);
        $data['kelas'] = $model->joinresult1tanggal(
            'history','user','user.id_user = history.id_user',
            $startDate,
            $endDate
        );
		$where1 = array('level' =>session()->get('level'));
		$data['menu'] = $model->getwhere('menu', $where1);
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        // Load view dengan data yang difilter
        return view('laporanwindows', $data);
	}else{
		return redirect()->to('home/login');
	}
    }
}