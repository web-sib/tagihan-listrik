<?php
function data_lengkap($id,$null){
    $ci = get_instance();
    if($id == NULL){
        $idi = $null;
    }else{
        $idi = $id;
    }
    $query = "SELECT * FROM pembayaran INNER JOIN tagihan ON pembayaran.id_tagihan = tagihan.id
    INNER JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id INNER JOIN tarif ON pelanggan.kode = tarif.kode WHERE pembayaran.id_tagihan = $idi";

    return $ci->db->query($query)->result_array();
}