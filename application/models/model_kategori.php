<?php
class model_kategori extends Ci_Model{

    function tampil_data(){
        return $this->db->get('kategori_mobil');
    }
    function post(){
        $data=array('nama_kategori'=> $this->input->post('kategori'));
        $this->db->insert('kategori_mobil',$data);
    }
    function edit(){
        $data=array('nama_kategori'=> $this->input->post('kategori'));
        $this->db->where('kategori_id', $this->input->post('id'));
        $this->db->update('kategori_mobil',$data);
    }
    function get_one($id){
        $param = array('kategori_id'=>$id);
        return $this->db->get_where('kategori_mobil',$param);
    }
    function delete($id){

        $this->db->where('kategori_id',$id);
        $this->db->delete('kategori_mobil');
    }

}
?>