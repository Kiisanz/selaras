<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function customer()
    {
        $this->db->select('COUNT(nama_customer) as nama_customer');
        $this->db->from('customer');
        return $this->db->get()->row();
    }
    public function pemasukkan()
    {
        $this->db->select('SUM(total_bayar) as pemasukkan');
        $this->db->from('transaksi');
        return $this->db->get()->row();
    }
    public function user()
    {
        $this->db->select('COUNT(nama_user) as user');
        $this->db->from('user');
        return $this->db->get()->row();
    }
    public function top_selling()
    {
        return $this->db->query("SELECT SUM(qty) as total, nama_produk, harga, 
        size FROM `detail_transaksi`
        JOIN size ON detail_transaksi.id_size = size.id_size 
        JOIN produk ON size.id_produk=produk.id_produk 
        GROUP BY detail_transaksi.id_size 
        ORDER BY total DESC")->result();
    }
    public function pelanggan_list()
    {
        return $this->db->query("SELECT 
                customer.nama_customer, 
                customer.alamat_customer, 
                transaksi.tgl_transaksi, 
                COUNT(transaksi.id_transaksi) as total_transaksi
            FROM transaksi 
            JOIN customer ON transaksi.id_customer = customer.id_customer
            GROUP BY customer.id_customer, 
                     transaksi.tgl_transaksi, 
                     customer.nama_customer, 
                     customer.alamat_customer
            ORDER BY total_transaksi DESC
        ")->result();
    }
}    

/* End of file mDasboard.php */
