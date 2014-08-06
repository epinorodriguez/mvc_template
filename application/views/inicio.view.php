
<h1>Usuarios</h1>

<form role="form" class="form-gorizontal bv-form">
	
	<div class="form-group">
                      <label for="nombre" class="col-sm-4 control-label">Nombre</label>
                      <div class="col-sm-8">
                        <input id="nombre" name="nombre" type="text" class="form-control" onBlur="this.value = this.value.toUpperCase();">
                      </div>
                    </div>

</form>


<?php if(isset($data['usuarios'])):?>

	<?php foreach($data['usuarios'] as $usuario): ?>
		<?php echo $usuario['username'];?><br>
	<?php endforeach; ?>

<?php endif; ?>

