<?php
class admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
        chek_session();
    }

    function index(){

        $data['record'] = $this->model_admin->tampil_data();
        //$this->load->view('admin/lihat_data',$data);
        $this->template->load('template','admin/lihat_data',$data);
    }

    function post(){
        if(isset($_POST['submit'])){
           $this->model_admin->post();
           redirect('admin');
        }else{
            //$this->load->view("admin/form_input");
            $this->template->load('template','admin/form_input');
        }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $this->model_admin->edit();
            redirect('admin');
        }else{
            $id = $this->uri->segment(3);
            $data['record']= $this->model_admin->get_one($id)->row_array();
            //$this->load->view('admin/form_edit',$data);
            $this->template->load('template','admin/form_edit',$data);
        }
    }
    function delete(){
        $id = $this->uri->segment(3);
        $this->model_admin->delete($id);
        redirect('admin');
    }

}
?>
