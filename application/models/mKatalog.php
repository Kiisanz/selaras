<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
    public function katalog()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->join('diskon', 'diskon.id_produk = produk.id_produk', 'left');
        // Removed GROUP BY to avoid the error
        return $this->db->get()->result();
    }

    public function detail_produk($id)
    {
        $data['size'] = $this->db->query("SELECT * FROM produk JOIN size ON produk.id_produk = size.id_produk JOIN diskon ON diskon.id_produk=size.id_produk WHERE produk.id_produk='" . $id . "'")->result();
        $data['produk'] = $this->db->query("SELECT * FROM produk join size on produk.id_produk=size.id_produk JOIN diskon ON diskon.id_produk=size.id_produk WHERE produk.id_produk='" . $id . "'")->row();
        return $data;
    }

    public function get_all_kategori()
    {
        return $this->db->get('kategori')->result();
    }

    public function get_products_by_category($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_kategori', $id_kategori);  // Filter by category
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_categories()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file mKatalog.php */
