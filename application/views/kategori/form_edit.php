<h3>Edit Data Kategori</h3>
<?php
echo form_open('kategori/edit');
?>
<input type="hidden" name="id" class="form-control" placeholder="id" value="<?php echo $record['kategori_id'];?>">
<table class="table table-bordered">
    <tr><td>Nama Kategori<td>
        <input type="text" name="kategori" class="form-control" placeholder="kategori" 
             value="<?php echo $record['nama_kategori'];?>">
        </tr>
        <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
    <?php echo anchor('kategori','kembali',array('class'=>'btn btn-primary btn-sm'));?>
</table>
</form>