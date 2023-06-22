<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Login Administrator';
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		} else {
			$this->_cek();
		}
	}

	private function _cek()
	{
		$email		=	$this->input->post('email');
		$password	=	$this->input->post('sandi');

		$cekadm = $this->log_mod($email);
		if ($cekadm) {
			if (password_verify($password, $cekadm['admin_sandi'])) {
				$admin = array(
					'adminid'					=>	$cekadm['admin_id'],
					'adminuname'				=>	$cekadm['admin_username'],
					'adminame'					=>	$cekadm['admin_nama'],
					'adminmail'					=>	$cekadm['admin_email'],
					'adminsandi'				=>	$cekadm['admin_sandi'],
					'adminfoto'					=>	$cekadm['admin_foto'],
					'status_login_'				=>	'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls',
					'level' 					=> $cekadm['level'],
				);

				$this->session->set_userdata($admin);
				redirect('admin');
			} else {
				$this->session->set_flashdata('error', 'Password anda salah');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('error', 'Akun tidak terdaftar');
			redirect('auth');
		}
	}

	private function log_mod($email)
	{
		$this->db->where('admin_email', $email);
		$this->db->or_where('admin_username', $email);
		return $this->db->get('tb_admin')->row_array();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
