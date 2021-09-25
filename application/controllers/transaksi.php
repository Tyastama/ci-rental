<?php
class transaksi extends Ci_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('model_kendaraan','model_transaksi'));
        chek_session();
    }

    function index(){
        if(isset($_POST['submit']))
        {
            $this->model_transaksi->simpan_kendaraan();
            redirect('transaksi');
        }else{
            $data['kendaraan'] = $this->model_kendaraan->tampil_data();
            $data['detail']    = $this->model_transaksi->tampilkan_detail_transaksi();
            $this->template->load('template','transaksi/form_transaksi', $data);
        }
    }
    function hapusitem($id){
        $id= $this->uri->segment(3);
        $this->model_transaksi->hapusitem($id);
        redirect('transaksi');

    }
    function selesai_order(){
        $tanggal = date('Y-m-d');
        $user    = $this->session->userdata('username');
        $id_op   = $this->db->get_where('admin',array('username'=>$user))->row_array();
        $data    =array('admin_id'=>$id_op['admin_id'],'tanggal_transaksi'=>$tanggal);
        $this->model_transaksi->selesai_order($data); 
        redirect('transaksi');
    }

    function excel(){
        header("Content-type=application/vnd.ms-excel");
        header("Content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record'] = $this->model_transaksi->laporan_default();
        $this->load->view('transaksi/laporan_excel',$data);
    }
    function pdf(){
        $this->load->library('cfpdf');

        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_transaksi->laporan_default();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(27, 7, $r->tanggal_transaksi, 1,0);
            $pdf->Cell(30, 7, $r->nama_lengkap, 1,0);
            $pdf->Cell(38, 7, $r->total, 1,1);
            $no++;
            $total=$total+$r->total;
        }
        // end
        $pdf->Cell(67,7,'Total',1,0,'R');
        $pdf->Cell(38,7,$total,1,0);
        $pdf->Output();
    }
}
?>