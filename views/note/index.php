<h1>Note</h1>

<form method="post" action="<?php echo URL; ?>note/create">
	<label>Title</label><input type="text" name="title"><br>
	<label>Content</label><textarea name="content"></textarea><br>
	<label>&nbsp;</label><input type="submit">
</form>

<hr />

<table>
	<?php
	foreach($this->noteList as $key => $value) {
		echo '<tr>';
		echo '<td>' . $value['title'] . '</td>';
		echo '<td>' . $value['date_added'] . '</td>';
		echo '<td><a href="'.URL.'note/edit/'.$value['noteid'].'">Edit</a></td>';
		echo '<td><a class="delete" href="'.URL.'note/delete/'.$value['noteid'].'">Delete</a></td>';
		echo '</tr>';
	}
	?>
</table>

<script>
$(function() {
	$('.delete').click(function(e) {
		var c = confirm("Você tem certeza que deseja excluir este arquivo?");
		if (c == false) return false;
	});
});
</script>