<h3>Tambah Data Admin</h3>
<?php
echo form_open('admin/post');
?>
<table class="table table-bordered">
    <tr><td>Nama Lengkap</td><td>
        <input type="text" name="nama" placeholder="nama lengkap" class="form-control"></td></tr>
    <tr><td>Username</td><td>
        <input type="text" name="username" placeholder="username" class="form-control"></td></tr>
    <tr><td>Password</td><td>
        <input type="password" name="password" placeholder="password" class="form-control"></td></tr>
    <tr><td>
    <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
    <?php echo anchor('admin','kembali',array('class'=>'btn btn-primary btn-sm'));?>
</table>
</form>