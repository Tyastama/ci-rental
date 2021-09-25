<h3>Tambah Data Kategori</h3>
<?php
echo form_open('kategori/post');
?>
<table class="table table-bordered">
    <tr><td>Nama Kategori<td>
        <input type="text" name="kategori"  class="form-control" placeholder="kategori">
        </tr>
        <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
    <?php echo anchor('kategori','kembali',array('class'=>'btn btn-primary btn-sm'));?>
</table>
</form>