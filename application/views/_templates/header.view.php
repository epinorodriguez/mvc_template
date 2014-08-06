<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->titulo_vista;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    
    <?php foreach ($this->css_array as $css): ?>          
        <?php if(file_exists('public/css/' . $css)):?>
        	<link rel="stylesheet" type="text/css" href="<?php echo ASSET_ROOT. 'css/' . $css ;?>">  
		<?php endif;?>
		<?php if(file_exists('public/css/libs/' . $css)):?>
        	<link rel="stylesheet" type="text/css" href="<?php echo ASSET_ROOT. 'css/libs/' . $css ;?>">  
		<?php endif;?>
    <?php endforeach;?>
    
</head>
<body>
