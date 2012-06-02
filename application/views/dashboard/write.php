<form action="" method="post">
	Title : <input type="text" name="title" /><br />
	Slug :  <input type="text" name="slug" /><br />
	<input type="hidden" name="csrf_token" value="<?= Security::token() ?>" />
	<input type="hidden" name="author" value="<?php  foreach ($author as $my) : echo $my['name']; endforeach; ?>"/><br />
	<select name="category">
		<option value="raksti">Raksti</option>
		<option value="jaunumi">Jaunumi</option>
	</select>
    <textarea name="introduction"></textarea><br />
    <textarea name="content"></textarea><br />
	<input type="submit" value="Send!">
</form>