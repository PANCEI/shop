<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Toko_m extends CI_Model
{
    function toko()
    {
        $query = "SELECT u.id as user_id,t.id as id_toko , u.nama,u.email,u.numberPhone,u.alamat,j.jenis from toko t JOIN user u ON u.id=t.id_user JOIN jenis j ON j.id=t.id_jenis
        ";
        return $this->db->query($query)->result_array();
    }
    function barang()
    {
        $query = "SELECT nama_barang,jl.gambar,harga,jenis,nama FROM jualan jl JOIN jenis js  ON js.id=jl.id_jenis JOIN toko tk ON tk.id=jl.id_toko JOIN user u ON u.id=tk.id_user";
        return $this->db->query($query)->result_array();
    }
    function barangtoko($id_user)
    {
        $querytok = "SELECT * FROM toko WHERE id_user=$id_user";
        $toko = $this->db->query($querytok)->row_array();
        $idtoko = $toko['id'];
        $query = "SELECT jualan.*,gambar1,gambar2,gambar3,gambar4 FROM toko JOIN `user` ON user.id=toko.id_user JOIN jualan ON toko.id=jualan.id_toko JOIN sub_gambar ON jualan.id=sub_gambar.id_barang WHERE toko.id=$idtoko ORDER BY jualan.id DESC";
        return $this->db->query($query)->result_array();
    }
    function singlebarang($id_jualan)
    {

        $query = "SELECT jualan.*,gambar1,gambar2,gambar3,gambar4 FROM toko JOIN `user` ON user.id=toko.id_user JOIN jualan ON toko.id=jualan.id_toko JOIN sub_gambar ON jualan.id=sub_gambar.id_barang WHERE jualan.id=$id_jualan ORDER BY jualan.id DESC";
        return $this->db->query($query)->row_array();
    }

    function diskon()
    {
        $query = "SELECT d.id,diskon,nama_barang,j.gambar,harga,harga-FLOOR((harga*diskon)/100) as harga_akhir ,date_format(DATE(tanggal),'%d-%m-%Y') as tanggal,nama as toko,jenis FROM diskon d JOIN jualan j ON j.id=d.id_jualan JOIN toko t ON t.id=j.id_toko JOIN `user` u ON u.id=t.id_user JOIN jenis jn ON jn.id=t.id_jenis where tanggal BETWEEN now() and NOW() + interval 7 DAY OR tanggal=DATE(NOW())";
        return $this->db->query($query)->result_array();
    }
    function diskontoko($id_toko)
    {
        $query = "SELECT diskon.id,diskon,date_format(tanggal,'%d-%m-%Y') as tanggal,nama_barang,jualan.gambar,harga,harga-FLOOR((harga*diskon)/100) as harga_akhir  FROM diskon JOIN jualan ON jualan.id=diskon.id_jualan join toko ON toko.id=jualan.id_toko JOIN `user` ON user.id=toko.id_user WHERE id_user=$id_toko";
        return $this->db->query($query)->result_array();
    }
    function setdiskon()
    {
        $data = [
            'diskon' => $this->input->post('diskon'),
            'id_jualan' => $this->input->post('id_jualan'),
            'tanggal' => $this->input->post('tanggal')
        ];
        $this->db->insert('diskon', $data);
        return $this->db->affected_rows();
    }
    function ubahdiskon($id)
    {
        $query = "SELECT diskon.id,diskon,date_format(tanggal,'%Y-%m-%d') as tanggal,harga,harga-FLOOR((harga*diskon)/100) as harga_akhir,FLOOR((harga*diskon)/100) as harga_diskon  FROM diskon JOIN jualan ON jualan.id=diskon.id_jualan join toko ON toko.id=jualan.id_toko WHERE  diskon.id=$id";

        return $this->db->query($query)->row_array();
    }
    function changediskon()
    {
        $id = $this->input->post('id');
        $data = [
            "diskon" => $this->input->post('diskon'),
            "tanggal" => $this->input->post('tanggal')
        ];
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update('diskon');
        return $this->db->affected_rows();
    }
    function deletediskon()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('diskon');
        return $this->db->affected_rows();
    }
    function iklan()
    {
        return $this->db->get('iklan')->result_array();
    }
    function iklanDelete($id, $gambar)
    {
        unlink(FCPATH . "/asset/dist/img/iklan/" . $gambar);
        $this->db->where("id", $id);
        $this->db->delete("iklan");
        return $this->db->affected_rows();
    }
    function addIklan()
    {
        $result = $this->Upload_m->upl('iklan');
        if ($result['result'] == 1) {
            $data = [
                "deskripsi" => $this->input->post("deskripsi"),
                "gambar" => $result['file']['file_name']
            ];
            $this->db->insert('iklan', $data);
            return $this->db->affected_rows();
        } else {
            return -1;
        }
    }
    function area()
    {
        $query = 'SELECT * FROM area_penjualan JOIN area_tersedia ON area_tersedia.kode=area_penjualan.kode';
        return $this->db->query($query)->result_array();
    }
    function area_available()
    {
        return $this->db->get('area_tersedia')->result_array();
    }
    function addArea()
    {
        $data = $this->input->post('daerah');
        if ($data) {
            $this->db->insert('area_penjualan', ['kode' => $data]);
            return $this->db->affected_rows();
        } else {
            return -1;
        }
    }
    function areaDelete()
    {
        $data = $this->input->post('id');
        $this->db->where('id', $data);
        $this->db->delete('area_penjualan');
        return $this->db->affected_rows();
    }
    function allToko()
    {
        $query = "SELECT toko.id,nama FROM toko JOIN `user` ON user.id=toko.id_user";
        return $this->db->query($query)->result_array();
    }

    function checkToko()
    {

        $data = [
            "id_toko" => $this->input->post('idToko'),
            "id_area" => $this->input->post('idArea')
        ];
        $result = $this->db->get_where('toko_shipping_area', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('toko_shipping_area', $data);
            return "Area Penjualan Telah Di Tambahkan";
        } else {
            $this->db->delete("toko_shipping_area", $data);
            return "Area penjualan Telah di Hapus";
        }
    }
    function singletoko()
    {

        $data = $this->session->userdata('id');
        return $this->db->get_where('toko', ['id_user' => $data])->row_array();
    }
    function tambahjualan()
    {
        $rows = [];
        $this->load->model('Upload_m');
        $upload_gambar_jualan = $this->Upload_m->upl('jualan');
        if ($upload_gambar_jualan['result'] == 1) {
            $datajualan
                = [
                    "nama_barang" => $this->input->post('nama_barang'),
                    "gambar" => $upload_gambar_jualan['file']['file_name'],
                    "jumlah" => $this->input->post('jumlah'),
                    'harga' => $this->input->post('harga'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_toko' => $this->input->post('id_toko'),
                    'deskripsi' => $this->input->post('deskripsi')
                ];
            $this->db->insert('jualan', $datajualan);
            $cekjualan = $this->db->affected_rows();
            if ($cekjualan) {
                for ($i = 1; $i <= 4; $i++) {
                    $nama =  $this->Upload_m->multiple('subgambar', "gambar$i");

                    $data["gambar$i"] = $nama['file']['file_name'];
                    $rows = $data;
                }
                $jualan = $this->db->get_where('jualan', ['nama_barang' => $datajualan['nama_barang']])->row_array();

                $rows += [
                    'id_barang' => $jualan['id']
                ];
                $this->db->insert('sub_gambar', $rows);
                return $this->db->affected_rows();
            }
        } else {
            return $upload_gambar_jualan['file'];
        }
    }
    function editjualan()
    {
        $id = $this->input->post('id_jualan');
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $gtk = $_FILES['gambar']['name'];
        if ($gtk) {
            $cek = $this->Upload_m->upl('jualan');
            if ($cek['result'] == 1) {
                $data += [
                    "gambar" => $cek['file']['file_name']
                ];
                return $data;
            } else {
                return $cek;
            }
            return $data;
        } else {
            $this->db->where('id', $id);
            $this->db->set($data);
            $this->db->update('jualan');
            return $this->db->affected_rows();
        }
    }
    function editsubgamabr()
    {
        $id = $this->input->post('id_jualan');
        $data = [
            "gambar1" => $_FILES['gambar1']['name'],
            "gambar2" => $_FILES['gambar2']['name'],
            "gambar3" => $_FILES['gambar3']['name'],
            "gambar4" => $_FILES['gambar4']['name']

        ];
        $barang = $this->db->get_where('sub_gambar', ['id_barang' => $id])->row_array();
        $datas = [];
        for ($i = 1; $i <= 4; $i++) {
            if ($data["gambar$i"]) {
                $cek = $barang["gambar$i"];
                unlink(FCPATH . "/asset/dist/img/subgambar/" . $cek);
                $upload = $this->Upload_m->multiple('subgambar', "gambar$i");
                $datas["gambar$i"] = $upload['file']['file_name'];
            }
        }
        if ($datas) {
            $this->db->where('id_barang', $id);
            $this->db->set($datas);
            $this->db->update('sub_gambar');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    function deletejualan()
    {
        $gambar = $this->input->post('gambar');
        $gambar1 = $this->input->post('gambar1');
        $gambar2 = $this->input->post('gambar2');
        $gambar3 = $this->input->post('gambar3');
        $gambar4 = $this->input->post('gambar4');
        $id = $this->input->post('id');
        unlink(FCPATH . "/asset/dist/img/jualan/" . $gambar);
        unlink(FCPATH . "/asset/dist/img/subgambar/" . $gambar1);
        unlink(FCPATH . "/asset/dist/img/subgambar/" . $gambar2);
        unlink(FCPATH . "/asset/dist/img/subgambar/" . $gambar3);
        unlink(FCPATH . "/asset/dist/img/subgambar/" . $gambar4);
        $this->db->where('id', $id);
        $this->db->delete('jualan');
        return $this->db->affected_rows();
    }
    function tambahtoko()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "pass" => password_hash("123", PASSWORD_DEFAULT),
            "created" => time(),
            "gambar" => "deafult.png",
            "id_hak" => "3",
            "active" => 1
        ];
        // masukan data ke database
        $this->db->insert('user', $data);
        // cek apakah masuk atau tidak
        $cekUser = $this->db->affected_rows();
        if ($cekUser) {
            // ambiil id_user dan id_jenis 
            $toko = $this->db->get_where('user', ['email' => $data['email']])->row_array();
            $dataToko = [
                "id_user" => $toko['id'],
                "id_jenis" => $this->input->post('id_jenis')
            ];
            // masukan ke toko
            $this->db->insert('toko', $dataToko);
            return $this->db->affected_rows();
        } else {
            return -1;
        }
    }
    function pesanan()
    {
        $query = "SELECT pemesanan.*,nama_barang,nama FROM pemesanan  JOIN jualan ON jualan.id=pemesanan.id_jualan JOIN `user` ON `user`.id=pemesanan.id_user";
        return $this->db->query($query)->result_array();
    }
    function gettoko()
    {
        $cek = $this->pesanan();

        for ($i = 0; $i < count($cek); $i++) {
            $id = $cek[$i]['id_toko'];
            $query = "SELECT user.nama as namatoko FROM toko JOIN `user` ON `user`.id=toko.id_user WHERE toko.id=$id";
            $tambah = $this->db->query($query)->row_array();
            $cek[$i] += $tambah;
        };
        return $cek;
    }
    function pesanantoko($id)
    {
        $toko = "SELECT toko.id FROM `user` JOIN toko ON user.id=toko.id_user WHERE user.id=$id";
        $datatoko = $this->db->query($toko)->row_array();
        $idtoko = $datatoko['id'];
        $query = "SELECT pemesanan.id,`jumlahpesanan` ,pemesanan.harga,user.nama as pembeli,nama_barang,pemesanan.tanggal,status FROM pemesanan JOIN jualan ON jualan.id=pemesanan.id_jualan JOIN toko ON toko.id=pemesanan.id_toko JOIN `user` ON `user`.id=pemesanan.id_user JOIN status_pesanan ON status_pesanan.id=pemesanan.id_status WHERE toko.id=$idtoko ORDER BY pemesanan.id";
        return $this->db->query($query)->result_array();
    }
    function status()
    {
        $id = $this->input->post('id');
        $respon = $this->input->post('respon');
        $this->db->where('id', $id);
        $this->db->set('id_status', $respon);
        $this->db->update('pemesanan');
        return $this->db->affected_rows();
    }
    function pesanandelete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('pemesanan');
        return $this->db->affected_rows();
    }
    function jumlahtoko()
    {
        $query = "SELECT COUNT(*) as toko FROM toko";
        return $this->db->query($query)->row_array();
    }
    function jumlahpembeli()
    {
        $query = "SELECT COUNT(*) as pembeli FROM `user` WHERE id_hak !=2 AND id_hak !=3";
        return $this->db->query($query)->row_array();
    }
    function jumlahdiskon()
    {
        $query = "SELECT COUNT(*) as diskon FROM diskon d JOIN jualan j ON j.id=d.id_jualan JOIN toko t ON t.id=j.id_toko JOIN `user` u ON u.id=t.id_user JOIN jenis jn ON jn.id=t.id_jenis where tanggal BETWEEN now() and NOW() + interval 7 DAY OR tanggal=DATE(NOW())";
        return $this->db->query($query)->row_array();
    }
    function jumlahjualan()
    {
        $query = "SELECT COUNT(*) as jualan FROM jualan";
        return $this->db->query($query)->row_array();
    }
    function jumlaharea()
    {
        $query = "SELECT COUNT(*) as area FROM area_penjualan";
        return $this->db->query($query)->row_array();
    }
    function jumlahjualantoko()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT COUNT(*) as jualan FROM jualan JOIN toko ON toko.id=jualan.id_toko JOIN `user` on user.id=toko.id_user WHERE user.id=$id";
        return $this->db->query($query)->row_array();
    }
    function jumlahdiskontoko()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT COUNT(*) as diskon FROM diskon JOIN jualan on jualan.id=diskon.id_jualan join toko on toko.id=jualan.id_toko JOIN `user` ON user.id=toko.id_user WHERE id_user=$id";
        return $this->db->query($query)->row_array();
    }
    function jumlahpesanan()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT COUNT(*) as pesanan FROM pemesanan JOIN toko ON toko.id=pemesanan.id_toko JOIN `user` ON user.id=toko.id_user WHERE  date_format(tanggal,'%m')=7 AND user.id=$id";
        return $this->db->query($query)->row_array();
    }
    function diskontayang()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT COUNT(*) as diskontayang FROM diskon JOIN jualan ON jualan.id=diskon.id_jualan JOIN toko ON toko.id=jualan.id_toko JOIN `user` ON `user`.id=toko.id_user WHERE `user`.id=$id AND diskon.tanggal BETWEEN now() and NOW() + interval 7 DAY OR tanggal=DATE(NOW())";
        return $this->db->query($query)->row_array();
    }
    function allemail()
    {
        $query = "SELECT pesan.id,LEFT(pesan,30) as pesan,nama FROM pesan JOIN toko ON toko.id=pesan.id_toko JOIN `user` WHERE user.id=toko.id_user";
        return $this->db->query($query)->result_array();
    }
    function emaildelete()
    {
        $id = $this->input->post('id');
        $this->db->where_in('id', $id);
        $this->db->delete('pesan');
        return $this->db->affected_rows();
    }
    function emailTOko()
    {
        $query = "SELECT email,toko.id FROM toko JOIN `user` ON user.id=toko.id_user";
        return $this->db->query($query)->result_array();
    }
    function tambahemail()
    {
        $email = $this->input->post('email');
        $cek = $this->db->get_where('user', ['email' => $email])->row_array();
        $toko = $this->db->get_where('toko', ["id_user" => $cek['id']])->row_array();
        $data = [
            "subject" => $this->input->post('subject'),
            "pesan" => $this->input->post('pesan'),
            "id_toko" => $toko['id']
        ];
        $this->db->insert('pesan', $data);
        return $this->db->affected_rows();
    }
    function getemail()
    {
        $id = $_GET['ide'];
        $query = "SELECT  pesan.*,email FROM pesan JOIN toko ON toko.id=pesan.id_toko JOIN `user` ON user.id=toko.id_user WHERE pesan.id=$id";
        return $this->db->query($query)->row_array();
    }
    function deleteToko()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
    function getStatus()
    {
        $query = "SELECT * FROM status_pesanan WHERE id !=1";
        return $this->db->query($query)->result_array();
    }
}
