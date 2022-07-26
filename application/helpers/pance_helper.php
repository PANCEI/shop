<?php
function cek()
{
    $ci = get_instance();
    // jika belum login
    if (!$ci->session->userdata('Email')) {
        redirect('login');
    } else {
        // jika sudah login
        // cek hak akses dari user 
        $role = $ci->session->userdata('hak');
        // ambil controller dari segemnt url
        // $menu = $ci->uri->segment(1);
        $menuUser = $_GET['id'];
        // query Menu_user
        // $queryMenuUser = $ci->db->get_where('menu_user', ['nama' => $menu])->row_array();
        // ambil id 
        // $menuUser = $queryMenuUser['id'];
        // query akses menu user 
        $userAccess = $ci->db->get_where('akses_menu_user', ['id_hak' => $role, 'id_sub' => $menuUser]);
        if ($userAccess->num_rows() < 1) {
            redirect('Block');
        }
    }
}
function checkMenu($roleId, $menuUserId)
{
    // ambil isntance dari ci 
    $ci = get_instance();
    // query semua data role dan menu id yang ada 
    $ci->db->where('id_hak', $roleId);
    $ci->db->where('id_sub', $menuUserId);
    $result = $ci->db->get('akses_menu_user');
    // jika ada maka lakukan 
    if ($result->num_rows() > 0) {
        // return checked
        return "checked='checked'";
    }
}
function activeMenu($active)
{
    if ($active == 1) {
        return "checked='checked'";
    }
}
// function coba()
// {
//     $ci = get_instance();
//     $role = $ci->session->userdata("hak");
//     $menuUser = $_GET['id'];
//     $userAccess = $ci->db->get_where('akses_menu_user', ['id_hak' => $role, 'id_sub' => $menuUser]);
//     if ($userAccess->num_rows() < 1) {
//         return "tidk ada";
//     } else {
//         return "ada";
//     }
// }

function cekArea($userId, $areaId)
{
    $ci = get_instance();
    $ci->db->where('id_toko', $userId);
    $ci->db->where('id_area', $areaId);
    $result = $ci->db->get('toko_shipping_area');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
