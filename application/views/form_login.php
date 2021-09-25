<h3>Login Form</h3>
<?php
echo form_open('auth/login');
?>
<table class="table table-bordered">
<tr><td>Username
    <input type="text" name="username" class="form-control" placeholder="username"></td></tr>
<tr><td>Password
    <input type="password" name="password" class="form-control" placeholder="password"></td></tr>
<tr><td><button type="submit" name="submit" class="btn btn-primary">Login</button></td></tr>
</table>
</form>