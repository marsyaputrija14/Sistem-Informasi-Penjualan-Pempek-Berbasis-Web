<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		$data['title'] = 'Keranjang Belanja';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/keranjang', $data);
		$this->load->view('tema/home/footer');
	}

	public function add()
	{
		// $rowid = md5(microtime());
		$cek = $this->db->get_where('tb_produk', ['produk_id' => $this->uri->segment(3)])->row_array();
		$data = array(
			'id'			=>   $cek['produk_id'],
			'name'			=>   $cek['produk_name'],
			'price'			=>   $cek['produk_price'],
			'image'			=>   $cek['produk_image'],
			'weight'		=>   $cek['produk_weight'],
			'stok'			=>   $cek['produk_stok'],
			'qty'			=>   1
		);

		$this->cart->insert($data);
		$this->session->set_flashdata('flash', 'Produk berhasil ditambahkan ke keranjang belanja');
		redirect('keranjang');
	}

	public function add_cart()
	{
		// $rowid = md5(microtime());
		$cek = $this->db->get_where('tb_produk', ['produk_id' => $this->input->post('produkid')])->row_array();
		$data = array(
			'id'			=>   $cek['produk_id'],
			'name'			=>   $cek['produk_name'],
			'price'			=>   $cek['produk_price'],
			'image'			=>   $cek['produk_image'],
			'weight'		=>   $cek['produk_weight'],
			'stok'			=>   $cek['produk_stok'],
			'qty'			=>   $this->input->post('qttybutton')
		);

		$this->cart->insert($data);
		$this->session->set_flashdata('flash', 'Produk berhasil ditambahkan ke keranjang belanja');
		redirect('keranjang');
	}

	public function update()
	{
		$info = $_POST['cart'];
		foreach ($info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$weight = $cart['weight'];
			$qty = $cart['qty'];
			$image = $cart['image'];
			$amount = $price * $qty;

			$data = array(
				'rowid'			=>	$rowid,
				'price'			=>	$price,
				'weight'		=>	$weight,
				'qty'			=>	$qty,
				'image'			=>	$image,
				'amount'		=>	$amount
			);

			$this->cart->update($data);
		}
		$this->session->set_flashdata('flash', 'Keranjang belanja berhasil diperbaharui');
		redirect('keranjang');
	}

	public function delete()
	{
		$this->cart->remove($this->uri->segment(3));
		$this->session->set_flashdata('flash', 'Produk berhasil dihapus dari keranjang belanja');
		redirect('keranjang');
	}
}
