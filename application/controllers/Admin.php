<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Laporan_model');
		if ($this->session->userdata('status_login_') != 'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls') {
			redirect('auth');
		}
	}

	public function index()
	{
		$title = $this->session->userdata('level');
		$data['title'] = 'Halaman ' . $title;
		$data['profit'] = $this->Laporan_model->hasil();
		$data['totalproduk'] = $this->db->get('tb_produk')->num_rows();
		$data['totaluser'] = $this->db->get('tb_users')->num_rows();


		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tema/admin/footer');
	}

	public function produk()
	{
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->Admin_model->data_produk();


		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/produk', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_produk()
	{
		$data['title'] = 'Tambah Produk Baru';


		$data['kat'] = $this->Admin_model->data_kategori();
		$data['rk'] = '';
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('harga-produk', 'harga-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harga harus berupa angka'
		]);
		$this->form_validation->set_rules('stok-produk', 'stok-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('berat-produk', 'berat-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harus berupa angka'
		]);
		$this->form_validation->set_rules('deskripsi-produk', 'deskripsi-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('kategori-produk', 'kategori-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_produk', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->simpan_produk();
			$this->session->set_flashdata('flash', 'Produk baru berhasil ditambahkan');
			redirect('admin/produk');
		}
	}

	public function edit_produk($id)
	{
		$data['title'] = 'Edit Produk';


		$data['produkid'] = $this->Admin_model->produkbyid($id);
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('harga-produk', 'harga-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harga harus berupa angka'
		]);
		$this->form_validation->set_rules('stok-produk', 'stok-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('berat-produk', 'berat-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harus berupa angka'
		]);
		$this->form_validation->set_rules('deskripsi-produk', 'deskripsi-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_produk', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->ubah_produk();
			$this->session->set_flashdata('flash', 'Produk berhasil diperbaharui');
			redirect('admin/produk');
		}
	}

	public function hapus_produk($id)
	{
		$this->Admin_model->cek_aks();
		$this->Admin_model->del_produk($id);
		$this->session->set_flashdata('flash', 'Produk berhasil dihapus');
		redirect('admin/produk');
	}

	public function kategori()
	{
		$data['title'] = 'Data Kategori';


		$data['kategori'] = $this->Admin_model->data_kategori();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_kategori()
	{
		$data['title'] = 'Tambah Kategori';

		$data['kat'] = $this->Admin_model->data_kategori();
		$data['rk'] = '';
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('url', 'url', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_kategori', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'kategori'				=>	$this->input->post('kategori'),
				'url'				=>	$this->input->post('url'),
			);

			$this->db->insert('tb_kategori', $data);
			$this->session->set_flashdata('flash', 'Kategori berhasil ditambahkan');
			redirect('admin/kategori');
		}
	}

	public function edit_kategori($id)
	{
		$data['title'] = 'Edit Kategori';


		$data['data'] = $this->Admin_model->getrow(array('id_kategori' => $id), 'tb_kategori');
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_kategori', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$simpan = [
				'kategori' => $this->input->post('kategori'),
				'url' => $this->input->post('url'),
			];
			$this->db->where('id_kategori', $id);
			$this->db->update('tb_kategori', $simpan);
			$this->session->set_flashdata('flash', 'Kategori berhasil diperbaharui');
			redirect('admin/kategori');
		}
	}

	public function hapus_kategori($id)
	{
		$this->Admin_model->cek_aks();
		$this->Admin_model->del_kategori($id);
		$this->session->set_flashdata('flash', 'Kategori berhasil dihapus');
		redirect('admin/kategori');
	}

	public function transaksi()
	{
		$data['title'] = 'Data Transaksi';

		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('tema/admin/footer');
	}


	public function konfirmasi_transaksi()
	{
		$data = [
			'transaksi_status' => $this->input->post('transaksi_status'),
			'noresi' => $this->input->post('noresi'),
		];
		$this->db->where('transaksi_id', $this->input->post('idtransaksi'));
		$this->db->update('tb_transaksi', $data);
		$this->session->set_flashdata('flash', 'Transaksi berhasil dikonfirmasi');
		redirect('admin/detail_transaksi/' . $this->input->post('idtransaksi'));
	}

	public function detail_transaksi($id)
	{
		$data['title'] = 'Ubah Status Transaksi';
		$data['dtransaksi'] = $this->Admin_model->transaksibyid($id);
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/detail_transaksi', $data);
		$this->load->view('tema/admin/footer');
	}

	public function cetak_invoice($id)
	{
		$data['title'] = 'Invoice';


		$data['dtransaksi'] = $this->Admin_model->transaksibyid($id);
		$this->load->view('admin/cetak_invoice', $data);
	}


	public function profil()
	{
		$data['title'] = 'Perbaharui Profil Toko';


		$data['profiltoko'] = $this->Admin_model->profiltoko();
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('email', 'email', 'valid_email', [
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('telp', 'telp', 'required|numeric|min_length[10]|max_length[14]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harus angka',
			'min_length' =>	'Minimal 10 angka',
			'max_length' =>	'Maksimal 14 angka'
		]);
		$this->form_validation->set_rules('telp', 'telp', 'numeric|min_length[10]|max_length[14]', [
			'numeric'	=>	'Harus angka',
			'min_length' =>	'Minimal 10 angka',
			'max_length' =>	'Maksimal 14 angka'
		]);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/profil', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->simpan_profiltoko();
			$this->session->set_flashdata('flash', 'Profil toko berhasil diperbaharui');
			redirect('admin/profil');
		}
	}

	public function member()
	{
		$data['title'] = 'Data Member/Pelanggan';


		$data['member'] = $this->Admin_model->data_member();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('tema/admin/footer');
	}


	public function edit_profil()
	{
		$data['title'] = 'Perbaharui Profil Saya';


		$data['profilsaya'] = $this->Admin_model->profilku();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_profil', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->cek_ganti_profil();
		}
	}

	public function edit_sandi()
	{
		$data['title'] = 'Perbaharui Kata Sandi Saya';


		$this->form_validation->set_rules('sandi2', 'sandi2', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi1', 'sandi1', 'required|matches[sandi2]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi baru harus sama'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_sandi', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_ganti_password();
		}
	}

	public function pengguna()
	{
		$data['title'] = 'Data Pengguna';
		$data['pengguna'] = $this->Admin_model->getresult(array('admin_id !=' => $this->session->userdata('adminid')), 'tb_admin');

		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/pengguna', $data);
		$this->load->view('tema/admin/footer');
	}

	public function penggunatambah()
	{
		$data['title'] = 'Tambah Pengguna Baru';

		$data['rk'] = '';
		$this->form_validation->set_rules('admin_nama', 'admin_nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/penggunatambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$simpan = [
				'admin_username' => $this->input->post('admin_username'),
				'admin_nama' => $this->input->post('admin_nama'),
				'admin_email' => $this->input->post('admin_email'),
				'admin_foto' => 'user.png',
				'level' => 'Admin',
			];
			$this->db->insert('tb_admin', $simpan);
			$this->session->set_flashdata('flash', 'Pengguna baru berhasil ditambahkan');
			redirect('admin/pengguna');
		}
	}

	public function penggunaedit($id)
	{
		$data['title'] = 'Edit Pengguna';

		$data['pengguna'] = $this->Admin_model->getrow(array('admin_id' => $id), 'tb_admin');
		$this->form_validation->set_rules('admin_nama', 'admin_nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/penggunaedit', $data);
			$this->load->view('tema/admin/footer');
		} else {
			if ($this->input->post('admin_sandi') != "") {
				$password = password_hash($this->input->post('admin_sandi'), PASSWORD_DEFAULT);
			} else {
				$password = $this->input->post('passwordlama');
			}
			$simpan = [
				'admin_username' => $this->input->post('admin_username'),
				'admin_nama' => $this->input->post('admin_nama'),
				'admin_email' => $this->input->post('admin_email'),
				'admin_sandi' => $password,
				'level' => 'Admin',
			];
			$this->db->where('admin_id', $id);
			$this->db->update('tb_admin', $simpan);
			$this->session->set_flashdata('flash', 'Pengguna berhasil diperbaharui');
			redirect('admin/pengguna');
		}
	}

	public function penggunahapus($id)
	{
		$this->db->where('admin_id', $id);
		$this->db->delete('tb_admin');
		$this->session->set_flashdata('flash', 'Pengguna berhasil dihapus');
		redirect('admin/pengguna');
	}

	public function pelangganhapus($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('tb_users');
		$this->db->where('user_id', $id);
		$this->db->delete('tb_transaksi');
		$this->db->where('list_userid', $id);
		$this->session->set_flashdata('flash', 'Pelanggan Berhasil Di Hapus');
		redirect('admin/member');
	}

	public function transaksihapus($id)
	{
		$this->db->where('transaksi_id', $id);
		$this->db->delete('tb_transaksi');
		$this->db->where('transaksi_id', $id);
		$this->db->delete('tb_detail_transaksi');
		$this->session->set_flashdata('flash', 'Transaksi Berhasil Di Hapus');
		redirect('admin/transaksi');
	}
}
