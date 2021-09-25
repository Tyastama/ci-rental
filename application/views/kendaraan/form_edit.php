<h3>Edit Data Kendaraan</h3>
<?php
echo form_open('kendaraan/edit');
?>
<input type="hidden" name="id" class="form-control" placeholder="id" value="<?php echo $record['kendaraan_id'];?>">
<table class="table table-bordered">
    <tr><td>Nama Kendaraan</td><td>
        <input type="text" name="nama" class="form-control" placeholder="Nama Kendaran" value="<?php echo $record['nama_kendaraan'];?>">
    </td></tr>
    <tr><td>Ketegori Kendaraan</td><td>
        <div class="col-sm-4"><select name="kategori" class="form-control">
                <?php
                foreach ($kategori as $k)
                {
                    echo "<option value='$k->kategori_id'>$k->nama_kategori</option>";
                }
                ?>
                </select></div>
    </td></tr>
    
    <tr><td>Harga</td><td>
        <input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo $record['harga'];?>">
    </td></tr>

    <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
    <?php echo anchor('kendaraan','kembali',array('class'=>'btn btn-primary btn-sm'));?>
</table>
</form>