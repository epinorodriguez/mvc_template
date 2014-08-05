</body>
<?php foreach ($data['js_array'] as $js): ?>
		<?php if(file_exists('public/js/' . $js)):?>
        	<script type="text/javascript" src="<?php echo ASSET_ROOT. 'js/' . $js ;?>"></script>
		<?php endif;?>
		<?php if(file_exists('public/js/libs/' . $js)):?>
        	<script type="text/javascript" src="<?php echo ASSET_ROOT. 'js/libs/' . $js ;?>"></script>
		<?php endif;?>
<?php endforeach;?>
</html>