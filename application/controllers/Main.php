<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index(){
        $pelanggan = $this->db->get('pelanggan');
        $data['pelanggan'] = $pelanggan->num_rows();

        $tagihan = $this->db->get('tagihan');
        $data['tagihan'] = $tagihan->num_rows();

        $this->db->where('status','sudah di bayar');
        $sudah = $this->db->get('tagihan');
        $data['sudah'] = $sudah->num_rows();

        $this->db->where('status', 'belum bayar');
        $belum = $this->db->get('tagihan');
        $data['belum'] = $belum->num_rows();

        $data['title'] = "PT SETRUM";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('main/index',$data);
        $this->load->view('templates/footer');
    }
}