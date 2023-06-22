<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function data_transaksi_limit()
	{
		$this->db->limit(5);
		$this->db->order_by('transaksi_tgl_pesan', 'DESC');
		$this->db->where('user_id', $this->session->userdata('userid'));
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_transaksi()
	{
		$this->db->order_by('transaksi_id', 'DESC');
		$this->db->where('user_id', $this->session->userdata('userid'));
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function detail_transaksi($id)
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.transaksi_id = tb_transaksi.transaksi_id');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.produk_id');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.user_id');
		$this->db->where('tb_transaksi.transaksi_id', $id);
		$this->db->where('tb_transaksi.user_id', $this->session->userdata('userid'));
		return $this->db->get();
	}

	public function cek_ganti_password()
	{
		$sandi = $this->input->post('sandi');
		$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_users', ['user_id' => $this->session->userdata('userid')])->row_array();

		if (password_verify($sandi, $cek['user_sandi'])) {
			$this->db->set('user_sandi', $sandi1);
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->update('tb_users');
			$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
			redirect('user/ganti_password');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('user/ganti_password');
		}
	}
}
