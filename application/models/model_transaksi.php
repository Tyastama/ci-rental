<?php
class model_transaksi extends ci_model{
    
    function simpan_kendaraan()
    {
        $nama_kendaraan = $this->input->post('kendaraan');
        $qty            = $this->input->post('qty');
        $idkendaraan    = $this->db->get_where('kendaraan',array('nama_kendaraan'=>$nama_kendaraan))->row_array();
        $data           = array('kendaraan_id'=>$idkendaraan['kendaraan_id'],
                                 'qty'=>$qty,
                                 'harga'=>$idkendaraan['harga'],
                                  'status'=>'0');
        $this->db->insert('transaksi_detail',$data);
    }

    function tampilkan_detail_transaksi(){
        $query = "SELECT td.t_detail_id,td.qty,td.harga,b.nama_kendaraan
        FROM transaksi_detail as td,kendaraan as b
        WHERE b.kendaraan_id=td.kendaraan_id and status='0'";

        return $this->db->query($query);
    }

    function hapusitem($id){
        $this->db->where('t_detail_id',$id);
        $this->db->delete('transaksi_detail');
    }

    function selesai_order($data){

        $this->db->insert('transaksi',$data);
        $last_id = $this->db->query("select transaksi_id from transaksi order by transaksi_id desc")->row_array();
        $this->db->query("update transaksi_detail set transaksi_id='".$last_id['transaksi_id']."' where status='0'");
        $this->db->query("update transaksi_detail set status='1' where status='0'");
    }
    function laporan_default(){

        $query="SELECT a.tanggal_transaksi,b.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as a,transaksi_detail as td,admin as b
                WHERE td.transaksi_id=a.transaksi_id and b.admin_id=a.admin_id
                group by a.transaksi_id";
        return $this->db->query($query);
    }
}
?>