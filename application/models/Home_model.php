<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function all_produk()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_produk.id_kategori = tb_kategori.id_kategori');
		$this->db->order_by('produk_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function all_produk_forhome()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_produk.id_kategori = tb_kategori.id_kategori');

		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function cari_produk($key)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_produk.id_kategori = tb_kategori.id_kategori');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->like('produk_name', $key);
		$this->db->or_like('produk_price', $key);
		return $this->db->get()->result_array();
	}

	public function detail_produk($id, $tag, $url)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_produk.id_kategori = tb_kategori.id_kategori');

		$this->db->where('produk_url', $url);
		$this->db->where('url', $tag);
		$this->db->where('produk_id', $id);
		return $this->db->get()->row_array();
	}

	public function all_kategori()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

	public function sigin_user()
	{
		$mail = $this->input->post('email');
		$sandi = $this->input->post('password');

		$cek_user = $this->db->get_where('tb_users', ['user_email' => $mail])->row_array();
		if ($cek_user) {
			if ($cek_user['user_status'] == 1) {
				if (password_verify($sandi, $cek_user['user_sandi'])) {
					$sess_create = array(
						'userid'			=>	$cek_user['user_id'],
						'username'			=>	$cek_user['user_nama'],
						'usermail'			=>	$cek_user['user_email'],
						'userpass'			=>	$cek_user['user_sandi'],
						'userstat'			=>	$cek_user['user_status'],
						'usercreated'		=>	$cek_user['user_created'],
						'loginstatus'		=>	'6484bbvnvfdswuieywor3443993'
					);

					$this->session->set_userdata($sess_create);
					redirect('home');
				} else {
					$this->session->set_flashdata('error', 'Password anda salah');
					redirect('account');
				}
			} else {
				$this->session->set_flashdata('error', 'Error');
				redirect('account');
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak ditemukan');
			redirect('account');
		}
	}

	public function data_cart()
	{
		$this->db->where('cart_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_cart')->result_array();
	}

	public function simpan_transaksi()
	{

		$id_order = time();
		$prov = explode(",", $this->input->post('prov', TRUE));
		$kota = explode(",", $this->input->post('kota', TRUE));
		$alamat = $this->input->post('alamat', TRUE);
		$pos = $this->input->post('kd_pos', TRUE);
		$kurir = $this->input->post('kurir', TRUE);
		$layanan = explode(",", $this->input->post('layanan', TRUE));
		$ongkir = $this->input->post('ongkir', TRUE);
		$total = $this->input->post('total', TRUE);
		$tgl_pesan = date("Y-m-d");
		$bts = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")));
		$note = $this->input->post('note');

		$data = array(
			'transaksi_id'				=> $id_order,
			'user_id'			=> $this->session->userdata('userid'),
			'transaksi_total'			=> $total,
			'transaksi_tujuan'			=> $alamat,
			'transaksi_pos'				=> $pos,
			'transaksi_prov'			=> $prov[1],
			'transaksi_kota'			=> $kota[1],
			'transaksi_kurir'			=> $kurir,
			'transaksi_service'			=> $layanan[1],
			'transaksi_tgl_pesan'		=> $tgl_pesan,
			'transaksi_bts_bayar'		=> $bts,
			'transaksi_status'			=> 'Belum Mengupload Bukti Pembayaran',
			'transaksi_note'			=> $note
		);

		if ($this->db->insert('tb_transaksi', $data)) {
			foreach ($this->cart->contents() as $key) {
				$detail = array(
					'transaksi_id'		=> $id_order,
					'produk_id'		=> $key['id'],
					'd_transaksi_qty' 		=> $key['qty'],
					'd_transaksi_biaya' 	=> $key['subtotal']
				);

				$this->db->insert('tb_detail_transaksi', $detail);
			}
			$this->cart->destroy();
			$this->session->set_flashdata('flash', 'Transaksi berhasil, silahkan pilih metode pembayaran anda');
			redirect('user/transaksi');
		} else {
			$this->session->set_flashdata('error', 'Transaksi gagal, silahkan coba lagi');
			redirect('checkout');
		}
	}

	public function produkbytag($url)
	{
		$this->db->select('*');
		$this->db->from('tb_kategori');
		$this->db->join('tb_produk', 'tb_kategori.id_kategori = tb_produk.id_kategori');
		$this->db->where('url', $url);
		return $this->db->get()->result_array();
	}
}
