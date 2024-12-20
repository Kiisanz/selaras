<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function pembayaran()
	{
		$this->protect->protect_admin();
		$data = array(
			'pesanan' => $this->mTransaksi->pesanan_masuk()
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside', $data);
		$this->load->view('Admin/Transaksi/pembayaran', $data);
		$this->load->view('Admin/layouts/footer');
	}
	public function konfirmasi_pembayaran()
	{
		$this->protect->protect_admin();
		$data = array(
			'pesanan' => $this->mTransaksi->pesanan_masuk()
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside');
		$this->load->view('Admin/Transaksi/konfirmasi_pembayaran', $data);
		$this->load->view('Admin/layouts/footer');
	}
	public function proses_konfirmasi($id)
	{
		$data = array(
			'status_order' => '2'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil Dikonfirmasi!');
		redirect('Admin/Transaksi/konfirmasi_pembayaran');
	}

	public function proses_pesanan_cod($id)
	{
		$data = array(
			'status_order' => '2'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Akan Segera Diproses!');
		redirect('Admin/Transaksi/pembayaran');
	}
	public function diproses()
	{
		$this->protect->protect_admin();
		$data = array(
			'pesanan' => $this->mTransaksi->pesanan_masuk()
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside');
		$this->load->view('Admin/Transaksi/status_dikemas', $data);
		$this->load->view('Admin/layouts/footer');
	}
	public function detail_pesanan($id)
	{
		$data['detail'] = $this->mTransaksi->detail_pesanan($id);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function kirim($id)
	{
		$data = array(
			'status_order' => '3'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil Dikirim!');
		redirect('Admin/Transaksi/konfirmasi_pembayaran');
	}
	public function dikirim()
	{
		$this->protect->protect_admin();
		$data = array(
			'pesanan' => $this->mTransaksi->pesanan_masuk()
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside');
		$this->load->view('Admin/Transaksi/dikirim', $data);
		$this->load->view('Admin/layouts/footer');
	}
	public function selesai()
	{
		$this->protect->protect_admin();
		$data = array(
			'pesanan' => $this->mTransaksi->pesanan_masuk()
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside');
		$this->load->view('Admin/Transaksi/selesai', $data);
		$this->load->view('Admin/layouts/footer');
	}

	public function check_new_orders()
	{
		// Query untuk mengambil data pesanan baru
		$pesanan_masuk = $this->db->query('
        SELECT 
            transaksi.id_transaksi AS order_id, 
            customer.nama_customer AS customer_name, 
            transaksi.status_pesan, 
            transaksi.metode_pembayaran, 
            transaksi.total_bayar,
			transaksi.tgl_transaksi
        FROM transaksi 
        JOIN customer ON transaksi.id_customer = customer.id_customer 
        WHERE transaksi.status_order = 0
    ')->result();

		$notif = [];
		$date = [];

		foreach ($pesanan_masuk as $pesanan) {
			$date[] = $pesanan->tgl_transaksi;
			if ($pesanan->status_pesan == 2 && $pesanan->metode_pembayaran == 'transfer') {
				$notif[] = "Halo, ada pesanan baru dari {$pesanan->customer_name}! (ID Pesanan: {$pesanan->order_id}). Metode pembayaran: Transfer Bank. Bukti pembayaran belum diunggah, yuk segera cek!";
			} elseif ($pesanan->status_pesan == 3 && $pesanan->metode_pembayaran == 'transfer') {
				$notif[] = "Pesanan {$pesanan->order_id} dari {$pesanan->customer_name} membutuhkan konfirmasi pembayaran. Total yang perlu dibayar: Rp" . number_format($pesanan->total_bayar, 0, ',', '.') . ". Segera cek bukti transfernya ya!";
			} elseif ($pesanan->metode_pembayaran == 'cod') {
				$notif[] = "Pesanan baru nih! Dari {$pesanan->customer_name}, ID Pesanan: {$pesanan->order_id}. Metode bayar COD, jadi pastikan pelanggan siap bayar saat barang sampai.";
			} else {
				$notif[] = "Pesanan dari {$pesanan->customer_name} (ID Pesanan: {$pesanan->order_id}) membutuhkan perhatian lebih. Periksa status pesanan untuk detailnya.";
			};
		}


		echo json_encode([
			'notifikasi' => $notif,
			'date' => $date,
			'jumlah_pesanan' => count($pesanan_masuk)
		]);
	}
}

/* End of file Transaksi.php */
