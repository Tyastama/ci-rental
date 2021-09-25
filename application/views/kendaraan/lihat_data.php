<h3>Data Kendaraan</h3>
<?php
echo anchor('kendaraan/post','Tambah Data', array('class'=>'btn btn-danger'));
?>
<hr>
<table class="table table-bordered">
    <tr><th>No</th><th>Ketegori Kendaraan</th><th>Nama kendaraan</th><th>Harga</th><th colspan='2'>Operasi</th></tr>
    <?php
    $no=1;
    foreach($record->result() as $r){
        echo "<tr>
                <td>$no</td>
                <td>$r->nama_kategori</td>
                <td>$r->nama_kendaraan</td>
                <td>$r->harga</td>
                <td>".anchor('kendaraan/edit/'.$r->kendaraan_id,'Edit')."</td>
                <td>".anchor('kendaraan/delete/'.$r->kendaraan_id,'Delete')."</d></tr>";
                $no++;
    }
    ?>
    
</table>