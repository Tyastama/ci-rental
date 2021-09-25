<?php
class auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
    }

    function login(){
       if(isset($_POST['submit'])){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hasil    = $this->model_admin->login($username, $password);
            if($hasil == 1){
              //update last login
              $this->db->where('username',$username);
              $this->db->update('admin',array('last_login'=>date('Y-m-d')));
              $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
              redirect('dashboard');
            }else{
               redirect('auth/login');
            }
      
       }else{
        $this->load->view('form_login');
        //$this->template->load('template_login','form_login');
       }
    }
}
?>