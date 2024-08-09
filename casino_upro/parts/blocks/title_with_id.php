<?php if ($title = get_field('title')): ?>
	<h2><span<?php if($id = get_field('id')) echo ' id="' . $id . '"' ?>><?= $title ?></span></h2>
<?php endif ?>