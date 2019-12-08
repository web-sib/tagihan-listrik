<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Management_model','management');
    }
    public function index(){
        $data['title'] = "Pelanggan";
        $data['tarif'] = $this->management->getTarif();
        $data['pelanggan'] = $this->management->getPelanggan();
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('kota','Kota','required|trim');
        $this->form_validation->set_rules('kecamatan','Kecamatan','required|trim');
        $this->form_validation->set_rules('desa','Desa','required|trim');
        $this->form_validation->set_rules('tarif','Tarif','required|trim');


        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('management/index',$data);
            $this->load->view('templates/footer');
        }else{
            $this->management->inPelanggan();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">pelanggan berhasil di tambah</div>');
            redirect('management');
        }

    }
    public function tarif(){
        $data['title'] = "Tarif";
        $data['tarif'] = $this->management->getTarif();
        $data['kode'] = $this->management->kode();
        $this->form_validation->set_rules('kode','Kode','required|is_unique[tarif.kode]|trim');
        $this->form_validation->set_rules('daya','Daya','required|trim');
        $this->form_validation->set_rules('tarif','Tarif','required|trim');
        $this->form_validation->set_rules('beban','Beban','required|trim');

        if($this->form_validation->run() == false){
            $this->session->unset_userdata('tarif');
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('management/tarif',$data);
            $this->load->view('templates/footer');
        }else{
            $this->management->inTarif();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhail menambah daftar Tarif</div>');
            $this->session->unset_userdata('tarif');
            redirect('management/tarif');
        }

    }
    public function tagihan(){
        $data['title'] = "tagihan";
        $data['pelanggan'] = $this->management->getPelanggan();
        $data['tagihan'] = $this->management->getTagihan();
        $this->form_validation->set_rules('pemakaian','Pemakaian','required|trim');
        $this->form_validation->set_rules('pelanggan','Pelanggan','required|trim');
        $this->_resetBulan();
        $this->_resetPembayaran();

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('management/tagihan',$data);
            $this->load->view('templates/footer');
        }else{
            $this->management->inTagihan();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menyimpan tagihan</div>');
            redirect('management/tagihan');
        }

    }

    private function _resetBulan(){
        $data = $this->management->getTagihan();
        foreach($data as $tagihan){
            $bulan = date('M');
            if($tagihan['bulan_tagih'] != $bulan){
                if($tagihan['status'] == "belum bayar"){
                            $denda = 500 * date('d');
                            $this->db->set('denda',$denda);
                            $this->db->where('id_tagihan',$tagihan['id_tagihan']);
                            $this->db->update('tagihan');
                }else{
                    $id = $tagihan['id_tagihan'];
                    $this->db->delete('pembayaran',['id_tagihan' => $id]);
                    $id = $tagihan['id_tagihan'];
                    $this->db->delete('tagihan',['id_tagihan' => $id]);
                }
            }else{
                $this->db->set('denda','0');
                $this->db->where('id_tagihan',$tagihan['id_tagihan']);
                $this->db->update('tagihan');
            }
        }
    }

    public function pembayaran(){
        $data['title'] = "Pembayaran";
        $data['tagih'] = $this->management->getTagihan();
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('tagihan','Tagihan','required');
        $this->form_validation->set_rules('denda','Denda','required');
        $this->form_validation->set_rules('admin','Administrasi','required');
        $this->form_validation->set_rules('jumlah','Jumlah','required');
        $this->_resetPembayaran();
        $this->_resetBulan();

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('management/pembayaran',$data);
            $this->load->view('templates/footer');
        }else{
            $this->management->inPembayaran();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pembayaran berhasil di lakukan</div>');
            redirect('management/pembayaran');
        }
    }

    private function _resetPembayaran(){
        $data['pembayaran'] = $this->db->get('pembayaran')->result_array();
        foreach($data['pembayaran'] as $pembayaran){
            $id_tagihan = $pembayaran['id_tagihan'];
            $tagihan = $this->db->get('tagihan',['id_tagihan' => $id_tagihan])->row_array();
            $bulan = date('M');
            if($tagihan['bulan_tagih'] != $bulan){
                if($tagihan['status'] == "sudah di bayar"){
                    $id = $tagihan['id_tagihan'];
                    $this->db->delete('pembayaran',['id_tagihan' => $id]);
                }else{
                  return true;
                }
            }else{
                return true;
            }
        }
    }

    public function updatepelanggan($id){
        $data['title'] = "Update data pelanggan";
        $data['tarif'] = $this->management->getTarif();
        $data['pelanggan'] = $this->management->pelanggan($id);
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('tarif','Tarif','required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('management/updatepelanggan',$data);
            $this->load->view('templates/footer');
        }else{
            $this->management->update($id);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah</div>');
            redirect('management');
        }
    }

    public function deletepelanggan($id){
        $this->db->delete('pelanggan',['id' => $id]);
        $this->db->delete('tagihan',['id_pelanggan' => $id]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus data</div>');
        redirect('management');    
    }

    public function updatetarif($id){
        $data['title'] = "Update data pelanggan";
        $data['tarif'] = $this->management->tarif($id);
        $this->form_validation->set_rules('daya','daya','required|trim');
        $this->form_validation->set_rules('tarif','tarif','required|trim');
        $this->form_validation->set_rules('beban','beban','required|trim');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('management/updatetarif',$data);
            $this->load->view('templates/footer');
        }else{
            $this->management->updatetarif($id);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah</div>');
            redirect('management/tarif');
        }
    }

    public function deletetarif($id){
        $this->db->delete('tarif',['kode' => $id]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus data</div>');
        redirect('management/tarif'); 
    }

    public function detailpembayaran(){
        $query = "SELECT * FROM pembayaran INNER JOIN tagihan ON pembayaran.id_tagihan = tagihan.id_tagihan INNER JOIN pelanggan ON tagihan.id_pelanggan = pelanggan.id INNER JOIN tarif ON pelanggan.kode = tarif.kode";
        $data['pembayaran'] = $this->db->query($query)->result_array();
        $data['title'] = "Detail pembayaran bulan" . " " . date('M');
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('management/detail',$data);
    }
}