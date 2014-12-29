<h1>User: Edit</h1>

<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid']; ?>">
	<label>Username</label><input type="text" name="username" value="<?php echo $this->user[0]['username']; ?>"><br>
	<label>Password</label><input type="text" name="password"><br>
	<label>Role</label>
	<select name="role">
		<option value="default" <?php if($this->user[0]['role'] == 'default') echo 'selected'; ?>>Default</option>
		<option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
		<option value="owner" <?php if($this->user[0]['role'] == 'owner') echo 'selected'; ?>>Owner</option>
	</select><br>
	<label>&nbsp;</label><input type="submit">
</form>