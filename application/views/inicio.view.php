
<h1>Usuarios</h1>

<?php if(isset($data['usuarios'])):?>

	<?php foreach($data['usuarios'] as $usuario): ?>
		<?php echo $usuario['username'];?><br>
	<?php endforeach; ?>

<?php endif; ?>

