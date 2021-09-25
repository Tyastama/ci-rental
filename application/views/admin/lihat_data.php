<h3>Data Admin</h3>
<?php
echo anchor('admin/post','Tambah Data',array('class'=>'btn btn-danger'));
?>
<hr>
<table class="table table-bordered">
<tr><th>No</th><th>Nama Lengkap</th><th>Username</th><th>Last Login</th><th colspan="2">Operasi</th></tr>
<?php
$no=1;
foreach($record->result() as $r){
    echo "<tr>
            <td>$no</td>
            <td>$r->nama_lengkap</td>
            <td>$r->username</td>
            <td>$r->last_login</td>
            <td>".anchor('admin/edit/'.$r->admin_id,'Edit')."</td>
            <td>".anchor('admin/delete/'.$r->admin_id,'Delete')."</td></tr>";
            
    $no++;
}
?>
</table>