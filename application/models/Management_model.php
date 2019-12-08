<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_model extends CI_Model {
    public function inTarif(){
        $kode = "TR".$this->input->post('kode');
        $tarif = $this->input->post('tarif');
        $tarif_kwh = str_replace(".","",$tarif);
        $data = [
            'kode' => $kode,
            'daya' => $this->input->post('daya'),
            'tarif_perkwh' => $tarif_kwh,
            'beban' =>  $this->input->post('beban')
        ];

        $this->db->insert('tarif',$data);
    }
    public function getTarif(){
        return $this->db->get('tarif')->result_array();
    }
    public function getPelanggan(){
        return $this->db->get('pelanggan')->result_array();
    }
    public function inPelanggan(){
        $kota = $this->input->post('kota');
        $kec = $this->input->post('kecamatan');
        $des = $this->input->post('desa');
        $alamat = $kota.","." ".$kec." ".$des;
        $kode = $this->input->post('tarif');

        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $alamat,
            'kode' => $kode
        ];
    
            $this->db->insert('pelanggan',$data);
        }

    public function getTagihan(){
        $query = "SELECT * FROM tagihan INNER JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id INNER JOIN tarif ON pelanggan.kode = tarif.kode";

        return $this->db->query($query)->result_array();
    }
    public function inTagihan(){
        $this->db->where('id_pelanggan', $this->input->post('pelanggan'));
        $result = $this->db->get('tagihan');
        if($result->num_rows() > 0){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Sudah ada tagihan untuk bulan ini, jika ada tugakan harus di bayar dulu(paling lambat 10 hari dari bulan baru, jika belum di bayar akan di cabut hak penggunaan listrik)</div>');
            redirect('management/tagihan');
        }

        $data = [
            'tahun_tagih' => $this->input->post('tahun'),
            'bulan_tagih' => $this->input->post('bulan'),
            'pemakaian' => $this->input->post('pemakaian'),
            'denda' => "0",
            'status' => $this->input->post('status'),
            'id_pelanggan' => $this->input->post('pelanggan')
        ];

        $this->db->insert('tagihan',$data);
    }
    public function getPembayaran(){
        $query = "SELECT * FROM pembayaran INNER JOIN tagihan ON pembayaran.id_tagihan = tagihan.id_tagihan
                 INNER JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id INNER JOIN tarif ON pelanggan.kode = tarif.kode";

        return $this->db->query($query)->result_array();
    }
    public function inPembayaran(){
        $this->db->where('id_tagihan',$this->input->post('tagihan'));
        $cek = $this->db->get('pembayaran');
        if($cek->num_rows() > 0){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Pembayaran Sudah di lakukan</div>');
            redirect('management/pembayaran');
        }
        $data = [
            'tanggal_bayar' => $this->input->post('tanggal'),
            'id_tagihan' => $this->input->post('tagihan'),
            'jumlah_tagihan' => $this->input->post('jumlah'),
            'biaya_admin' => $this->input->post('admin'),
            'status' => $this->input->post('status')
        ];

        $this->db->set('status',$this->input->post('status'));
        $this->db->where('id_tagihan',$this->input->post('tagihan'));
        $this->db->update('tagihan');

        $this->db->insert('pembayaran',$data);
    }

    public function kode(){
        $this->db->select('RIGHT(tarif.kode,2) as kode_barang', FALSE);
        $this->db->order_by('kode_barang','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tarif');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
             //cek kode jika telah tersedia    
             $data = $query->row();      
             $kode = intval($data->kode_barang) + 1; 
        }
        else{      
             $kode = 1;  //cek jika kode belum terdapat pada table
        }
            $tgl=date('dmY'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = $tgl.$batas;  //format kode
            return $kodetampil;  
       }

    public function update($id){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kode = $this->input->post('tarif');

        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'kode' => $kode
        ];
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('pelanggan');
    }

    public function pelanggan($id){
        $this->db->where('id',$id);
        $pelanggan = $this->db->get('pelanggan')->row_array();

        return $pelanggan;
    }

    public function tarif($id){
        $this->db->where('kode',$id);
        $tarif = $this->db->get('tarif')->row_array();

        return $tarif;
    }

    public function updatetarif($id){
        $daya = $this->input->post('daya');
        $tarif =  $tarif_kwh = str_replace(".","",$this->input->post('tarif'));
        $beban = $this->input->post('beban');
        $data = [
        'daya' => $daya,
        'tarif_perkwh' => $tarif,
        'beban' => $beban
        ];
        $this->db->set($data);
        $this->db->where('kode',$id);
        $this->db->update('tarif');
    }
}