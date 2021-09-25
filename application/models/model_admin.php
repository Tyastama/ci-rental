<?php
class model_admin extends Ci_Model{
 
    function login($username,$password){
        $chek = $this->db->get_where('admin',array('username'=>$username, 'password'=>md5($password)));
        if($chek->num_rows()>0){
            return 1;
        }else{
            return 0;
        }
    }
    function tampil_data(){
        return $this->db->get('admin');
    }
    function post(){
        $id = $this->input->post('id',true);
        $nama = $this->input->post('nama',true);
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
        $data=array('nama_lengkap'=>$nama,
                     'username'=>$username,
                     'password'=>md5($password));
        $this->db->insert('admin',$data);
    }
    function edit(){
        $nama = $this->input->post('nama',true);
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
        $data=array('nama_lengkap'=>$nama,
                     'username'=>$username,
                     'password'=>md5($password));
        $this->db->where('admin_id', $this->input->post('id'));
        $this->db->update('admin',$data);

    }
    function get_one($id){
        $param = array('admin_id'=>$id);
        return $this->db->get_where('admin',$param);
    }
    function delete($id){
        $this->db->where('admin_id',$id);
        $this->db->delete('admin');
    }
}
?>