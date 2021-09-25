<h3>Form Transaksi</h3>
<?php
echo form_open('transaksi');
?>
<table class="table table-bordered">
    <tr class="warning"><th>Form</th></tr>
    <tr><td>
            <div class="col-sm-6"">
                <input list="kendaraan" name="kendaraan" placeholder="masukan nama kendaraan" class="form-control">
            </div>
<div class="col-sm-1"">
                <input type="text" name="qty" placeholder="Hari" class="form-control">
            </div>
</td></tr>
    <tr><td>
            <button type="submit" name="submit" class="btn btn-default">Simpan</button>
            <?php echo anchor('transaksi/selesai_order','Selesai',array('class'=>'btn btn-default'))?>
        </td></tr>
</table>
</form>
<table class="table table-bordered">
    <tr class="warning"><th colspan="6">Detail Transaksi</th></tr>
    <tr><th>No</th><th>Nama Kendaraan</th><th>Hari</th><th>Harga</th><th>Subtotal</th><th>Cancel</th></tr>
    <?php
    $no=1;
    $total=0;
    foreach($detail->result() as $d){
        echo"<tr>
                <td>$no</td>
                <td>$d->nama_kendaraan</td>
                <td>$d->qty</td>
                <td>$d->harga</td>
                <td>".$d->qty*$d->harga."</td>
                <td>".anchor('transaksi/hapusitem/'.$d->t_detail_id,'Hapus')."</td>
                </tr>";
            $total=$total+($d->qty*$d->harga);
        $no++;
    }
    ?>
    <tr><td colspan="5"><p align="right">Total</p></td><td><?php echo $total;?></td></tr>
</table>

<datalist id="kendaraan">
    <?php
    foreach ($kendaraan->result() as $b)
    {
        echo "<option value='$b->nama_kendaraan'>";
    }
    ?>
    
</datalist>