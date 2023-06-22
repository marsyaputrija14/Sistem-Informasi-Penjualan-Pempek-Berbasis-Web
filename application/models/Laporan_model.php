<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
	public function data_transaksi()
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.user_id');
		$this->db->where('transaksi_status', 'Selesai');
		$this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function hasil()
	{
		$this->db->select('SUM(d_transaksi_biaya) as penghasilan');
		$this->db->from('tb_detail_transaksi');
		$this->db->join('tb_transaksi', 'tb_detail_transaksi.transaksi_id = tb_transaksi.transaksi_id');
		$this->db->where('tb_transaksi.transaksi_status', 'Selesai');
		return $this->db->get()->row()->penghasilan;
	}

	public function laporan_data_transaksi($daterange)
	{
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.user_id');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.transaksi_id = tb_transaksi.transaksi_id');
		$this->db->where('transaksi_time >=', $daterange[0]);
		$this->db->where('transaksi_time <=', $daterange[1]);
		$this->db->where('transaksi_status', 'Selesai');

		$this->db->order_by('transaksi_time', 'DESC');
		$this->db->group_by('tb_transaksi.transaksi_id');
		return $this->db->get()->result_array();
	}
}
