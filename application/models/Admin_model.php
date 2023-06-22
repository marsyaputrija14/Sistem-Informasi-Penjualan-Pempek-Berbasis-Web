<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function cek_aks()
	{
	}

	public function getresult($where, $tabel)
	{
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

	public function getrow($where, $tabel)
	{
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get()->row();
	}

	public function data_produk()
	{
		$this->db->order_by('produk_tgl', 'DESC');
		return $this->db->get('tb_produk')->result_array();
	}

	public function data_kategori()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

	private function kategori($id_item, $kategori)
	{
		$kat = explode(", ", $kategori);
		$len = count($kat);
		$a = array(' ');
		$b = array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '=', '[', ']', '{', '}', '\'', '"', ':', ';', '/', '\\', '?', '/', '<', '>');

		for ($i = 0; $i  < $len; $i++) {
			$url = str_replace($b, '', $kat[$i]);
			$url = str_replace($a, '-', strtolower($url));

			$cek = $this->get_where('tb_kategori', ['url' => $url]);

			if ($cek->num_rows() > 0) {

				$get = $cek->row();
				$id = $get->id_kategori;
			} else {

				$data = array(
					'kategori' => ucwords(trim($kat[$i])),
					'url' => $url
				);

				// $id = $this->insert_last('tb_kategori', $data);
			}

			$cek2 = $this->get_where('tb_rkategori', ['id_item' => $id_item, 'id_kategori_r' => $id]);

			if ($cek2->num_rows() < 1) {
				$this->insert('tb_rkategori', ['id_item' => $id_item, 'id_kategori_r' => $id]);
			}
		}
	}

	public function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	public function insert_last($table = '', $data = '')
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function insert($table = '', $data = '')
	{
		$this->db->insert($table, $data);
	}

	public function simpan_produk()
	{
		$judul = ucwords($this->input->post('nama-produk'));
		$url = url_title(strtolower($judul), 'dash', TRUE) . '-' . time() . '.html';
		$tgl = date('Y-m-d H:i:s');
		$stok = $this->input->post('stok-produk');
		$berat = $this->input->post('berat-produk');
		$status = $this->input->post('status-produk');
		$harga = $this->input->post('harga-produk');
		$deskripsi = $this->input->post('deskripsi-produk');

		// get foto
		$config['upload_path'] = './upload/foto/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './upload/foto/' . $gambar['file_name'];
				$config['width'] = 624;
				$config['height'] = 800;
				$config['new_image'] = './upload/foto/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'produk_url'				=>	$url,
					'produk_name'				=>	$judul,
					'produk_tgl'				=>	$tgl,
					'produk_stok'				=>	$stok,
					'produk_weight'				=>	$berat,
					'produk_price'				=>	$harga,
					'produk_description'		=>	$deskripsi,
					'produk_image'				=>	$gambar['file_name'],
					'id_kategori' => $this->input->post('kategori-produk'),
				);
			}
		} else {
			$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_produk');
		}

		$this->db->insert('tb_produk', $data);
	}

	public function ubah_produk()
	{
		$judul = ucwords($this->input->post('nama-produk'));
		$stok = $this->input->post('stok-produk');
		$berat = $this->input->post('berat-produk');
		$status = $this->input->post('status-produk');
		$harga = $this->input->post('harga-produk');
		$deskripsi = $this->input->post('deskripsi-produk');

		// get foto
		$config['upload_path'] = './upload/foto/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './upload/foto/' . $gambar['file_name'];
				$config['width'] = 624;
				$config['height'] = 800;
				$config['new_image'] = './upload/foto/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'produk_name'				=>	$judul,
					'produk_stok'				=>	$stok,
					'produk_weight'				=>	$berat,
					'produk_price'				=>	$harga,
					'produk_description'		=>	$deskripsi,
					'produk_image'				=>	$gambar['file_name']
				);
			}
		} else {
			$data = array(
				'produk_name'				=>	$judul,
				'produk_stok'				=>	$stok,
				'produk_weight'				=>	$berat,
				'produk_price'				=>	$harga,
				'produk_description'		=>	$deskripsi
			);
		}

		$this->db->where('produk_id', $this->input->post('id'));
		$this->db->update('tb_produk', $data);
	}

	public function produkbyid($id)
	{
		return $this->db->get_where('tb_produk', ['produk_id' => $id])->row_array();
	}

	public function del_produk($id)
	{
		$this->db->where('produk_id', $id);
		$this->db->delete('tb_produk');
	}

	public function del_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('tb_kategori');
	}



	public function data_transaksi()
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.user_id');
		$this->db->where('transaksi_status !=', 'Belum Mengupload Bukti Pembayaran');
		$this->db->order_by('transaksi_id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function transaksibyid($id)
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.transaksi_id = tb_transaksi.transaksi_id', 'left');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.produk_id', 'left');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.user_id', 'left');
		$this->db->where('tb_transaksi.transaksi_id', $id);
		return $this->db->get();
	}



	public function data_member()
	{
		$this->db->order_by('user_created', 'DESC');
		return $this->db->get('tb_users')->result_array();
	}

	public function cek_ganti_password()
	{
		$sandi = $this->input->post('sandi');
		$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();

		if (password_verify($sandi, $cek['admin_sandi'])) {
			$this->db->set('admin_sandi', $sandi1);
			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
			redirect('admin/edit_sandi');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_sandi');
		}
	}

	public function cek_ganti_profil()
	{
		$nama = ucwords($this->input->post('nama'));
		$username = strtolower($this->input->post('username'));
		$email = strtolower($this->input->post('email'));
		$sandi = $this->input->post('sandi');
		$cek = $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();

		if (password_verify($sandi, $cek['admin_sandi'])) {

			// get foto
			$config['upload_path'] = './upload/fotoprofil/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data();
					$data = array(
						'admin_nama'				=>	$nama,
						'admin_email'				=>	$email,
						'admin_username'			=>	$username,
						'admin_foto'				=>	$gambar['file_name']
					);
				} else {
					$data = array(
						'admin_nama'				=>	$nama,
						'admin_email'				=>	$email,
						'admin_username'			=>	$username,
						'admin_foto'				=>	$this->input->post('gambar_old')
					);
				}
			} else {
				$data = array(
					'admin_nama'				=>	$nama,
					'admin_email'				=>	$email,
					'admin_username'			=>	$username,
					'admin_foto'				=>	$this->input->post('gambar_old')
				);
			}

			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('admin/edit_profil');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_profil');
		}
	}

	public function profilku()
	{
		return $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();
	}
}
