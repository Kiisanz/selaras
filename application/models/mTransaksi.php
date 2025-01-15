<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function pesanan_masuk()
	{
		$data['pesanan_masuk'] = $this->db->query(
			'SELECT transaksi.*, customer.*, produk.nama_produk, produk.gambar, size.size 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 0 AND status_pesan = 2'
		)->result();

		$data['konfirmasi'] = $this->db->query(
			'SELECT transaksi.*, customer.*, produk.nama_produk, produk.gambar, size.size 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 1 AND status_pesan = 2'
		)->result();

		$data['proses'] = $this->db->query(
			'SELECT transaksi.*, customer.*, produk.nama_produk, produk.gambar, size.size 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 2 AND status_pesan = 2'
		)->result();

		$data['kirim'] = $this->db->query(
			'SELECT transaksi.*, customer.*, produk.nama_produk, produk.gambar, size.size 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 3 AND status_pesan = 2'
		)->result();

		$data['selesai'] = $this->db->query(
			'SELECT transaksi.*, customer.*, produk.nama_produk, produk.gambar, size.size 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 4 AND status_pesan = 2'
		)->result();

		$data['pengembalian'] = $this->db->query(
			'SELECT transaksi.*, customer.*, produk.nama_produk, produk.gambar, size.size 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 5'
		)->result();

		$pesanan_masuk = $this->db->query(
			'SELECT COUNT(*) as jumlah 
        FROM transaksi
        JOIN customer ON transaksi.id_customer = customer.id_customer
        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        JOIN size ON detail_transaksi.id_size = size.id_size
        JOIN produk ON size.id_produk = produk.id_produk
        WHERE status_order = 0 AND status_pesan = 2'
		)->row();

		$data['jumlah_pesanan'] = $pesanan_masuk->jumlah;

		return $data;
	}

	public function konfirmasi($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}
	public function detail_pesanan($id)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
		$this->db->join('size', 'detail_transaksi.id_size = size.id_size', 'left');
		$this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
		$this->db->where('transaksi.id_transaksi', $id);
		return $this->db->get()->result();
	}

	//transaksi langsung
	public function get_size($id)
	{
		$this->db->select('*');
		$this->db->from('size');
		$this->db->join('produk', 'produk.id_produk = size.id_produk', 'left');
		$this->db->where('produk.id_produk', $id);
		return $this->db->get()->result();
	}
	public function transaksi_langsung()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status_pesan=2');
		$this->db->where('type_transaksi=2');
		return $this->db->get()->result();
	}
	public function detail_transaksi($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` WHERE id_transaksi='" . $id . "'")->row();
		$data['produk'] = $this->db->query("SELECT * FROM `transaksi` 
		JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi 
		JOIN size ON detail_transaksi.id_size=size.id_size 
		JOIN produk ON produk.id_produk=size.id_produk 
		WHERE transaksi.id_transaksi='" . $id . "'")->result();
		return $data;
	}
	public function get_notification_count()
	{
		$this->load->model('Transaksi_model');
		$count = $this->Transaksi_model->get_pending_orders_count();
		echo json_encode(['count' => $count]);
	}
}

/* End of file mTransaksi.php */
