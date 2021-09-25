<?php
class kendaraan extends Ci_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_kendaraan');
        $this->load->model('model_kategori');
        //chek_session();
    }
    function index(){

        $data['record'] = $this->model_kendaraan->tampil_data();
        //$this->load->view('kendaraan/lihat_data',$data);
        $this->template->load('template','kendaraan/lihat_data',$data);
        
    }

    function post(){
         if(isset($_POST['submit'])){
            $nama       = $this->input->post('nama_kendaraan');
            $kategori   = $this->input->post('kategori');
            $harga      = $this->input->post('harga');
            $data       = array('nama_kendaraan'=>$nama,
                                'kategori_id'=>$kategori,
                                'harga'=>$harga);
            $this->model_kendaraan->post($data);
            redirect('kendaraan');
  
          }else{
              $this->load->model('model_kategori');
              $data['kategori']= $this->model_kategori->tampil_data()->result();
              //$this->load->view('kendaraan/form_input',$data);
              $this->template->load('template', 'kendaraan/form_input');

          }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $nama       = $this->input->post('nama_kendaraan');
            $kategori   = $this->input->post('kategori');
            $harga      = $this->input->post('harga');
            $data       = array('nama_kendaraan'=>$nama,
                                'kategori_id'=>$kategori,
                                'harga'=>$harga);
            $this->model_kendaraan->edit($data);
            redirect('kendaraan');
  
          }else{
              $this->load->model('model_kategori');
              $id = $this->uri->segment(3);
              $data['kategori']= $this->model_kategori->tampil_data()->result();
              $data['record'] = $this->model_kendaraan->get_one($id)->row_array();
              //$this->load->view('kendaraan/form_edit',$data);
              $this->template->load('template', 'kendaraan/form_edit', $data);
          }
    }
    function delete(){
        $id =  $this->uri->segment(3);
        $this->model_kendaraan->delete($id);
        redirect('kendaraan');

    }
}
?>