<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api_m extends CI_Model
{
    // data jualan 
    function getjualan()
    {
        $jualan = $this->db->get('jualan')->result_array();
        $data = count($jualan);
        for ($i = 0; $i < $data; $i++) {
            if ($jualan[$i]['gambar']) {
                $jualan[$i]["gambar"] = base_url('asset/dist/img/jualan/' . $jualan[$i]['gambar']);
            }
        }
        return $jualan;
    }
    function getjual($id)
    {
        return $this->db->get_where('jualan', ['id' => $id])->result_array();
    }
    function addpembeli($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    function areaToko($id)
    {
        return "oke";
    }
    function iklan()
    {
        $iklan = $this->db->get('iklan')->result_array();
        $data = count($iklan);
        for ($i = 0; $i < $data; $i++) {
            if ($iklan[$i]['gambar']) {
                $iklan[$i]['gambar'] = base_url('asset/dist/img/iklan/' . $iklan[$i]['gambar']);
            }
        }
        return $iklan;
    }
    function diskon()
    {
        $query = "SELECT d.id,diskon,nama_barang,j.gambar,harga,harga-FLOOR((harga*diskon)/100) as harga_akhir ,date_format(DATE(tanggal),'%M %d %Y') as tanggal,nama as toko,jenis,deskripsi FROM diskon d JOIN jualan j ON j.id=d.id_jualan JOIN toko t ON t.id=j.id_toko JOIN `user` u ON u.id=t.id_user JOIN jenis jn ON jn.id=t.id_jenis where tanggal BETWEEN now() and NOW() + interval 7 DAY OR tanggal=DATE(NOW())";
        $diskon = $this->db->query($query)->result_array();
        $count = count($diskon);
        for ($i = 0; $i < $count; $i++) {
            if ($diskon[$i]['gambar']) {
                $diskon[$i]['gambar'] = base_url('asset/dist/img/jualan/' . $diskon[$i]['gambar']);
            }
        }

        return $diskon;
    }
    function kategori()
    {
        return $this->db->get('jenis')->result_array();
    }
    function laku()
    {
        $query = "SELECT id_jualan, MAX(jumlahpesanan) as jumlah ,nama_barang,gambar,jualan.harga  FROM pemesanan JOIN jualan ON jualan.id=pemesanan.id_jualan GROUP BY id_jualan LIMIT 12";
        $laku = $this->db->query($query)->result_array();
        $count = count($laku);
        for ($i = 0; $i < $count; $i++) {
            if ($laku[$i]['gambar']) {
                $laku[$i]['gambar'] = base_url('asset/dist/img/jualan/' . $laku[$i]['gambar']);
            }
        }

        return $laku;
    }
}
