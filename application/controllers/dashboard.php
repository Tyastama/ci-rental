<?php
class Dashboard extends CI_Controller{
    function index(){
        chek_session();
        $this->load->view('template');
    
    }

}
?>