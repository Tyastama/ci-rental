<h3>Edit Data Admin</h3>
<?php
echo form_open('admin/edit');
?>
<input type="hidden" name="id" placeholder="id" value="<?php echo $record['admin_id'];?>">
<table class="table table-bordered">
    <tr><td>Nama Lengkap</td><td>
        <input type="text" name="nama" class="form-control" placeholder="nama lengkap" value="<?php echo $record['nama_lengkap']?>"></td></tr>
    <tr><td>Username</td><td>
        <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $record['username']?>"></td></tr>
    <tr><td>Password</td><td>
        <input type="password" name="password" class="form-control" placeholder="password" value=""></td></tr>
    <tr><td>
    <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
    <?php echo anchor('admin','kembali',array('class'=>'btn btn-primary btn-sm'));?>
</table>
</form>