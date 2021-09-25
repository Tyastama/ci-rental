<?php
class model_kendaraan extends Ci_Model{

    function tampil_data(){
        $query = "SELECT b.kendaraan_id,b.nama_kendaraan,b.harga,kb.nama_kategori 
                    FROM kendaraan as b,kategori_mobil as kb
                    WHERE b.kategori_id=kb.kategori_id";
        return  $this->db->query($query);
    }
    function post($data){
        $this->db->insert('kendaraan',$data);
    }

    function get_one($id){
        $param = array('kendaraan_id'=>$id);
        return $this->db->get_where('kendaraan', $param);
    }
    function edit($data,$id){
        $this->db->where('kendaraan_id',$id);
        $this->db->update('kendaraan',$data);
    }
    function delete($id) {
        $this->db->where('kendaraan_id',$id);
        $this->db->delete('kendaraan');
    }
}
?>